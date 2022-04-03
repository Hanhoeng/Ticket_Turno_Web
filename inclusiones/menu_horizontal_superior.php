<?php
session_start();
?>
<style>
    .navbar {
        font-family: Verdana, sans-serif;
        font-size: 18px !important;
    }

    .dropdown:hover .drop-catalogo {
        display: block;
    }

    .dropdown:hover .drop-ajustes {
        display: block;
    }
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<?php if(isset($_SESSION['usuario'])){?>
      <a class="btn btn-success" href="Ticket_Turno.php">Registro</a>
      <a class="btn btn-warning" href="buscador.php" style="margin-left: 5px">Regresar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
        <!--  <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Disabled</a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CRUD-Ticket</a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="Ticket_Turno.php">GENERAR TURNO</a>
              <a class="dropdown-item" href="buscador.php">BUSCAR TURNO</a>
            </div>
          </li>
<?php }else{ ?>
      <a class="btn btn-success" href="Ticket_Turno.php">Registro</a>
      <a class="btn btn-warning" href="modificar_Ticket.php" style="margin-left: 5px">Modificar ticket</a>
      <a class="btn btn-warning" href="index.php" style="margin-left: 5px">Regresar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
<?php } ?>
          <!--
          <li class="nav-item active">
            <a class="nav-link" href="#">Usuarios <span class="sr-only">(current)</span></a>
          </li>
-->
          <?php if(isset($_SESSION['usuario'])){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['usuario']);?></a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
            </div>
          </li>
          <?php } ?>

         </ul>
        <!--<form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>-->
      </div>
</nav>