<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Creates the player table with the following fields:
 * - id                 (UNSIGNED INT 5)
 * - username           (VARCHAR 200)
 * - status             (ENUM (SEARCHING, PLAYING, TIMED_OUT, DISCONNECTED))
 * - created_at         (DATETIME, TIMESTAMP)
 * - last_activity_at   (DATETIME, TIMESTAMP)
 */
class Player extends Migration
{
    /**
     * Creates the player table with the following fields:
     * - id                 (UNSIGNED INT 5)
     * - username           (VARCHAR 200)
     * - status             (ENUM (SEARCHING, PLAYING, TIMED_OUT, DISCONNECTED))
     * - created_at         (DATETIME, TIMESTAMP)
     * - last_activity_at   (DATETIME, TIMESTAMP)
     * @return void
     */
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT','usigned'=>true, 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'unique' => true, 'constraint' => 200],
            'status' => ['type' => 'ENUM', 'constraint' => ['SEARCHING', 'PLAYING', 'TIMED_OUT', 'DISCONNECTED'], 'default' => 'SEARCHING'],
            'created_at datetime default current_timestamp',
            'last_activity_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('players');
    }

    /**
     * Destroys the player table.
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('players');
    }
}
