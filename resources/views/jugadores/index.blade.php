@extends('layouts.app')

@section('content')

<div class="ui container">
        <a href="/jugadores/create" class="ui primary button">
            <i class="plus icon"></i>
            Agregar jugador
        </a>

        <table id="example" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>NOMBRE COMPLETO</th>
                    <th>DORSAL</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th colspan="2">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugador as $item)
                <tr>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->dorsal}}</td>
                    <td>{{$item->fecha_nacimiento}}</td>
                    <td><a class="ui button" href="/jugadores/{{$item->id}}/edit"><i class="edit icon"></i></a></td>
                    <td><div class="ui button btnDelete" data-id="{{$item->id}}"><i class="delete icon"></i></div></td>   
                </tr>
                @endforeach
            </tbody>
        </table>
        
</div>
    @include('modalDelete')
@endsection

@section('js') 

@endsection