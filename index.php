<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

   <title>Login</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" >
   <link rel="stylesheet" href="css/estilos.css" >

   <link rel="stylesheet" href="vendor/plugins/sweetalert2.min.css" >
 
</head>

<body>
   
   <div id="login">

      <div class="container">                        
         <div id="login-row" class="row justify-content-center align-items-center">
               <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12  bg-light text-dark">

                     <form id="formLogin" class="form" action="" method="post">
                           <h3 class="text-center text-dark">Iniciar Sesión</h3>
                           <div class="form-group">
                              <label for="usuario" class="text-dark">Usuario</label><br>
                              <input type="text" name="usuario" id="usuario" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="password" class="text-dark">Password</label><br>
                              <input type="password" name="password" id="password" class="form-control">
                           </div>
                           <div class="form-group text-center" style="margin-top: 20px;">                                
                              <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Conectar">
                           </div>                            
                     </form>

                  </div>
               </div>
         </div>
      </div>
   </div>


<!-- /////////////////////////////////////////////////////////// -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="vendor/jquery/jquery-3.6.0.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/plugins/sweetalert2.all.min.js"></script>
<script src="js/codigo.js"></script>

</body>
</html>