<?php

namespace App\Jobs;

use App\Models\Dokumen;
use App\Models\Pengingat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveDraft implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dokumen;


    /**
     * Create a new job instance.
     */
    public function __construct($dokumen)
    {
        $this->dokumen = $dokumen;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Pengingat::where('document_id', '=', $this->dokumen->id)->delete();
        $this->dokumen->delete();
    }
}
