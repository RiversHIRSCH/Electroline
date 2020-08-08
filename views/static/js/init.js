$(document).ready(function () {
  $('.sidenav').sidenav();
  $('.dropdown-trigger').dropdown();
  $('.modal').modal();
  $('.tooltipped').tooltip();
  $('.parallax').parallax();
  $('.carousel').carousel();
  var elems = document.querySelectorAll('.fixed-action-btn');
  var instances = M.FloatingActionButton.init(elems, {
    direction: 'top'
  });
  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
  $('.dropdown-trigger').dropdown();
  $('.tap-target').tapTarget();
  $('.scrollspy').scrollSpy();
  $('.tabs').tabs();
  //M.AutoInit(); // Inicializar todos los elementos
});