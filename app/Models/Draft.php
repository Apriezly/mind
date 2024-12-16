<?php

namespace App\Models;

use App\Models\Dokumen;
use App\Models\Pengingat;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    public static function remove_draft(){
        $dokumen = Dokumen::all();
        $pengingat = Pengingat::where('document_id', '=', $dokumen->id);
        foreach ($data as $item){
            if($item->status == 'draft'){
                $pelaksanaan = strtotime($item->expiration_date)+(86400);
                if($pelaksanaan < time()){
                    $item->delete();
                    $pengingat->delete();
                }
            }
        }
    }
}
