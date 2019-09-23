<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingrediente;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listado de ingredientes
        $model = Ingrediente::get();
        //dd($model);
        return view('admin.ingredientes.index', ['ingredientes' => $model]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'ing_nombre' => 'required',
            'ing_precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',        
        
        ]);

        $indrediente = new Ingrediente();
        $indrediente->ing_nombre = $request->get('ing_nombre');
        $indrediente->ing_precio = $request->get('ing_precio');
        $indrediente -> save();
        return redirect()->route('ingredientes.index')->withStatus(__('Ingrediente creado correctamente.'));
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo('Opcion Temporalmente no implementada');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminamos un ingrediente
        
       $msg ="";
        try {
            $ingrediente = Ingrediente::find($id);
            $ingrediente->delete();
            $msg ="Ingrediente Eliminado";
        }
        catch(Exception $e) {
           $msg =$e->getMessage();
        }

        return redirect()->route('ingredientes.index')->withStatus($msg);
        
    }
}
