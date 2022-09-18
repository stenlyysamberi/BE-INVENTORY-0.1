<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    protected $guard = [];
    protected $tables = "materials";
    protected $primary ="id";
}
