@extends('layouts.app')

@section('content')

<div class="ui container">
    <form class="ui form" id="equipos">
        <div class="two fields">
            <div class="field">
                <label>Equipo</label>
                <input type="text" name="equipo" placeholder="Equipo">
            </div>
            <div class="field">
                <label>Capacidad</label>
                <input type="text" name="capacidad" placeholder="Capacidad del equipo">
            </div>
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
    $('#equipos').form({
        inline:true,
        fields:{
            equipo:{
                identifer: 'equipo',
                rules:[{type:'empty',promt:'Agregar el equipo'},
                ]
            },
            capacidad:{
                identifer:'capacidad',
                rules:[{type:'empty',promt:'Agregar la capacidad del equipo'},
                ]
            }
        },
        onSuccess: function(event,fields){
            event.preventDefault();
            
            $.ajax({
                url : "/equipos",
                data : fields,
                type : "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(response){
                    iziToast.success({
                        title: 'OK',
                        message: 'El registro se ha guardado exitosamente',
                    });
                  $('#equipos').form('clear');
                  location.href="/equipos";
                },
                error: function(e){
                  console.error(e);
                }
              });
        }
    });
</script>

@endsection