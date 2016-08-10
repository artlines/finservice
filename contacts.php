
<?/**
 * Template name: Контакты
 */ get_header(); ?>
  <div class="contacts_left">
        <div class="row">
            <div class="col-md-6 col-sm-12 text">
                <h1>Контакты</h1>
              <?the_content();?>
            </div>
            <div id="map"></div>
        </div>
    </div>
    <div class="contacts_right">
        <div class="row">
            <div id="map_store"></div>
                        <?if(get_field('area_use')): the_field('area_use');endif;?>
            <div class="col-md-6 col-sm-12 text  col-md-offset-6">
                <?if(get_field('contacts')): the_field('contacts');endif;?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function initMap() {

          // Specify features and elements to define styles.
          var styleArray = [
            {
              featureType: "all",
              stylers: [
               { saturation: -150 }
              ]
            }
          ];

          // Create a map object and specify the DOM element for display.
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 56.840781, lng: 60.598269},
            scrollwheel: false,
            // Apply the map style array to the map.
            styles: styleArray,
            zoom: 17
          });
          var markerImage = new google.maps.MarkerImage(
            '/wp-content/themes/finservice/img/baloon.png',
            new google.maps.Size(54,78)
          );
          var marker = new google.maps.Marker({
            icon: markerImage,
            map: map,
            position: {lat: 56.840781, lng: 60.598269},
            title: 'Финсервис',
            description: 'г. Екатеринбург, ул. 8 Марта 1, оф. 1 '
          });
          var infowindow = new google.maps.InfoWindow({
           content: 'г. Екатеринбург, ул. 8 Марта 1, оф. 1 '
          });
          google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
          });

           var styleArray_store = [
            {
              featureType: "all",
              stylers: [
               { saturation: -150 }
              ]
            }
          ];

          // Create a map object and specify the DOM element for display.
          var map_store = new google.maps.Map(document.getElementById('map_store'), {
            center: {lat: 56.922618, lng: 60.497318},
            scrollwheel: false,
            // Apply the map style array to the map.
            styles: styleArray,
            zoom: 17
          });
          var markerImage_store = new google.maps.MarkerImage(
            '/wp-content/themes/finservice/img/baloon.png',
            new google.maps.Size(54,78)
          );
          var marker_store = new google.maps.Marker({
            icon: markerImage,
            map: map_store,
            position: {lat: 56.922618, lng: 60.497318},
            title: 'Финсервис',
            description: 'г. Екатеринбург, ул. Зеленая 50А'
          });
          var infowindow_store = new google.maps.InfoWindow({
           content: 'г. Екатеринбург, ул. Зеленая 50А'
          });
          google.maps.event.addListener(marker_store, 'click', function() {
              infowindow_store.open(map_store,marker_store);
          });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"
    async defer></script>
<? get_footer(); ?>
