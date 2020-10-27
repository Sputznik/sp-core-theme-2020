<div class="navigation header1 sticky-solid">
  <div class="nav-container">
    <div class="brand">
      <a href="#!">Logo</a>
    </div>
    <nav class="navbar-nav navbar-right">
      <div class="nav-mobile">
        <a id="nav-toggle" href="#">
        <span></span></a>
      </div>
      <?php
        wp_nav_menu(
          array(
            'menu'              => 'primary',
      			'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
      			'container_class'   => 'nav-list-wrapper',
      			//'container_id'    => '',
      			'menu_class'        => 'nav-list',
          )
        );
      ?>
    </nav>
  </div>
</div>
