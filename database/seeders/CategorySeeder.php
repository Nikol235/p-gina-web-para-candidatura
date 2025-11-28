<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Marco Antonio Cahuana Cruz',
            'description' => 'Miembro 1 de la plantilla.',
            'image' => 'plantilla/marco.jpg'
        ]);

        Category::create([
            'name' => 'Julio César Mamani Quispe',
            'description' => 'Miembro 2 de la plantilla.',
            'image' => 'plantilla/julio.jpg'
        ]);

        Category::create([
            'name' => 'Luis Alberto Cutipa Choque',
            'description' => 'Miembro 3 de la plantilla.',
            'image' => 'plantilla/luis.jpg'
        ]);

        Category::create([
            'name' => 'Edwin Alexander Huanca Apaza',
            'description' => 'Miembro 4 de la plantilla.',
            'image' => 'plantilla/edwin.jpg'
        ]);

        Category::create([
            'name' => 'Renzo Martín Ticona Flores',
            'description' => 'Miembro 5 de la plantilla.',
            'image' => 'plantilla/renzo.jpg'
        ]);

        Category::create([
            'name' => 'Carlos Enrique Surco Laura',
            'description' => 'Miembro 6 de la plantilla.',
            'image' => 'plantilla/carlos.jpg'
        ]);

        Category::create([
            'name' => 'Jhonatan Esteban Condori Huaranca',
            'description' => 'Miembro 7 de la plantilla.',
            'image' => 'plantilla/jhonatan.jpg'
        ]);

        Category::create([
            'name' => 'Sebastián Paolo Churata Ramos',
            'description' => 'Miembro 8 de la plantilla.',
            'image' => 'plantilla/sebastian.jpg'
        ]);

        Category::create([
            'name' => 'Diego Armando Puma Sucapuca',
            'description' => 'Miembro 9 de la plantilla.',
            'image' => 'plantilla/diego.jpg'
        ]);
    }
}
