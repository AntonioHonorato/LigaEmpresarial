@extends('layouts.app')

@section('content')

<div class="ui container">
    <a href="/cedes/create" class="ui primary button">
        <i class="plus icon"></i>
        Agregar cede
    </a>


<table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>CEDES</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
                @foreach($cedes as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>
                            <div class="ui icon dropdown">
                                <i class="bars icon"></i>
                                <div class="menu">
                                  <div class="item"><a href="/cedes/{{$item->id}}/edit"><i class="edit icon"></i>Editar</a></div>
                                  <div class="item"><div class="btnDelete" data-id="{{$item->id}}"><i class="delete icon"></i>Eliminar</div></div>
                                  </div>
                                </div>
                            </td>  
                    </tr>
                @endforeach
            </tbody>
    </table>

    
</div>
    @include('modalDelete')
@endsection

@section('js')

@endsection