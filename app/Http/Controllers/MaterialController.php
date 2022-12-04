<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Material;
use App\Stok;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function beranda(){
        $employee = User::all();
        $material = Material::all();

        return response()->json([
            'total'    => ['stok' => Stok::Total()],
            'activity' => Stok::activity_weeks()->get(),
            'employee' => $employee,
            'material' => $material
        ]);
    }


    public function view(){
        $material   = Material::where('material_number',request()->material_number)->get();
        if(count($material)>0){
            return response()->json([
                'status'   => 200,
                'message'  => "Data di Temukan",
                'material_name'       => $material[0]->material_name,
                'material_number'     => $material[0]->material_number,
                'container'           => $material[0]->container,
                'file'                => $material[0]->file,
                'total'               => $material[0]->total,
                'uom'                 => $material[0]->uom
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message'  => 'Data tidak ditemukan.'
            ]);
        }
        
    }

    public function viewAll(){
        $material = Material::all();
       
        return response()->json([
            'Viewall' => $material
        ]);
    }

    public function store(){

        $check = Material::where('material_number',request()->material_number)->count();
        if($check>0){
            return response()->json([
                'status' => 100,
                'message'  => 'Material sudah terdaftar'
            ]);
        }else{

            $image = request('file');  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(20).'.'.'png';
            File::put(public_path('image/') . $imageName, base64_decode($image));


            $bank = Material::create([
                'material_name' => request()->input('material_name'),
                'material_number' => request()->input('material_number'),
                'file' => $imageName,
                'container' => request()->input('container'),
                'uom' => request()->input('oum')
            ]);


            if ($bank) {
                return response()->json([
                    'status' => 200,
                    'message'  => 'Saved'
                    
                ]);
            }else{
                return response()->json([
                    'status' => 100,
                    'message'  => 'error to saved.'
                ]);
            }

           

            // request()->validate([
            //     'material_name' => 'required',
            //     'material_number' => 'required',
            //     'container' => 'required',
            //     'file' => 'image|file|max:2024|base64',
            //     'uom' => 'required'
            // ]);
        

          

           

            // if(request()->hasFile('file')){
            // $filename = round(microtime(true)*1000).'-'.str_replace(' ' ,'-',request()->file('file')->getClientOriginalName());
            // request()->file('file')->move(public_path('image'),$filename);
            
            //     $save = Material::create([
            //         'material_name' => request()->material_name,
            //         'material_number' => request()->material_number,
            //         'container' => request()->container,
            //         'file' => $filename,
            //         'uom' => request()->uom
            //     ]);

            //     if ($save) {
            //         return response()->json([
            //             'status' => 200,
            //             'message'  => 'Data has been successfully'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status' => 401,
            //             'message'  => 'Data failed'
            //         ]);
            //     }
                
            // }
            
           
            

        }
    }

    public function tamba_qty(){
        
        $qyt = Stok::create([
            'id_material' => request()->id_material,
            'id_employee' => request()->id_employee,
            'remark' => request()->remark,
            'total' => request()->total,
            'status' => request()->status
        ]);

        if ($qyt) {
            # code...
            return response()->json(["status" => 200,"message"=>"Data has been successfully"]);
        } else {
            # code...
            return response()->json(["status" => 400,"message"=>"Data has been failed"]);
        }
        
    }

    public function edit_stok(Request $request){
       $put = [
            'material_name' => 'required',
            'material_number' => 'required',
            'container' => 'required',
            // 'file' => 'image|file|max:2024',
            'uom' => 'required'
       ];

    //    return request();

       $cek = $request->validate($put);     
    //    if($request->file('file')!=null){
    //         $stok = Material::where([['material_number','=', request('material_number')]])->get();
    //         unlink(public_path('image/'.$stok[0]->file));

    //         $filename = round(microtime(true)*1000).'-'.str_replace(' ' ,'-',request()->file('file')->getClientOriginalName());
    //         request()->file('file')->move(public_path('image'),$filename);
    //     }

        Material::where('material_number',$request->material_number)->update($cek);
        return response()->json([
            'result'   => '2000',
            'message'  => 'Data has been updated'
        ]);
    }

    public function delete_stok(){

        $stok = Material::where([['material_number','=', request('material_number')]])->get();
        if (count($stok)>0) {
            $material = Material::where([['material_number','=', request('material_number')]])->delete();
            if ($material) {
                unlink(public_path('image/'.$stok[0]->file));
                // File::delete(public_path('image/'.$stok[0]->file));
                return response()->json(["status" => 200,"message"=>"Data has been deleted"]);
            }else{
                return response()->json(["status" => 400,"message"=>"Data has been failed deleted"]); 
            }
        } else {
            return response()->json(["status" => 400,"message"=>"Material number not found"]); 
        }
        

   


        
        
    }
}
