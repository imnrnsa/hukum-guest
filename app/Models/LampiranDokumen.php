<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranDokumen extends Model
{
    protected $primaryKey = 'lampiran_id';
    protected $fillable = ['dokumen_id','file','keterangan'];

    public function dokumen()
    {
        return $this->belongsTo(DokumenHukum::class, 'dokumen_id');
    }
}

