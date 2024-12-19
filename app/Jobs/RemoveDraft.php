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

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('Proses hapus');
        $dokumen = Dokumen::all();
        foreach ($dokumen as $item){
            if($item->status == 'draft'){
                $pelaksanaan = strtotime($item->expiration_date) + 86400;
                if($pelaksanaan < time()){
                    \Log::info('Behasil hapus data');
                    $pengingat = Pengingat::where('document_id', '=', $item->id)->delete();
                    $item->delete();
                }
            }
        }
    }
}
