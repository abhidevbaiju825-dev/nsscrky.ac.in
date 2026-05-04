<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarouselSlidesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'template_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'hero',
                'comment'    => 'hero, ranklist, admissions, custom',
            ],
            'slide_eyebrow' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'slide_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slide_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bg_image_class' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'comment'    => 'Optional CSS class for background, or use bg_image_path',
            ],
            'bg_image_path' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'primary_cta_text' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'primary_cta_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'secondary_cta_text' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'secondary_cta_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'extra_data' => [
                'type'    => 'JSON',
                'null'    => true,
                'comment' => 'Stores template-specific elements',
            ],
            'slide_order' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'is_active' => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('_carousel_slides');
    }

    public function down()
    {
        $this->forge->dropTable('_carousel_slides');
    }
}
