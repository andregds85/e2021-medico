<?php

namespace Database\Seeders;

use App\Models\macro;
use Illuminate\Database\Seeder;

class macroSeeder extends Seeder
{

    public function run()
    {
        $a = [
           'CER MACRO FOZ DO RIO ITAJAI 42C65',
           'CER MACRO GF POLIS 42C15',
           'CER MACRO GOESTE 42C56',
           'CER MACRO MEIO OESTE 42C58',
           'CER MACRO NORDESTE 42C68',
           'CER MACRO SERRA 42C70',
           'CER MACRO SUL 42C67',
           'CER MACRO VALE DO ITAJAI 42C63'
            ];

          foreach ($a as $b) {
             macro::create(['nome' => $b]);
        }
    }
}
