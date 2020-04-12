@extends('layouts.app')

@section('content')

<div class="ui container">

    <form class="ui form" id="grupos">
        
                        <div class="field">
                          <label>Nombre del grupo</label>
                          <input type="text" name="nombre" placeholder="Nombre">
                        </div>
                        <button class="ui primary button">
                            <i class="save icon"></i>
                            Guardar
                        </button>
                      </form>
</div>

@endsection

@section('js')
    
    <script>
        $('#grupos').form({
            inline:true,
            fields:{
                nombre:{
                    identifier:'nombre',
                    rules:[{type:'empty', prompt:'Agregar el nombre'},
                    ]
                }
                
            },

            onSuccess:function(event,fields){
                event.preventDefault();
                
                $.ajax({
                    url: '/grupos',
                    data: fields,
                    type:'POST',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        iziToast.success({
                            title:'OK',
                            message:'El registro se ha guardado exitosamente',
                        });
                        $('#grupos').form('clear');
                        location.href="/grupos";
                    },
                    error:function(e){
                     console.error(e);
                    }
                });
            }
        });
    </script>


@endsection