<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
// public function __construct()
// {
// $this->middleware('auth');
// $this->middleware('auth', ['except' => ['singleCard','index']]);
// $this->middleware('auth')->except('index');
// }

    
    use HasFactory;
       public function reservoirMember()
   {
       return $this->belongsTo('App\Models\Member', 'member_id', 'id');
   }


}
