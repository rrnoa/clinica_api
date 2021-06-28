<?php

namespace App\Http\Library;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;

trait ApiHelpers
{
    protected function isAdmin($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('admin');
        }

        return false;
    }

    protected function isRecep($user): bool
    {

        if (!empty($user)) {
            return $user->tokenCan('recep');
        }

        return false;
    }

    protected function isDoctor($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('doctor');
        }

        return false;
    }
    
    protected function translateRole(int $role): string
    {
        switch($role){
            case 1:
                $role = 'admin';
                break;
            case 2:
                $role = 'doctor';
                break;
            case 3:
                $role = 'recep';
                break;
        }
        return $role;
    }
}