@extends('layouts.app')

@section('content')

<div class="ui container">
    <a href="/grupos/create" class="ui primary button">
        <i class="plus icon"></i>
        Agregar grupo
    </a>

    <table class="ui table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>NUMERO DE EQUIPOS</th>
                <th colspan="2">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td><a class="ui button" href="/grupos/{{$item->id}}/edit"><i class="edit icon"></i></a></td>
                    <td><div class="ui button btnDelete" data-id="{{$item->id}}"><i class="delete icon"></i></div></td>  
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @include('modalDelete')
@endsection

@section('js')

    <script>
        $('.btnDelete').click(function(e){
                    let id  = $(this).data('id');

                    $('#modalDelete').modal({
                        closable  : false,
                        onDeny    : function(){
                        
                        },
                        onApprove : function() {
                    
                            $.ajax({
                                url : "/grupos/"+id,
                                type : "DELETE",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success : function(response){
                                    iziToast.success({
                                        title: 'OK',
                                        message: 'El registro se ha eliminado exitosamente',
                                    });

                                    $('#modalDelete').modal('hide');
                                },
                                error: function(e){
                                  console.error(e);
                                }
                              });

                        }
                    }).modal('show');
                }
            )
    </script>  

@endsection