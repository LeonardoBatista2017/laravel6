@extends('adminlte::page')

@section('title', 'Editar o Plano'."{$plan->name}")

@section('content_header')

<h1>Editar o Plano {{$plan->name}}</h1>
@stop

@section('content')

    <div class="card">
         <div class="card-body">
         <form action="{{route('plans.update',$plan->url)}}" class="form" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                    <label>Nome:</label>
                 <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$plan->name}}">
                 </div>
                 <div class="form-group">
                     <label>Preço:</label>
                     <input type="text" name="price" class="form-control" placeholder="Preço" value="{{$plan->price}}">
                 </div>
                 <div class="form-group">
                     <label>Descrição</label>
                     <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$plan->description}}">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
             </form>
         </div>
    </div>
@endsection