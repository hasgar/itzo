		<script type="text/javascript" src="/js/jquery-lib.js"></script><!-- Jquery Library -->
		<script type="text/javascript" src="/js/jquery-migrate-1.3.0.min.js"></script>
		<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDBRHrNXU7Sji41bzKA3DQOVYl8ThTttYM'></script>
<script src="/js/location-picker.js"></script>
<script>
    jQuery('#somecomponent').locationpicker({
        location: {
            latitude: 21.9124471,
            longitude: 77.919273
        },
        radius: 300,
		zoom: 4,
        inputBinding: {
            latitudeInput: $('#loc-lat'),
            longitudeInput: $('#loc-lon'),
            radiusInput: $('#loc-rad'),
            locationNameInput: $('#loc-add')
        }
    });
</script>
<script src="/js/js-validator/dist/jquery.validate.js"></script>
<script> $("#add-healthcare").validate(); </script>
		<script type="text/javascript" src='/js/mapbox.js'></script>
		<script type="text/javascript" src='/js/leaflet.markercluster.js'></script>
		<script type="text/javascript" src="/js/build.min.js"></script>
		<script type="text/javascript" src="/lib/chosen/chosen.jquery.js" ></script>
		<script type="text/javascript" src="/js/jquery-ui.js"></script>

		<script type="text/javascript" src="/js/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
		<script>$(document).ready(function() {
 var addType = 1;
$(".add-type").on("click" ,function() {
     $(".treatment-type-"+(addType+1)).show();
    addType++;
});
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});</script>
		<script>
  $( function() {
    $( "#dateOfBook" ).datepicker({dateFormat: 'yy-mm-dd'});
  } );
  </script>
		<script type="text/javascript" src="/lib/slick/slick.min.js"></script>
		<script type="text/javascript" src="/lib/jquerym.menu/js/jquery.mmenu.min.all.js"></script>
		<script type="text/javascript" src="/lib/Magnific-Popup-master/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="/lib/jQuery.filer-master/js/jquery.filer.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap-rating.js"></script>
		<script type="text/javascript" src="/lib/popup/js/classie.js"></script> <!-- Popup -->
		<script type="text/javascript" src="/lib/popup/js/modalEffects.js"></script> <!-- Popup -->
		
		<script type="text/javascript" src="/js/main.js"></script>
		