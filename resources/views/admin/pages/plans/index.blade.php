@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
</ol>
<h1>Planos <a href="{{route('plans.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i>Adicionar</a></h1>
    Listagem de Planos
    <div class="card">
        <div class="card-header">
        <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                  @csrf
        <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                  <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i>Filtrar</button>
              </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <tr>
                       <th>Nome</th>
                       <th>Preço</th>
                       <th>Ações</th>
                   </tr>
               </thead>
               <tbody>
                  
                @if(isset($plans))
                   @foreach ($plans as $plan)
                  <tr>                   
                    <td>
                        {{$plan->name}}
                    </td>
                    <td>
                        {{$plan->price}}
                    </td>
                    <td >
                        <a href="{{route('plans.edit',$plan->url)}}" class="btn btn-info">Editar</a>
                        <a href="{{route('plans.show',$plan->url)}}" class="btn btn-warning"><i class="fas fa-search-plus"></i> VER</a>  
                    </td>
                    </tr>
                    
                     @endforeach
               @endif
               </tbody>
                   
           </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop
