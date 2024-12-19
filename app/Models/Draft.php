<?php

namespace App\Models;

use App\Models\Dokumen;
use App\Models\Pengingat;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    public static function remove_draft(){
        \Log::info('remove_draft function called.');

        $dokumen = Dokumen::all();
        foreach ($dokumen as $item){
            if($item->status == 'draft'){
                $pelaksanaan = strtotime($item->expiration_date) + 86400;
                if($pelaksanaan < time()){
                    \Log::info("Deleting document ID: {$item->id}");
                    $pengingat = Pengingat::where('document_id', '=', $item->id)->delete();
                    $item->delete();
                }
            }
        }
    }
}
