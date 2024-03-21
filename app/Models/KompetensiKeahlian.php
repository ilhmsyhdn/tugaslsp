<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    use HasFactory;
    protected $table = 'kompetensikeahlian';
    protected $fillable = ['kompetensikeahlian','kdstandkomp',];

    public function fstandkom(){return $this->belongsTo(StandarKompetensi::class, 'kdstandkomp', 'id');}
} 