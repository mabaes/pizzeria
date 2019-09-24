<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pizza;
use App\Ingrediente;
use App\PizzaIngrediente;
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
        $model = Pizza::with('ingredientes')->get(); 
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
        $pizza -> save();
        $new_pizza = $pizza->piz_id;
        //dd($new_pizza);

        // obtenemos listado de precios
        $array_ingre = $request->get('ing_id');      
        $array_update = [];
        $i=0;

        /*********** terminada la inserción de ingredientes *****************/
        $ingredientesAdd = Pizza::find($new_pizza);
        $ingredientesAdd->ingredientes()->attach($array_ingre);
        
        
        /*obtenemos el precio*/
        $ingredientesPrecio = Ingrediente::whereIn('ing_id',$array_ingre)->get();
        $precio =0;
        foreach($ingredientesPrecio as $ingre){
            $precio = $precio + $ingre->ing_precio;
        }

        $precioIncremento = $precio*0.5;
        $precioFinal = $precio + $precioIncremento;

        //actualizamos el precio de la pizza:
        $pizza = Pizza::where('piz_id', $new_pizza)
                ->update(['piz_precio' => $precioFinal]);
   
        


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

    public function mostrarPizzas()
    {
      
        $model = Pizza::with('ingredientes')->get();
             
        return response()->json([
            $model
        ], 200);
        

    }
    
}
