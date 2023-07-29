<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales'; // Nome da tabela de vendas
    protected $fillable = ['product_name', 'quantity', 'price']; // Colunas preenchíveis em massa
}


