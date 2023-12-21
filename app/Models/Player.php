<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Player Model class with the following fields:
 * - id                     (int)
 * - username               (string)
 * - status                 (enum)
 * - created_at             (timestamp)
 * - last_activity_at       (timestamp)
 */
class Player extends Model
{
    protected $table            = 'players';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Player::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'username', 'status', 'player_key', 'last_activity_at' ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';
    protected $updatedAtField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|max_length[200]|is_unique[players.username,id,{$username}]',
        'status' => 'required|in_list[SEARCHING,PLAYING,TIMED_OUT,DISCONNECTED]',
        'player_key' => 'required|max_length[254]|is_unique[players.player_key,id,{$player_key}]',
        'last_activity_at' => 'required'
    ];

    protected $validationMessages   = [];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

}
