<?php

namespace App\Libraries;

enum PlayerStatus: string {
    case SEARCHING = 'SEARCHING';
    case PLAYING = 'PLAYING';
    case TIMED_OUT = 'TIMED_OUT';
    case DISCONNECTED = 'DISCONNECTED';
}