<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    // protected $guard = [];
    protected $fillable = ['material_name','material_number','container','total','uom','file'];
    protected $tables = "materials";
    protected $primary ="id_material";

    static function material_only($code){

        $In = Stok::where([['status','=', 'In'],['id_material','=', $code]])->sum('total');
        $Out = Stok::where([['status','=', 'Out'],['id_material','=', $code]])->sum('total');
        $total = abs($Out-$In);

        $only = DB::table('stoks')
        ->join('materials','stoks.id_material','=','materials.id_material')
        ->where('stoks.id_material',$code)
        ->where('stoks.status','In')
        ->select('materials.material_number','materials.material_name','materials.file',
        'materials.container','materials.uom','stoks.total','stoks.status',
        'stoks.created_at')->get();
        
        return response()->json([
            'material_number' => $only[0]->material_number,
            'material_name' => $only[0]->material_name,
            'container' => $only[0]->container,
            'uom' => $only[0]->uom,
            'total' => $total
        ]);
        
    }
}
