<?php

namespace App\Enums;


enum TableStatus: string
{
        // name and value
    case Pending = 'pending';
    case Avalaible = 'avalaible';
    case Unavalaible = 'unavalaible';
}
