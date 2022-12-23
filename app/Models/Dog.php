<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'raca', 'nomeTutor', 'idade'
    ];
    protected $table = 'dogs';

    public function servico()
    {
        return $this->belongsTo(servico::class);
    }
}