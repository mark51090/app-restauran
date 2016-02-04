<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $titulo; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href= "<?php echo $this->config->item('base_url'); ?>">

    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type='text/javascript' src='js/jquery-1.8.2.js'></script>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">


    <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.ui.draggable.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/DataTables-1.8.1/media/js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.jeditable.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="js/highcharts.js"></script>
        <script type="text/javascript" src="js/exporting.js"></script>
        <script type="text/javascript" src="js/exporting.src.js"></script>

        <link rel="stylesheet" href="js/themes/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
        <link rel="stylesheet" href="js/themes/base/jquery.ui.base.css" type="text/css">

        <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

<script type="text/javascript">
$(document).ready(function()
  {


});

</script>

</head>
<body>

      <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand">Sistema de Información Académica: <b>Producción</b></a>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="">
              <i class="icon-user"></i> <?php
                                            echo $this->session->userdata('nombre');
                                        ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="disabled"><a><?php echo $this->session->userdata('tipo_usuario'); ?></a></li>
              <li class="divider"></li>
               <!-- Button trigger modal -->
              <li><a data-toggle="modal" href="#myModal"><i class="icon-refresh"></i> Cambiar contraseña</a></li>
              <li><a href="salir"><i class="icon-off"></i> Cerrar sesión</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="administrador"><i class="icon-home"></i> Inicio</a></li>
              <?php if ($this->session->userdata('informe') == "Si") { ?>
              <li><a href="informe/personal_academico"><i class="icon-list-alt"></i> Reportes</a></li>
              <?php } ?>
              <?php if ($this->session->userdata('administrar_usuarios') == "Si") { ?>
              <li><a href="usuarios/academico"><i class="icon-plus-sign"></i> Administrar usuarios</a></li>
                <div class="btn-group pull-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="icon-th-list"></i> Catálogos <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="catalogos/categoria"></i> Categoría</a></li>
                  <li><a href="catalogos/departamento"></i> Departamento</a></li>
                  <li><a href="catalogos/facultad"></i> Facultad</a></li>
                  <li><a href="catalogos/posgrado"></i> Posgrado</a></li>
                  <li><a href="catalogos/lineas"></i> Lineas de investigación</a></li>
                  <li><a href="catalogos/fuentes"></i> Fuentes de financiamiento</a></li>
                  <li><a href="catalogos/periodos"></i> Periodos</a></li>
                  <li><a href="catalogos/bd_index"></i> Bases de Datos index</a></li>
                </ul>
              </div>
              <li><a href="respaldo_bd"><img src="imagenes/database_save.png" title="Respaldar Base de Datos"></i></a></li>
              <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <!--#######################Modal para cambiar contraseña################################-->
     <div id="myModal" class="modal hide fade in" style="display: none;">
        <div class="modal-header">
            <a data-dismiss="modal" class="close">×</a>
            <h3>Cambio de contraseña</h3>
         </div>
         <div class="modal-body">
             <form action="cambiar_password" method="POST">
                 <!--label for="exampleInputEmail1">Nueva contraseña</label-->
                 <input type="password" class="form-control" name="passactual" placeholder="Contraseña actual"> </br>
                 <input type="password" class="form-control" name="password" placeholder="Nueva contraseña"> </br>
                 <input type="password" class="form-control" name="passconf" placeholder="Confirme nueva contraseña"></br>
             <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cambiar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
             </div>
            </form>
        </div>


    </div>
  <!--#######################################################-->
   <!--#######################Modal Créditos################################-->
     <div id="creditos" class="modal hide fade in" style="display: none;">
        <div class="modal-header">
            <a data-dismiss="modal" class="close">×</a>
            <h3>Créditos</h3>
         </div>
         <div class="modal-body"  style="text-align: center">
             <p>
                <h4><b>Sistema de Información Académica</b></h4>
                <h4><b>Instituto de Ciencias de la Salud</b></h4>
                <b>Dra. Patricia Pavón León</b><br>
                Directora del Instituto<br><br>
                <b>Mtro. Víctor Olivares García</b><br>
                Técnico Académico. Desarrollador del Sistema.<br><br>
                <b>Dr. Enrique Juárez Aguilar</b><br>
                Investigador. Asesor en el manejo de la información en el sistema.<br><br>
                <b>Marcos Rodríguez de la Rosa</b><br>
                Becario. Colaborador en el desarrollo del sistema.<br><br>
             </p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
    </div>
  <!--#######################################################-->
<div class="container">

      <div class="masthead">
          <h3 class="muted"> &nbsp; </h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container" align="center">
               <div class="btn-group">
                <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"><i class="icon-bullhorn icon-white"></i> Divulgación <span class="caret"></span></button>
                <ul class="dropdown-menu" style="text-align: left">
                    <li class="dropdown-submenu">
                       <a tabindex="-1" href="publicaciones/articulos/control"><i class="icon-pencil"></i> Publicaciones</a>
                        <ul class="dropdown-menu">
                            <li><a href="publicaciones/articulos/control"><i class="icon-list"></i> Artículos</a></li>
                            <li><a href="publicaciones/libros/control"><i class="icon-book"></i> Libros</a></li>
                            <li><a href="publicaciones/capitulos/control"><i class="icon-edit"></i> Capítulos de libro</a></li>
                        </ul>
                   </li>
                    <li><a href="publicaciones/ponencias/control"><i class="icon-asterisk"></i> Ponencias</a></li>
                </ul>
              </div>
              <div class="btn-group">
                <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> Docencia <span class="caret"></span></button>
                <ul class="dropdown-menu" align="left" style="text-align: left">
                    <li><a href="docencia/catedra/control"><i class="icon-hand-up"></i> Cátedra </a></li>
                    <li><a href="docencia/tesis/control"><i class="icon-screenshot"></i> Dirección de tesis </a></li>
                    <li><a href="docencia/tutorias_sit/control"><i class="icon-check"></i> Tutorías </a></li>
                    <li><a href="docencia/servicio/control"><i class="icon-check"></i> Servicio Social </a></li>
                </ul>
              </div>

             
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>
     </div> <!-- /container -->

     <div class="container-fluid">
             <?php echo $contenido; ?>
     </div>
      <hr>

      <div class="footer">
        <p>Sistema de información Académica | ICS-2015 | <a data-toggle="modal" href="#creditos">Créditos</a> </p>
      </div>
  </body>
</html>