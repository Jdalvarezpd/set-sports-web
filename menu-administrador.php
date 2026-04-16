<div class="row justify-content-center" style=" padding: 0em 1em 0em 1em; margin-top: 1em; margin-bottom: 1em;">
	<div class="col-md-12">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark navigation_bar" style="padding: 0px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent1">

            <!--<ul class="navbar-nav mr-auto">-->
            <ul class="navbar-nav">
              <li class="nav-item <?php if($page=='evento'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>">
                <a href="<?php echo 'evento?id=' . $id_evento ?>" style="padding: 1em 1.5em;" class="nav-link">Configuracion</a>
              </li>
              <li class="nav-item <?php if($page=='evento-invitaciones'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>" style="margin-left: 1em;">
                <a href="<?php echo 'evento-invitaciones?id=' . $id_evento ?>" style="padding: 1em 1.5em;" class="nav-link">Invitaciones</a>
              </li>
              <li class="nav-item <?php if($page=='evento-equipos'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>" style="margin-left: 1em;">
                <a href="<?php echo 'evento-equipos?id=' . $id_evento ?>" style="padding: 1em 1.5em;" class="nav-link">Equipos</a>
              </li>
              <li class="nav-item <?php if($page=='evento-jornadas'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>" style="margin-left: 1em;">
                <a href="<?php echo 'evento-jornadas?id=' . $id_evento ?>" style="padding: 1em 1.5em;" class="nav-link">Jornadas</a>
              </li>
              <li class="nav-item <?php if($page=='evento-noticias'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>" style="margin-left: 1em;">
                <a href="<?php echo 'evento-noticias?id=' . $id_evento ?>" style="padding: 1em 1.5em;" class="nav-link">Noticias</a>
              </li>
              </ul>
          </div>   
        </nav>
	</div>
</div>