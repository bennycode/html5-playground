jQuery(document).ready(function($) {

  var bodyClass = (navigator.userAgent.match(/(Android|iPad|iPhone|iPod|Windows Phone)/g) ? 'mobile' : 'desktop');
  $('body').addClass(bodyClass);

});