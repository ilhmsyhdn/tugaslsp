<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = ['mapel','kdkompkeahlian',];

    public function fkompkeahlian(){return $this->belongsTo(KompetensiKeahlian::class, 'kdkompkeahlian', 'id');}
} 