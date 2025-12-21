<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranFile extends Model
{
    protected $table = 'lampiran_files';
    protected $primaryKey = 'file_id';

    protected $fillable = ['lampiran_id', 'file_path', 'file_type'];

    public function dokumen()
    {
        return $this->belongsTo(LampiranDokumen::class, 'lampiran_id');
    }
}
