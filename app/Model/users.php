<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    public $table = 'users';

     public function userarticle ()
	    {
	        return $this->hasMany('App\Model\article','uid');
	    }
}
