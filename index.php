<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="lib/bootstrap-4.0.0_lite/css/bootstrap.min.css" type="text/css">
  <title>Paginacion Get</title>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fa d-inline fa-lg fa-list"></i> 
        <b>INSERT DATABASE</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    </div>
  </nav>
  <div class="section py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          
          <table align='center'  class="table">
            <tr>
              <td colspan="2" align="center">
                <h2 style="color:#6E6E6E;"><b>Registro de Libro</b></h2>
              </td>
            </tr>
            <tr>
              <th>Codigo: </th>
              <td>
                <input type='text' id='codigo' class="form-control" value="" maxlength='30' size='10'>
              </td>
            </tr>
            <tr>
              <th>Titulo: </th>
              <td>
                <input type='text' id='titulo' class="form-control" value="" maxlength='30'>
              </td>
            </tr>
            <tr>
              <th>Autor: </th>
              <td>
                <select id="autor" class="form-control">
                  <option value='gauss'>Gauss</option>
                  <option value='newton'>Newton</option>
                  <option value='mario'>Mario Vargas LL.</option>
                  <option value='aristoteles'>Aristoteles</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>Editorial: </th>
              <td>
                <select id="editorial" class="form-control">
                  <option value='losescritores'>Los escritores</option>
                  <option value='academia'>Academia de Historia</option>
                  <option value='achebe'>Achebe Ediciones</option>
                  <option value='alba'>Alejo Editorial</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>N° Ejemplares: </th>
              <td>
                <input type='number' id='ejemplares' value="" maxlength='30' size="6" class="form-control">
              </td>
            </tr>
            <tr>
              <th>Fecha Registro: </th>
              <td>
                <input type="date" id="fech_registro" value="<?=date("Y-m-d")?>" class="form-control">
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <button type="button" class="btn btn-secondary" onclick="bookSave();">Registrar Libro</button>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                  <!-- Mensaje de confirmación se imprimira aqui -->
                <div class="alert" role="alert" id="message_rsta" style="display: none;"></div>

              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.1.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/popper.min.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/bootstrap.min.js"></script>
  <script>
  	$(document).ready(function() {
      
    });
    function bookSave(){
      //Restricción de entrada de datos [ONLY TITULO]
      if( $("#titulo").val() == "" ){
        alert("No ingreso un titulo al libro");
        return; //Cancelamos Operación
      }
      // Envio de datos al servidor
      $.post("query_sql.php",{
        action: "registerBook" //acción a ejecutar en QUERY_SQL
        ,codigo: $("#codigo").val()
        ,titulo: $("#titulo").val()
        ,autor: $("#autor").val()
        ,editorial: $("#editorial").val()
        ,ejemplares: $("#ejemplares").val()
        ,fech_registro: $("#fech_registro").val()
      },function(id_res){ //Respuesta del servidor

        if(id_res>0){ //Si es mayor a cero, hubo registro exitoso
          $("#message_rsta").attr("class","alert alert-success"); //Color verde
          $("#message_rsta").html("Se registro con exito [ID: "+id_res+"]").show();
        }else{
          $("#message_rsta").attr("class","alert alert-danger"); //Color rojo
          $("#message_rsta").html("Error al Registrar").show();
        }
        // Solo por 3 seg. se muestra el mensaje de confirmación
        setTimeout(function(){
          $("#message_rsta").hide();
          window.location.reload();
        },3000);
      });
    }
  </script>
</body>
</html>