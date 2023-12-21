<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;
use App\Libraries\PlayerStatus;

/**
 * Player Entity to act as a DTO.
 */
class Player extends Entity
{
    protected $attributes = ['username', 'status', 'player_key', 'last_activity_at'];
    protected $datamap = [];
    protected $dates   = ['last_activity_at', 'created_at'];
    protected $casts   = [];

    /**
     * Generates a new 64 byte player key.
     *
     * @return void
     */
    public function generateNewPlayerKey() {
        $this->attributes['player_key'] = bin2hex(random_bytes(64));
    }

    /**
     * Updates last_activity_at to the current times timestamp.
     *
     * @return void
     */
    public function updateLastActivityAt() {
        $this->attributes['last_activity_at'] = Time::now()->getTimestamp();
    }

    /**
     * Sets the Player's status to PlayerStatus enum value.
     *
     * @param PlayerStatus $status New status of the player.
     * @return void
     */
    public function setStatus(PlayerStatus $status) {
        $this->attributes['status'] = $status->value;
    }

}
