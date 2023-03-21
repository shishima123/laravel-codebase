<?php

namespace App\Enumerations;

enum UserRole: string
{
    case CUSTOMER = 'customer';
    case ADMIN ='admin';
    case SUPER_ADMIN ='super_admin';
}
