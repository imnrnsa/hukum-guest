<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranDokumen extends Model
{
    protected $table = 'lampiran_dokumen';
    protected $primaryKey = 'lampiran_id';

    protected $fillable = ['judul', 'deskripsi'];

    public function files()
    {
        return $this->hasMany(LampiranFile::class, 'lampiran_id');
    }
}
