<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products1Migration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'price' => [
                'type' => 'varchar',
                'constraint'=>'50'

              
            ],
            'sku' => [
                'type' => 'varchar',
                'constraint'=>'50'
              
            ],
            'price' => [
                'type' => 'varchar',
                'constraint' => '50'
              
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('product1');
    }

    public function down()
    {
        $this->forge->dropTable('product1');
    }
}
