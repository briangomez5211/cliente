<?php
namespace App\Http\Controllers;
use App\Models\clientemodels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class clientecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=clientemodels::all();
        return $cliente;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar=Validator::make($request->all(),
        ["descripcion_cliente"=>"required|uniqued"]);
        if(!$validar->fails()){
            $cliente=new clientemodels();
            $cliente->nombre_cliente=$request->nombre_cliente;
            $cliente->apellido_cliente=$request->apellido_cliente;
            $cliente->direccion_cliente=$request->direccion_cliente;
            $cliente->telefono_cliente=$request->telefono_cliente;


            $cliente->save();
            return response()->json(['mensaje'=>"correctamente guardado"]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=clientemodels::Where('id',$id)->get();
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion=Validator::make($request->all(),
        ["nombre_cliente"=>'requiered']);
         if(!$validacion->fails()){
        $cliente=clientemodels::find($id);
        if(isset($cliente)){

            $cliente->nombre_cliente=$request->nombre_cliente;
            $cliente->apellido_cliente=$request->apellido_cliente;
            $cliente->direccion_cliente=$request->direccion_cliente;
            $cliente->telefono_cliente=$request->telefono_cliente;

           
            
            $cliente->save();
            return response()->json(["Mensaje"=>"el Nombre actualizado exitosamente"]);
        }   
        else {return response()->json(["mensaje"=>"no se encontro el registro "]);} 
        }
        else{
        return response()->json(["mensaje"=>"validacion incorrecta "
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=clientemodels::find($id);
        if(isset($cliente)){
        $cliente->delete();
        return response()->json([
            "mensaje"=>"registro borrado exitosamente"
        
        ]);
       }
        else{
            return response()->json([
                "mensaje"=>"registro borrado exitosamente"
            ]);
            }
    }
    
}