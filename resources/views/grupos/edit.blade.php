@extends('layouts.app')

@section('content')

<div class="ui container">
    <form action="" class="ui form" id="grupos">
        
            <div class="field">
                <label>Nombre del grupo</label>
                <input type="text" name="equipo" value="{{$grupo->nombre}}" placeholder="Nombre">
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
    $('#grupos').form({
        inline:true,
        fields:{
            grupo:{
                identifer: 'grupo',
                rules:[{type:'empty',promt:'Nombre del grupo'},
                ]
            }
        },
        onSuccess: function(event,fields){
            event.preventDefault();
            
            $.ajax({
                url : "/grupos/{{$grupo->id}}",
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
                  $('#grupos').form('clear');
                  location.href="/grupos";
                },
                error: function(e){
                  console.error(e);
                }
              });
        }
    });
</script>

@endsection