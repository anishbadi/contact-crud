<?php

namespace App\Jobs;

use App\Services\ContactService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ContactImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ContactService $contactService)
    {
        $xmlDataString = file_get_contents(storage_path('import')."/".$this->filename);
        $xmlObject = simplexml_load_string($xmlDataString);                    
        $json = json_encode($xmlObject);
        $contacts = json_decode($json, true);
        $contactService->saveImportData($contacts);
    }
}
