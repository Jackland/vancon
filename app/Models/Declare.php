<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Declare extends Model
{
	
    use SoftDeletes;

    protected $table = 'declare';
    
}
