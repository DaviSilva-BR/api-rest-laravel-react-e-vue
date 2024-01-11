<?php

namespace Database\Seeders;

use App\Models\Fornecedores;
use Illuminate\Database\Seeder;

class FornecedorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fornecedores::factory(20)->create();
    }
}
