@extends('layouts.app', ['title' => __('Listado de Ingredientes')])

@section('content')
@include('layouts.headers.admin', ['title' => __('Ingredientes')])

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><i class="fas fa-server"></i> {{ __('Ingredientes') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('ingredientes.create')}}" class="btn btn-sm btn-primary">{{ __('Add Ingrediente') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Id</th>                                    
                                    <th scope="col">Ingrediente</th>   
                                    <th scope="col">Precio (€)</th>                                          
                                    <th scope="col">Alta</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>   
                                @foreach ($ingredientes as $ingrediente)
                                    <tr>
                                        <td>{{$ingrediente->ing_id}}</td>
                                        <td>{{$ingrediente->ing_nombre}}</td>
                                        <td>{{$ingrediente->ing_precio}} </td>
                                        <td>{{$ingrediente->updated_at}}</td>
                                        <!--------------------- -->
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                        <form action="{{ route('ingredientes.destroy', $ingrediente->ing_id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('ingredientes.edit', $ingrediente->ing_id) }}"><i class="fas fa-edit"></i>{{ __('Editar') }} </a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Quieres eliminar este ingrediente?") }}') ? this.parentElement.submit() : ''"><i class="fas fa-trash-alt"></i>
                                                                {{ __('Eliminar') }}
                                                            </button>
                                                            
                                                        </form>    
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <!----------------- --->
                                    </tr>
                                @endforeach                         	
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection