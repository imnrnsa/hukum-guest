<?php
// app/Models/DokumenHukum.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenHukum extends Model
{
    use HasFactory;

    protected $table = 'dokumen_hukum';
    protected $primaryKey = 'dokumen_id';
    protected $fillable = [
        'jenis_id', 'kategori_id', 'nomor', 'judul', 
        'tanggal', 'ringkasan', 'status', 'file_path'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriDokumen::class, 'kategori_id');
    }
}