<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerubahan extends Model
{
    protected $primaryKey = 'riwayat_id';
    protected $fillable = ['dokumen_id','tanggal','uraian_perubahan','versi'];

    public function dokumen()
    {
        return $this->belongsTo(DokumenHukum::class, 'dokumen_id');
    }
}

