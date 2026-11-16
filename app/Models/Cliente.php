<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'codigo',
        'nombre',
        'email',
        'telefono',
        'direccion',
        'estado',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

}
