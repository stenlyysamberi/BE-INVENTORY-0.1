<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $guard = [];
    protected $tables = "tbl_store";
    protected $primary ="id_store";
}
