<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(CodeDelivery\Models\Restaurant::class, 10)
        ->create([
          'user_id' => rand( 1, 10 ),
        ]);
        factory(CodeDelivery\Models\Category::class, 10)
          ->create()
          ->each(function($c){
            for ( $i=0; $i < 4; $i++) {
              # code...
              $c->products()->save(factory(\CodeDelivery\Models\Product::class)->make([
                'restaurant_id' => rand( 1,10 )
              ]));

            }
          })
          ;
    }
}
