<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lme extends Model
{
    protected $table = 'lme';
    protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
