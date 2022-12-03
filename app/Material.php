<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    // protected $guard = [];
    protected $fillable = ['material_name','material_number','container','total','uom','file'];
    protected $tables = "materials";
    protected $primary ="id_material";

    
}
