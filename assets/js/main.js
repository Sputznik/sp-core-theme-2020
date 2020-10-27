jQuery(document).ready(function () {
  // Toggle open and close nav styles on click
  jQuery('#nav-toggle').click(function(e) {
    e.preventDefault();
    jQuery('.navbar-nav ul').slideToggle();
  });
  // Hamburger to X toggle
  jQuery('#nav-toggle').on('click', function() {
    this.classList.toggle('active');
  });
});

jQuery(window).scroll(function() {
  jQuery('.navigation.header1').toggleClass('scrolled', jQuery(this).scrollTop() > 5);
});
