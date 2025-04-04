<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Samsung Galaxy S23',
            'description' => 'Flagship Samsung smartphone',
            'price' => 69999.99,
            'quantity' => 20
        ]);
    }
}
