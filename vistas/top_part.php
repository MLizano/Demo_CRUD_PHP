
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Sistema</title>

<!-- Custom styles for this template-->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" >
<link rel="stylesheet" href="../css/estilos.css" >

<link rel="stylesheet" href="../vendor/plugins/sweetalert2.min.css" >

</head>

<body id="page-top">

<!------- Page Wrapper ------->
<div id="wrapper">

    <!----------------------- Sidebar ------------------------->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!------- Divider ------->
        <hr class="sidebar-divider my-0">

        <!------- Nav Item - Dashboard ------->
        <li class="nav-item active">
            <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

            <h5 class="text-center"><span class="badge badge-success"><?php echo $_SESSION["s_usuario"];?></span></h5>             
        </li>

        <!------- Divider ------->
        <hr class="sidebar-divider">

        <!------- Heading ------->
        <div class="sidebar-heading">
            Menu
        </div>

        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
            <span>Usuarios</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
            <span>Tables</span></a>
        </li>
    </ul>
    <!----------------------- End of Sidebar ----------------------->

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
        <!-------------------------- Topbar -------------------------->
        <nav class="static-top shadow" style="height: 60px;">
            <div class="d-flex justify-content-end" style="padding-top: 10px; padding-right: 20px;">
                <a class="btn btn-danger btn-md" href="../db/logout.php" role="button">Cerrar Sesión</a>
            </div>
        </nav>
        <!----------------------- End of Topbar ----------------------->
