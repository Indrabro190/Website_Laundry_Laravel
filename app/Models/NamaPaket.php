<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaPaket extends Model
{
    use HasFactory;
    protected $stopOnFirstFailure = true;
    protected $redirectRoute = 'datapaket';
    protected $table = 'nama_pakets';
    protected $guarded = ['id'];
    protected $fillable = ['tipepaket_id','satuan_id','namepaket','harga','status'];

    // relasi ke tipe paket
    public function tipepaket(){
        return $this->belongsTo(TipePaket::class, 'tipepaket_id','id');
    }
    public function satuan(){
        return $this->belongsTo(Satuan::class, 'satuan_id','id');
    }
}
