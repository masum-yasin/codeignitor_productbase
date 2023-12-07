<?php

namespace App\Database\Seeds;
use App\Models\ProductModel;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Helper to generate random values
        helper('text');

        // Insert 5 Records with Dynamic values 
        for($num=0;$num<50;$num++){
            $product = new ProductModel();

            $insertdata['product'] = random_string('alpha',30);
            $insertdata['category'] = random_string('alpha',30);
            $insertdata['price'] = rand(10,2000);
            $insertdata['sku'] = random_string('alpha',30);
            $insertdata['model'] = random_string('alpha',30);

            $product->insert($insertdata);
        }
    }
}
