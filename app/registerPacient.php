<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerPacient extends Model
{
   	protected $table = 'pacient';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
