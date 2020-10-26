jQuery(document).ready(function () {
  // If a link has a dropdown, add sub menu toggle.
  jQuery('.navbar-nav ul li a:not(:only-child)').click(function(e) {
    jQuery(this).siblings('.sub-menu').toggle();
    // Close one dropdown when selecting another
    jQuery('.sub-menu').not(jQuery(this).siblings()).hide();
  });
  // Clicking away from dropdown will remove the dropdown class
  jQuery('html').click(function() {
    jQuery('.sub-menu').hide();
  });
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
  jQuery('.navigation.header1').toggleClass('sticky', jQuery(this).scrollTop() > 5);
});
