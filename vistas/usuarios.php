
<?php
   include_once '../db/conexion.php';
   $objeto = new Conexion();
   $conexion = $objeto->Conectar();

   $consulta = "SELECT * FROM usuarios";
   $resultado = $conexion->prepare($consulta);
   $resultado->execute();
   $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Usuarios</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" >
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" >

</head>
<body>
   
   <header>
      <h3 class="text-center text-dark">Usuarios</h3>
   </header>

   <div class="container">
      <div class="row">
         <div class="col-lg-12" style="padding-bottom: 30px">
            <button id="btnNuevo" type="button" class="btn btn-success nuevo" data-toggle="modal"> Nuevo </button>
         </div>
      </div>
   </div>

   <div class="container">
      <div class="row">
         <div class="col-lg-12";
}">
            <div class="table-responsive">
               <table id="tablaUsuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%; text-align: center;">
                  <thead class="bg-secondary text-white">
                     <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th hidden>Clave</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach($data as $dat){
                     ?>
                     <tr>
                        <td><?php echo $dat['id'] ?></td>
                        <td><?php echo $dat['usuario'] ?></td>
                        <td hidden><?php echo $dat['password'] ?></td>

                        <?php 
                           if($dat['idRol'] == 1){
                                 echo "<td>Administrador</td>";
                           }else if($dat['idRol'] == 2){
                                 echo "<td>Colaborador</td>";
                           }
                        ?>
                        <!------- acciones editar/eliminar ------->
                        <td>
                           
                        </td>

                     </tr>
                     <?php
                        }
                     ?>
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>


   <!---------------------------------------- Modal ---------------------------------------->
   <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-tittle" id="exampleModalLabel"></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form id="formUsuarios">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="usuario" class="col-form-label">Usuario::</label>
                     <input type="text" class="form-control" id="usuario">
                  </div>
                  <div class="form-group">
                     <label for="clave" class="col-form-label">Clave:</label>
                     <input type="text" class="form-control" id="clave">
                  </div>
                  <div class="form-group">
                     <label for="rol" class="col-form-label">Rol:</label>
                     <input type="text" class="form-control" id="rol">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal" data-toggle="modal">Cancelar</button>
                  <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   
   <!-- /////////////////////////////////////////////////////////// -->
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="../js/datatableUsuarios.js"></script>
   
</body>
</html>