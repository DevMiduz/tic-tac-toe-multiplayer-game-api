<?php

namespace App\Libraries;

/**
 * An enum containing the possible values a Player's status can be.
 * SEARCHING, PLAYING, TIMED_OUT, DISCONNECTED
 */
enum PlayerStatus: string {
    case SEARCHING = 'SEARCHING';
    case PLAYING = 'PLAYING';
    case TIMED_OUT = 'TIMED_OUT';
    case DISCONNECTED = 'DISCONNECTED';
}