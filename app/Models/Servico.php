<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'tipoServico'
    ];
    // Pegar Todos os dogs vinculados á serviço
    public function Dog()
    {
        return $this->hasMany(Dog::class);
    }
}