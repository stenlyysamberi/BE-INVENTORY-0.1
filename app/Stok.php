<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $guard = [];
    protected $tables = "Stoks";
    protected $primary ="id";
}
