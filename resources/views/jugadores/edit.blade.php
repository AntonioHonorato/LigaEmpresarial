@extends('layouts.app')

@section('content')

<div class="ui container">

    <form class="ui form" id="jugadores">
        
                        <div class="field">
                          <label>Nombre</label>
                          <input type="text" name="nombre" placeholder="Nombre" value="{{$jugador->nombre}}">
                        </div>
                        <div class="two fields">
                                <div class="field">
                                        <label>Apellido paterno</label>
                                        <input type="text" name="apaterno" placeholder="Apellido paterno" value="{{$jugador->apaterno}}">
                                      </div>
                                      <div class="field">
                                          <label>Apellido materno</label>
                                          <input type="text" name="amaterno" placeholder="Apellido materno" value="{{$jugador->amaterno}}">
                                      </div>
                        </div>
                        <div class="two fields">
                                <div class="field">
                                        <label>Dorsal</label>
                                        <input type="text" name="dorsal" placeholder="Dorsal" value="{{$jugador->dorsal}}">
                                      </div>
                                <div class="field">
                                    <label>Fecha nacimiento</label>
                                    <input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="{{$jugador->fechaNacimiento}}">
                                </div>
                        </div>
                        
                        
                        <button class="ui primary button">
                            <i class="save icon"></i>
                            Actualizar  
                        </button>
                      </form>
</div>

@endsection

@section('js')
    
    <script>
        $('#jugadores').form({
            inline:true,
            fields:{
                nombre:{
                    identifier:'nombre',
                    rules:[{type:'empty', prompt:'Agregar el nombre'},
                    ]
                },
                apaterno:{
                    identifer:'apaterno',
                    rules:[{type:'empty', prompt:'Agregar el apellido paterno'},
                    ]
                },
                amaterno:{
                    identifer:'amaterno',
                    rules:[{type:'empty',prompt:'Agregar el apellido materno'},
                    ]
                },
                dorsal:{
                    identifer:'dorsal',
                    rules:[{type:'empty',prompt:'Agregar el dorsal'},
                    ]
                },
                fechaNacimiento:{
                    identifer:'fechaNacimiento',
                    rules:[{type:'empty', prompt:'Agregar fecha de nacimiento'},
                    ]
                }
                
            },

            onSuccess:function(event,fields){
                event.preventDefault();
                
                $.ajax({
                    url : "/jugadores/{{$jugador->id}}",
                    data : fields,
                    type : "PUT",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(response){
                        iziToast.success({
                            title: 'OK',
                            message: 'El registro se ha actualizado exitosamente',
                        });
                      $('#jugadores').form('clear');
                      location.href="/jugadores";
                    },
                    error: function(e){
                      console.error(e);
                    }
                  });
            }
        });
    </script>


@endsection