<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChildrenRoutes extends Model
{
    use HasFactory;
    protected $table= "children_routes";
    protected $guarded;

    public function getRoutes(){
        return DB::table('routes')->get();
    }
}
