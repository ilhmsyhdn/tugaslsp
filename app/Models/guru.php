<?php
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Guru extends Model
{ 
 use HasFactory; 
 protected $table = 'guru'; 
 protected $fillable =[ 
 'nip_nuptk', 
 'namaguru', 
 'notelp', 
 'jk', 
 'alamat', 
 'agama', 
 'gelardepan', 
 'gelarbelakang', 
 'namapt', 
 'tahunlulus', 
 'tempatlahir', 
 'tgllahir', 
 'foto'
 ];
} 
