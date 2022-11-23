<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipePaket extends Model
{
    use HasFactory;

    // protected $table = ['tipe_pakets'];
    protected $guarded = ['id'];
    protected $fillable = ['nametipe','status'];

    public function namapaket(){
        return $this->hasOne(NamaPaket::class, 'id','tipepaket_id');
    }
}