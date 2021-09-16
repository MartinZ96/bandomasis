<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
// public function __construct()
// {
// $this->middleware('auth');
// $this->middleware('auth', ['except' => ['singleCard','index']]);
// $this->middleware('auth')->except('index');
// }

    use HasFactory;
       public function memberReservoirs()
   {
       return $this->hasMany('App\Models\Reservoir', 'member_id', 'id');
   }

}
