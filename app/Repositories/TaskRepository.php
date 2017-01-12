<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\User;

class TaskRepository {
    public function forUser(User $user) {
        return $user->tasks()->orderBy('created_at', 'asc')->get();
    }
}