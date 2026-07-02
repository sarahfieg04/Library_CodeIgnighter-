<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateBookRecords extends Migration
{
    public function up()
    {
        // Add in book details 
        $this->forge->addField([
            'id'=> ['type'=> 'INT','constraint'=> 11,'auto_increment'=> true],
            'title'=> ['type'=> 'VARCHAR','constraint'=> 255],
            'author'=> ['type'=> 'VARCHAR','constraint' => 100],
            'genre'=> ['type'=> 'VARCHAR','constraint'=> 100, 'null'=> true],
            'publication_year'=> ['type' => 'YEAR'],
            'cover_image' => ['type'=> 'VARCHAR','constraint'=> 255,'null'=> true], 
        ]); 

        $this->forge->addKey('id', true);
        $this->forge->createTable('books');
    }

    public function down()
    {   // Create books table 
        $this->forge->dropTable('books');
    }

}
