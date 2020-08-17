<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerDoctor extends Model
{
   	protected $table = 'medicos';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
