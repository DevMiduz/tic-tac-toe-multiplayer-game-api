<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\PlayerStatus;

/**
 * Handles Player related API requests.
 */
class Player extends BaseController
{
    /*
    *
    * The player controller will have to:
    * Create a Player with a unique username.
    * Update a player's status.
    * Update a player's last_activity_at timestamp.
    * Disconnect and Remove Players.
    * 
    * Alot of this should be within the model so that the lobby controller can use the 
    * same functions without calling the player controller.
    */

    // create_player_session - generates user_key (doesn't have to be unique just needs to match the username)
    // sync_player_session - requires user_key

    public function test_route() {
        $player_model = new \App\Models\Player();
        $player_entity = new \App\Entities\Player();

        $data = $this->request->getPost();

        $player_entity->fill($data);
        $player_entity->setStatus(PlayerStatus::SEARCHING);
        $player_entity->generateNewPlayerKey();
        $player_entity->updateLastActivityAt();
        if($player_model->save($player_entity) === false) {
            return $this->fail(['errors' => $player_model->errors()], 400);
        };
        
        return $this->respondCreated($player_entity);

        return $this->respondCreated([
            'player_key' => $player_entity->player_key,
            'status' => $player_entity->status
        ]);
    }

    public function test_retrieve($username) {
        $player_model = new \App\Models\Player();
        $player_entity = $player_model->where('username', $username)->first();

        /*remember to handle nulls when data doesn't exist.*/

        return $this->respond([
            'player_key' => $player_entity->player_key,
            'status' => $player_entity->status
        ]);
    }

    public function get_all() {
        $player_model = new \App\Models\Player();
        return $this->respond($player_model->findAll());
    }
}
