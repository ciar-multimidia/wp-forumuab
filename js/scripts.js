jQuery(document).ready(function($) {

  //////////////////////////////////////// MENU CANVAS
  $( "main" ).prepend( "<div class='canvas-overlay'></div>" );

  function escondeCanvas() {
    $('.canvas, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').removeClass('db');
    },330)
    $('main').off('mousedown', escondeCanvas);
    $('.canvas').off('swipeleft', escondeCanvas);
    $('.canvas-overlay').removeClass('visivel');
    console.log('escondeu');
    
  }

  function mostraCanvas() {
    $('.canvas, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').addClass('visivel');
    },20)
    $('main').on('mousedown', escondeCanvas);
    $('.canvas').on('swipeleft', escondeCanvas);
  }
  $('#bt-menu').on('click', function(){
    mostraCanvas();
  });  

  
  //////////////////////////////////////// PEGAR ALTURAS
  var topBar = $('#topbar');
  var marcaHome = $('#marca-home');
  var cabecalho = $('#cabecalho');
  var cabecalhoCnt = $('#cabecalho .container');
  var alturacabecalhoCnt = cabecalhoCnt.height();
  var alturaMenuHome = topBar.height();
  
  marcaHome.css('padding-top', alturaMenuHome);
  cabecalho.css('padding-top', alturaMenuHome);
  $(".menu-interno > ul > li").css('line-height', alturacabecalhoCnt + 'px');
  

  //////////////////////////////////////// FANCYBOX
  var abrirFancybox = $('.abre-modal');
  abrirFancybox.on('click', function(event) {
    var thisTarget = $(this).data('target');
    event.preventDefault();
    $.fancybox.open($(thisTarget));
  });


  // galeria gutenberg
  var linkIMGfancybox = $('.wp-block-gallery figure a');
  linkIMGfancybox.attr('data-fancybox', 'gallery');
  linkIMGfancybox.fancybox({
    caption : function( instance, item ) {
      return $(this).siblings('figcaption').html();
    }
  });


});
