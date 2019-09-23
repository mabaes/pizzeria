@extends('layouts.app', ['title' => __('Listado de Pizzas')])




@section('content')
@include('layouts.headers.admin', ['title' => __('Pizzas')])

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><i class="fas fa-server"></i> {{ __('Pizza') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('pizzas.create')}}" class="btn btn-sm btn-primary">{{ __('Add Pizza') }}</a>
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
                                    <th scope="col">Pizza</th> 
                                    <th scope="col">Ingredientes</th>                                                                         
                                    <th scope="col">Alta</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>   
                                @foreach ($pizzas as $pizza)
                                    <tr>
                                        <td>{{$pizza->piz_id}}</td>
                                        <td>{{$pizza->piz_nombre}}</td>
                                        <td>xxxxx </td>
                                        <td>{{$pizza->updated_at}}</td>
                                        <!--------------------- -->
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                        <form action="{{ route('pizzas.destroy', $pizza->piz_id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('pizzas.edit', $pizza->piz_id) }}"><i class="fas fa-edit"></i>{{ __('Editar') }} </a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Quieres eliminar este pizza?") }}') ? this.parentElement.submit() : ''"><i class="fas fa-trash-alt"></i>
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