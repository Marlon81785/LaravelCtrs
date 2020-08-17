<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerCid extends Model
{
   	protected $table = 'cid';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
