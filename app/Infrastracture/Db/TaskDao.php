<?php

namespace App\infrastracture\Db;
//use DB;
use Illuminate\Support\Facades\DB;

class TaskDao {
    
    protected $table = "tasks";
    
    public function find($taskId) {
        $task = DB::table($this->table)->where('id', $taskId)->first();
     
        return $task;
    }
    
    public function getAllUser($userId){
        return DB::table($this->table)->where('user_id', $userId)->orderBy('created_at', 'asc')->get();

    }
    
    // Inplement by not using Model
    public function delete($taskid) {
var_dump(DB::class);
        return DB::table($this->table)->where('id', $taskid)->delete();
    }
}

/* 
 * To change this license header, use Illuminate\Database\Eloquent\Model;
choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

