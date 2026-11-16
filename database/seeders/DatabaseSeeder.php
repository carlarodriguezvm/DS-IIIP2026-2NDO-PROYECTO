<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Bodega;
use App\Models\Proovedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


public function run(): void
{
    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    // Categoria::factory(15)->create();
    // Cliente::factory(15)->create();
    // Empleado::factory(15)->create();

    // Pedido::factory(15)->create();

    // Bodega::factory(15)->create();

    // Producto::factory(15)->sequence(
    //     fn ($sequence) => [
    //         'categoria_id' => Categoria::query()
    //             ->orderBy('id')
    //             ->value('id'),
    //     ]
    // )->create();

    Producto::factory(15)->create();

}

}