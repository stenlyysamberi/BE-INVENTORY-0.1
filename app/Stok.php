<?php

namespace App;

use Cron\DayOfWeekField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class Stok extends Model
{
    // protected $guard = [];
    protected $fillable = ['id_material','id_employee','remark','total','status'];
    protected $tables = "stoks";
    protected $primary ="id_store";

    static function activity_weeks(){
        $a = date('Y-m-d');
        $b = date('Y-m-d',strtotime('+7 days'));
        $range = [$a, $b];
        // ->where('stoks.id_material',2)

        $activity = DB::table('stoks')
            ->join('materials','stoks.id_material','=','materials.id_material')
            ->whereBetween('stoks.created_at',$range)->orderBy('stoks.created_at','asc')
            ->select('materials.material_name','materials.file','materials.container','materials.uom','stoks.total','stoks.created_at');
        return $activity;
    }

    static function Total(){
        $in=Stok::where('status','=','In')->sum('total');
        $out=Stok::where('status','=','Out')->sum('total');
        $total = abs($in-$out);
        return $total;
    }

    
}
