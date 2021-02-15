<?php

namespace App\Models;
use App\Models\Rw;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $table = "kasuses";
    protected $fillable = ['id', 'positif',  'sembuh', 'meninggal', 'tanggal', 'id_rw'];
    public $timestamps = true;

    public function rw()
    {
        return $this->belongsTo('App\Models\Rw', 'id_rw');
    }
    use HasFactory;
}
