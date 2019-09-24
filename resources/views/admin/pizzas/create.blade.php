@extends('layouts.app', ['title' => __('Pizza Management')])
@section('mod_before_jquery')
    <!-- Bootstrap Select Stylesheet -->
     <link href="{{ asset('argon') }}/vendor/mbe_bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
@endsection


@section('mod_after_bootstrap')
   <!-- mabaes 2 Bootstrap Select Main JavaScript -->
   <script src="{{ asset('argon') }}/vendor/mbe_bootstrap-select/js/bootstrap-select.min.js"></script>
   <!-- Bootstrap Select Language JavaScript -->        
    <script src="{{ asset('argon') }}/vendor/mbe_bootstrap-select/js/i18n/defaults-es_ES.js"></script>
@endsection    


@section('content')
   
    @include('layouts.headers.admin', ['title' => __('Add Pizza')])   
   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">                                    
                                    {{ __('Add Pizza') }}                                        
                                    
                                </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pizzas.index') }}" class="btn btn-sm btn-primary">{{ __('<< Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('pizzas.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="row">
                            	<div class="col-6">
                            		<div class="form-group{{ $errors->has('piz_nombre') ? ' has-danger' : '' }}">
                                    	<label class="form-control-label" for="piz_nombre">{{ __('Nombre de la Pizza') }}</label>
                                    	<input type="text" name="piz_nombre" id="piz_nombre" class="form-control form-control-alternative{{ $errors->has('ing_nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{old('ing_nombre')}}" required autofocus>

                                    	@if ($errors->has('piz_nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('piz_nombre') }}</strong>
                                        </span>
                                    	@endif
                                	</div>
                            	</div>
                            	
                            	<!----------------- --->
                            	<div class="col">
                                        <div class="form-group{{ $errors->has('pizing_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pizing_id">{{ __('*Ingredientes. Se pueden asignar varios') }} <a tabindex="0" class="text-danger" role="alert" data-toggle="popover" data-trigger="hover" data-html="true">
                                        <select class="selectpicker form-control" name="ing_id[]" id="ing_id" multiple multiple data-style="form-control">
                                            <option value="0">Selec. Ingredientes: </option>
                                             @foreach($ingredientes as $ingrediente)                                                                                           
                                                <option value="{{ $ingrediente->ing_id }}" data-subtext="{{ $ingrediente->ing_precio }} €" >{{ $ingrediente->ing_nombre  }} </option>
                                             @endforeach

                                        </select>
                                        @if ($errors->has('ing_id.0') || $errors->has('ing_id')) 
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('ing_id.0') }}</strong> <strong>{{ $errors->first('ing_id') }}</strong>
                                            </small>
                                         @endif
                                        </div>
                                </div>
                                </div>
                            	<!--- --->                        		
                            	<div class="row">
                            	<div class="col">
                            		<div class="form-group{{ $errors->has('piz_imagen') ? ' has-danger' : '' }}">
                                    	<label class="form-control-label" for="piz_imagen">{{ __('Url Imagen') }}</label>
                                    	<input type="text" name="piz_imagen" id="piz_imagen" class="form-control form-control-alternative{{ $errors->has('piz_imagen') ? ' is-invalid' : '' }}" placeholder="{{ __('Url') }}" value="{{old('piz_imagen')}}" required>

                                    	@if ($errors->has('piz_imagen'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('piz_imagen') }}</strong>
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