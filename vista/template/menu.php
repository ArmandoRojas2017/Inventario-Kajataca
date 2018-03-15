<!-- Menu Dinamico -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">

        <!-- Boton para el responsive  -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Menu de Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="?url=home" >
    
      <div id="home" > 

        Kajataca <i class="glyphicon glyphicon-home"></i> 

      </div>
     
         
       </a>
    </div>

   
  <!-- Parte toggle -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      


      <!-- Opciones provenientes del Controller -->
      <?php foreach ( $opciones as $opc): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          
          <!-- Asinar Icono de Glyphicon -->
           <i class=<?= "'glyphicon glyphicon-".$opc['icono']."'" ?> ></i>
           
           <!-- Imprimir el Titulo -->
          <?= $opc['titulo']  ?>

         
            <!-- Flechas -->
          <span class="caret"></span>

          </a>

          <ul class="dropdown-menu" role="menu">

            <!-- Asignar texto e Icono -->
            <?php foreach ($opc['contenido'] as $key => $sub): ?>
              <li>
                <a href="#" id=<?=$key ?> > <?= $sub['texto']  ?>  
                <i class=<?= "'glyphicon glyphicon-".$sub['icono']."'" ?> ></i>   
                </a>
              </li>
            <?php endforeach ?>

          </ul>
        </li>

        <?php endforeach ?>
        <!-- Fin de Opciones provenientes del Controller  -->


     <!-- Opcion de Ver PErfil -->
        <li>

         <a id=ver >
         <i class="glyphicon glyphicon-user " ></i>
          Ver Perfil  

          </a>
        </li>
          <!-- fin de la opcion -->

     <!-- Opcion de Ver PErfil -->
        <li>

         <a id=ayuda >
         <i class="glyphicon glyphicon-question-sign " ></i>
          ¡Ayuda! 

          </a>
        </li>
          <!-- fin de la opcion -->


          <!-- Opcion de Cerrar sesion -->
        <li>

         <a id=cerrar >
         <i class="glyphicon glyphicon-off " ></i>
          Cerrar Sesión  

          </a>
        </li>
          <!-- fin de la opcion -->

      </ul>
      
 
    </div>

  
  </div>
</nav>
<!-- Fin de Menu dinamico -->

<!-- Verificar Usuario -->
<div id=verificar></div>

<!-- Fin de Verificiar Usuario -->


<!-- Modal cervezeria -->
<div id=modal_cervezeria></div>

<!-- Fin de Modal Cervezeria -->

<!-- Modal  kajataca -->
<div id=modal_kajataca></div>

<!-- Fin de Modal kajataca -->

<!-- Modal  ayuda -->
<div id=modal_ayuda></div>

<!-- Fin de Modal ayuda-->