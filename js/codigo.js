
// //-------------------------------------------------------------------------------------
// // funcion que valida el login a la plataforma
// $('#formLogin').submit(function(e){                   // "e" por convencion
//   e.preventDefault();                                 //evita el comportamiento por default

//   var usuario = $.trim($("#usuario").val());          //"trim" elimina los valores en blanco
//   var password = $.trim($("#password").val());

//   if(usuario.length == "" || password.length == ""){
//       Swal.fire({
//       icon: 'warning',
//       type: 'warning',
//       title: 'Oops...',
//       text: 'Ingrese Usuario y/o Contraseña',
//       showConfirmButton: false,
//       timer: 2000                      
//       }); 
//       return false;
//   }else{    
//     $.ajax({
//       url:"db/login.php",
//       type:"POST",    
//       datatype:"json",    
//       data:  {usuario:usuario, password:password},

//       success: function(data) {
//         console.log(data);
//         // if(data == null){
//         if(data == "null"){
//           Swal.fire({
//             icon: 'error',
//             title: 'Error...',
//             text: 'Usuario y/o Contraseña incorrectos',
//             showConfirmButton: false,
//             timer: 2000                        
//             });

//         }else{                  
//           Swal.fire({
//             icon: 'success',                          
//             title: '¡Conexión exitosa!',
//             text: 'Ya puede ingresar a la plataforma.',                                   
//             confirmButtonColor: '#3085d6',                          
//             confirmButtonText: 'Aceptar'

//           }).then((result) => {
//             if (result.value) {
//               window.location.href = "vistas/pag_administrador.php";                          
//             }
//           });                                                      
//         }
//       }
//     });			            
//   }
// });

$('#formLogin').submit(function(e){                         
  e.preventDefault(); 
  var usuario = $.trim($("#usuario").val());
  var password = $.trim($("#password").val());

  if(usuario.length == "" || password.length == ""){

      Swal.fire({
        icon: 'warning',
        type: 'warning',
        title: 'Oops...',
        text: 'Ingrese Usuario y/o Contraseña',
        showConfirmButton: false,
        timer: 2000                      
      });

      return false;
  }else{    
      $.ajax({
        url:"db/login.php",
        type:"POST",    
        datatype:"json",    
        data:  {usuario:usuario, password:password},    
        success: function(data) {
          console.log(data);

          if(data == "null"){
            Swal.fire({
              icon: 'error',
              title: 'Error...',
              text: 'Usuario y/o Contraseña incorrectos',
              showConfirmButton: false,
              timer: 2000                        
            });
          }else{                  
            Swal.fire({
              icon: 'success',                          
              title: '¡Conexión exitosa!',
              text: 'Ya puede ingresar a la plataforma.',                                   
              confirmButtonColor: '#3085d6',                          
              confirmButtonText: 'Aceptar'
  
            }).then((result) => {
              if (result.value) {
                  window.location.href = "vistas/pag_administrador.php";                          
              }
            })                                                               
          }
        }
      });			            
  }
});