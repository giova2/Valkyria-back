<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Contacto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Funciones;

class ProductoController extends Controller
{

    use Funciones;

    public function index(){
        // MUESTRA LOS PRODUCTOS QUE HAY EN STOCK
        $productos     = Producto::where('stock', '>', 0)->get();
        if($productos)
            return response()->json(['productos' => $productos], 200);
        else
            return response()->json(['error', 'hubo un problema en el servidor'], 500);
    }

    public function store(Request $request){
            
        $producto = Producto::find($request->input('producto.producto_id'));
        if($producto->stock >= $request->input('producto.cantidad')){
            \DB::beginTransaction();
            $producto                 = new producto;
            $producto->nombre         = $request->input('producto.nombre');
            $producto->producto_id    = $request->input('producto.producto_id');
            $producto->cantidad       = $request->input('producto.cantidad');
            $producto->comentarios    = $request->input('producto.comentarios');
            $producto->contacto       = $request->input('producto.contacto');
            $producto->confirmado     = 0;
            $producto->codigo         = trim(Carbon::now()).random_int(0,30000);
            $producto->save();
            // $producto    = producto::create($request->producto);
            if(!$producto){
                \DB::Rollback();
                return response()->json(['error' => 'Problem storing!'], 500);
            }
            $contacto = Contacto::where('email',$request->input('producto.contacto'))->get();
            
            if(!$contacto){
                $contacto              = new Contacto;
                $contacto->nombre      = $request->input('producto.nombre');
                $contacto->email       = $request->input('producto.contacto');//$request->input('contacto.email');
                $contacto->telefono    = $request->input('contacto.telefono');
                $contacto->preferencia = 'Email';//$request->input('contacto.preferencia');
                $contacto->save();
            }
            //no comprobamos almacenamiento de contacto pues es algo opcional

            // if(!$contacto){
            //     \DB::Rollback();
            //     return response()->json(['error' => 'Problem storing!'], 500);
            // }
            
            $output  = $this->enviarproducto($request, $producto);
            if(!$output['status']){
                \DB::Rollback();
                return response()->json(['error' => 'hubo un error en el servidor'], 500);
            }
            
            $flag = $this->EnviarproductoAdmin($request, $producto->id, $producto);
            if($flag){
                \DB::commit();
                return response()->json(['producto' => $producto, 'mail' => $output]);
            }else{
                \DB::rollback();
                return response()->json(['error' => 'error al enviar el correo'], 500);
            }
        }else{
            return response()->json(['error' => 'no hay stock por el momento para la cantidad solicitada'], 409);
        }
    }


    public function show($id){
        if ($producto)
    		return response()->json($producto);
    	return response()->json(['error' => 'Resource not found!'], 404);
    }

    public function update(Request $request, $id){
    	$producto = Producto::find($id);

    	$producto->update($request->all());
    	
    	return response()->json($producto);
    }

    public function destroy($id){
    	try{
    		Producto::destroy($id);

    		return response([],204);
    	} catch(\Exception $e){
    		return response(['Problem deleting the producto'], 500);
    	}
    }
    
}
