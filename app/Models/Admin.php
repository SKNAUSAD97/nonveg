<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded;

    public function getProfile(){
        return DB::table('admins')->get();
    }
}
