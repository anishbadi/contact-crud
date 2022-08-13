<?php

namespace App\Repository;

use App\Contact;

class ContactRepository implements Interfaces\ContactRepositoryInterface
{
    /**
     * Fetch all data with pagination.
     *
     * @return object
     */
    public function getAll()
    {
        return Contact::paginate(config('app.pagination_limit'));
    }

    /**
     * Exists email or not.
     *
     * @param string $email
     * @return bool
     */
    public function existsEmail(string $email)
    {
        return Contact::where('email',$email)->exists();
    }

    /**
     * Store contact.
     *
     * @param array $details
     * @return object
     */
    public function store(array $details)
    {
        return Contact::create($details);
    }

    /**
     * Update contact.
     *
     * @param int $id
     * @param array $details
     * @return bool
     */
    public function update(int $id, array $details)
    {
        return Contact::where('id',$id)->update($details);
    }

    /**
     * Delete Contact.
     *
     * @param int $id
     * @param array $details
     * @return bool
     */
    public function delete(int $id)
    {
        return Contact::where('id',$id)->delete();
    }
}
