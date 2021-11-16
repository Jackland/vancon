<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DeclareInfo extends Model
{

    use SoftDeletes;

    protected $table = 'declare_info';

    protected $fillable = ['company', 'name_salutation', 'first_name', 'last_name', 'tax', 'purchase_type', 'var_sales', 'street',
        'city', 'province', 'postal_code', 'country','status','message'];



}
