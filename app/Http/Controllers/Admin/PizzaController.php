<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pizza;
use App\Ingrediente;
use DateTime;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //listado de ingredientes
        $model = Pizza::get();
        //dd($model);
        return view('admin.pizzas.index', ['pizzas' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ingredientes = Ingrediente::get();
        return view('admin.pizzas.create',['ingredientes' => $ingredientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'piz_nombre' => 'required|string|min:3|max:30', 
        'ing_id' =>   'required|array|min:1',
        'ing_id.*' => 'required|not_in:0'  
 
        ]);



        // guardamos el nombre de la pizza
        $pizza = new Pizza();
        $pizza->piz_nombre = $request->get('piz_nombre');
        $pizza->piz_imagen = $request->get('piz_imagen');
        //$pizza->piz_precio = $request->get('ing_precio');
        $pizza -> save();
        $new_pizza = $pizza->piz_id;
        dd($new_pizza);

        // obtenemos listado de precios
        $array_ingre = $request->get('ing_id');      
        $array_update = [];
        $i=0;

        /*creamos array para insertar los ingredientes*/
        /* y obtenemos los precios para calcular de forma automática el precio de las pizzas */
        /*por falta de tiempo no se ha podido implementar hasta el final*/
        /*
        $mydate = Carbon::now()->format('Y-m-d H:i:s');
        foreach($array_ingre as $key => $value){
            array_push( $array_update, array('pizing_idIngrediente'=>$array_ingre[$key], 'pizing_idPizza'=>$new_pizza, 'created_at'=>$mydate,'updated_at'=>$mydate));
            $i++;
        }
        */


        return redirect()->route('pizzas.index')->withStatus(__('Pizza creado correctamente.'));

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
        //
    }
}
