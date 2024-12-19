<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dokumen;
use App\Models\Pengingat;
use Carbon\Carbon;

class DeleteExpiredData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dokumen:delete-expired-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus dokumen yang sudah kadaluarsa lebih dari 24 jam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info("jalan");

        $now = Carbon::now();

        $dataExpired = Dokumen::where('expiration_date', '<=', $now->subDay())->get();

        foreach ($dataExpired as $dokumen){
            Pengingat::where('document_id', $dokumen->id)->delete();
            $dokumen->delete();
            
        }

        \Log::info("bisa");
        $this->info('Dokumen kadaluarsa lebih dari 24 jam telah dihapus.');
    }
}
