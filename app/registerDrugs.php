<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerDrugs extends Model
{
   	protected $table = 'medicamentos';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
