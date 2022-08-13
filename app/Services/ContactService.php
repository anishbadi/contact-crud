<?php

namespace App\Services;

use App\Jobs\ContactImport;
use App\Repository\Interfaces\ContactRepositoryInterface;
use Exception;
use Log;

class ContactService
{
    protected $contact;

    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get all contacts from the database
     *
     * @return object
     */
    public function getAllContact()
    {
        try {
            return $this->contact->getAll();
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Store contact details
     *
     * @param array $data
     * @return object
     */
    public function storeContact($data)
    {
        try {
            return $this->contact->store($data);
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Update contact details
     *
     * @param int $contact_id
     * @param array $data
     * @return object
     */
    public function updateContact($contact_id, $data)
    {
        try {
            return $this->contact->update($contact_id, $data);
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Delete contact
     *
     * @param int $contact_id
     * @return object
     */
    public function deleteContact($contact_id)
    {
        try {
            return $this->contact->delete($contact_id);
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Store import file contact
     *
     * @param Illuminate\Http\Request $request
     * @return object
     */
    public function importStore($request)
    {
        try {
            $file = $request->file;
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(storage_path('import'), $filename);
            dispatch(new ContactImport($filename));
            return true;
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Save import data in database
     *
     * @param array $contacts
     * @return bool
     */
    public function saveImportData($contacts)
    {
        try {
            if (isset($contacts['contact']) && !empty($contacts['contact'])) {
                foreach ($contacts['contact'] as $key => $contact) {
                    $checkValidate = $this->validateImportData($contact);
                    if ($checkValidate) {
                        $this->storeContact($contact);
                    }
                }
            }
            return true;
        } catch (Exception $e) {
            // Log errors
            Log::error($e->getMessage());
        }
    }

    /**
     * Validate import data
     *
     * @param array $contacts
     * @return bool
     */
    public function validateImportData($contact)
    {
        $validate = false;
        if (isset($contact['name']) &&
            $contact['name'] &&
            (isset($contact['email']) &&
            $contact['email']) &&
            filter_var($contact['email'], FILTER_VALIDATE_EMAIL) &&
            !$this->contact->existsEmail($contact['email']) &&
            (isset($contact['phone_number']) &&
            $contact['phone_number']) &&
            is_numeric($contact['phone_number']) &&
            strlen($contact['phone_number']) == 10) {
            $validate = true;
        }
        return $validate;
    }
}
