@extends('layouts.app', ['title' => __('User Management')])


@section('content')
   
    @include('layouts.headers.admin', ['title' => __('Add Ingrediente')])   
   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">                                    
                                    {{ __('Add Ingrediente') }}                                        
                                    
                                </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('ingredientes.index') }}" class="btn btn-sm btn-primary">{{ __('<< Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ingredientes.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="row">
                            	<div class="col-6">
                            		<div class="form-group{{ $errors->has('ing_nombre') ? ' has-danger' : '' }}">
                                    	<label class="form-control-label" for="ing_nombre">{{ __('Ingrediente') }}</label>
                                    	<input type="text" name="ing_nombre" id="ing_nombre" class="form-control form-control-alternative{{ $errors->has('ing_nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{old('ing_nombre')}}" required autofocus>

                                    	@if ($errors->has('ing_nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ing_nombre') }}</strong>
                                        </span>
                                    	@endif
                                	</div>
                            	</div>
                            	<div class="col-6">
                            		<div class="form-group{{ $errors->has('ing_precio') ? ' has-danger' : '' }}">
                                    	<label class="form-control-label" for="ing_precio">{{ __('Precio (€)') }}</label>
                                    	

                                    	<input type="number" name="ing_precio" id="ing_precio" style="width: 200px;" class="form-control form-control-alternative{{ $errors->has('ing_precio') ? ' is-invalid' : '' }}" placeholder="" value="{{old('ing_precio')}}"  min="0.00" max="10000.00" step="0.01" required >

                                    	@if ($errors->has('ing_precio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ing_precio') }}</strong>
                                        </span>
                                    	@endif
                                	</div>
                            		
                            	</div>
                            </div>  
                            <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                            </div>                  
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
   
@endsection