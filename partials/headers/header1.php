<?php

  $nav_transparent = sp_is_sticky_nav_transparent();
  $bg_class = (! $nav_transparent ) ? 'sticky-solid' : 'sticky-transparent'; // HEADER CLASS BASED ON USER INPUT

?>
<div class="navigation header1 <?php _e( $bg_class );?>">
  <div class="nav-container">
    <div class="brand">
      <?php
        // SHOW LOGO IF
        if( ! $nav_transparent ){
          do_action('sp_logo');
        }
        else{
          do_action('sp_sticky_logo');
          do_action('sp_logo');
        }
      ?>
    </div>
    <nav class="navbar-nav navbar-right">
      <div class="nav-mobile">
        <a id="nav-toggle" href="#">
        <span></span></a>
      </div>
      <?php
        do_action('sp_nav_menu');
      ?>
    </nav>
  </div>
</div>
