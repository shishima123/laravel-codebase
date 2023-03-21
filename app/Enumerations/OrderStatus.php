<?php

namespace App\Enumerations;

enum OrderStatus: int
{
    case CANCELLED = 0;
    case OPEN = 1;
    case CONFIRMED = 2;
    case COMPLETED = 3;
}
