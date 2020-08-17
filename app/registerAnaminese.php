<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerAnaminese extends Model
{
   	protected $table = 'anamineses';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
