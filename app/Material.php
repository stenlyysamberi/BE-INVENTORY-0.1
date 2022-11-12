<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    protected $guard = [];
    protected $tables = "tbl_materials";
    protected $primary ="id_material";
}
