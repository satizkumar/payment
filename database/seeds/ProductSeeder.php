<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert(array(
            array(
                'name' => 'Green Apple',
                'price' => '100',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            ),
            array(
                'name' => 'Red Apple',
                'price' => '150',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            ),
            array(
                'name' => 'Mango',
                'price' => '200',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            )
        ));

       
    }
}
