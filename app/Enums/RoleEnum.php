<?php

declare(strict_types=1);

namespace App\Enums;

enum RoleEnum: int
{
    const SUPERADMIN = 0;
    
    const ADMIN = 1;

    const GERANT = 3;

    const RECEPTEUR = 4;

    const SERVER = 5;
    
}
