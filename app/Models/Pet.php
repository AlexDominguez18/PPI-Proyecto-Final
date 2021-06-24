<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['foto','nombre','raza','color','especie','observaciones','fecha_consulta','sexo','adoptable','owner_id'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
