
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LigaEmpresarial</title>

    @yield('style')

</head>
<body>
    <div class="ui container">
            <div class="ui inverted menu">
                      <a class="item" href="/tipostorneos">
                        Tipos de torneo
                    </a>
                    
                    <a class="item" href="/grupos">
                      Grupos
                    </a>
                    <a class="item" href="/equipos">
                      Equipos
                    </a>
                    <a class="item" href="/cedes">
                      Cedes
                      <a class="item" href="/jugadores">
                        Jugadores
                      </a>
                      <a class="item" href="/jugadores">
                        Tarjetas
                      </a>   
            </div>
      </div>
</br>
    @yield('content')
    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
    <script src="/js/iziToast.min.js"></script>
    
    <script>

      //MODAL
        $('.btnDelete').click(function(e){
          let id  = $(this).data('id');

          $('#modalDelete').modal({
              closable  : false,
              onDeny    : function(){
              
              },
              onApprove : function() {
          
                  $.ajax({
                      url : "/jugadores/"+id,
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

      //Dropdown para las acciones
      $('.dropdown').dropdown();
      
      //DataTable
      $(document).ready(function() {
        $('#example').DataTable();
    } );


    //Buscador de equipos
    $('.ui.search')
    .search({
      apiSettings: {
        url: '/equipos?q={query}',
        onResponse : function(arrayDatos){
          var response = { results : [] };
          $.each(arrayDatos, function(k,v){
            response.results.push(v);
          });
          return response;
        }
      },
      /*fields:{
        title: 'title'
      },*/
      minCharacters : 3
    })
  ;

    </script>
    
    @yield('js')
    
</body>
</html>