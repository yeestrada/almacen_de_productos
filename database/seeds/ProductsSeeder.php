<?php

use App\Laptop;
use App\Products;
use App\Shoe;
use App\Tv;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Products();
        $product1->nombre = 'Tv 32"';
        $product1->sku = 'USD';
        $product1->marca = 'Samsung';
        $product1->costo = 200.00;
        $product1->save();

        $tv = new Tv();
        $tv->tipo_pantalla = 'LED';
        $tv->tamano_pantalla = 32;
        $tv->id_product = $product1->id;
        $tv->save();


        $product2 = new Products();
        $product2->nombre = 'Laptop';
        $product2->sku = 'USD';
        $product2->marca = 'DELL';
        $product2->costo = 250.00;
        $product2->save();

        $laptop = new Laptop();
        $laptop->procesador = 'Intel';
        $laptop->ram = 4;
        $laptop->id_product = $product2->id;
        $laptop->save();


        $product3 = new Products();
        $product3->nombre = 'Zapatos deportivos';
        $product3->sku = 'USD';
        $product3->marca = 'Nike';
        $product3->costo = 250.00;
        $product3->save();

        $shoe = new Shoe();
        $shoe->material = 'Piel';
        $shoe->numero = 41;
        $shoe->id_product = $product3->id;
        $shoe->save();
    }
}
