@extends('layouts.app')

@section('content')

<div class="ui container">
    <form class="ui form" id="cedes">
        <div class="three fields">
            <div class="field">
                <label>Cede</label>
                <input type="text" name="nombre" placeholder="Cede">
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
    $('#cedes').form({
        inline:true,
        fields:{
            nombre:{
                identifer: 'nombre',
                rules:[{type:'empty',promt:'Agregar cede'},
                ]
            }
        },
        onSuccess: function(event,fields){
            event.preventDefault();
            
            $.ajax({
                url : "/cedes",
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
                  location.href="/cedes";
                },
                error: function(e){
                  console.error(e);
                }
              });
        }
    });
</script>

@endsection