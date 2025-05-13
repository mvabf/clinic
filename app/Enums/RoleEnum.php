<?php

namespace App\Enums;

enum RoleEnum: string
{
    case APPOINTMENT_MANAGER = 'appointment_manager';
    case APPOINTMENT_VIWER = 'appointment_viewer';
}
