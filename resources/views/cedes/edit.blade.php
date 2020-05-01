@extends('layouts.app')

@section('content')

<div class="ui container">
    <form action="" class="ui form" id="cede">
        <div class="two fields">
            <div class="field">
                <label>Cede</label>
                <input type="text" name="cede" value="{{$cede->nombre}}" placeholder="Cede">
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
    $('#cede').form({
        inline:true,
        fields:{
            cede:{
                identifer: 'cede',
                rules:[{type:'empty',promt:'Agregar la cede'},
                ]
            }
        },
        onSuccess: function(event,fields){
            event.preventDefault();
            
            $.ajax({
                url : "/cedes/{{$cede->id}}",
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
                  $('#cedes').form('clear');
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