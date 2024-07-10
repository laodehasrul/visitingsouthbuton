<div>
    <div class="my-[200px]">

        <div class="h-screen max-w-6xl mx-auto shadow-xl">
            <div class="flex space-x-5">
            </div>
            <div class="w-full h-screen" wire:ignore id="map">
            </div>
        </div>
    </div>

</div>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&region=GB'></script>
<script defer>
	function initialize() {
		var mapOptions = {
			zoom: 12,
			minZoom: 6,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},
			center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			panControl:false,
			mapTypeControl:false,
			scaleControl:false,
			overviewMapControl:false,
			rotateControl:false
	  	}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var image = new google.maps.MarkerImage("assets/images/pin.png", null, null, null, new google.maps.Size(40,52));
        
        var myLayer = new google.maps.Data();
        myLayer.loadGeoJson(
            {!! $geoJson !!}, {},
            function(features) {
            console.log("loadGeoJson callback " + features.length);
            myLayer.forEach(function(feature) {
                console.log("Test");
            });
            });
        myLayer.setMap(map);
        const loadGeoJSON = (geojson) => {
 
            geojson.features.forEach(function (marker) {
                const {geometry, properties} = marker
                const {iconSize, locationId, title, image, description} = properties

                let el = document.createElement('div');
                el.className = 'marker' + locationId;
                el.id = locationId;
                el.style.backgroundImage = 'url({{asset("image/car2.png")}})';
                el.style.backgroundSize = 'cover';
                el.style.width = iconSize[0] + 'px';
                el.style.height = iconSize[1] + 'px';

                const pictureLocation = '{{asset("/storage/images")}}' + '/' + image

                const content = `
                <div style="overflow-y: auto; max-height:400px;width:100%;">
                    <table class="table table-sm mt-2">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>${title}</td>
                            </tr>
                            <tr>
                                <td>Picture</td>
                                <td><img src="${pictureLocation}" loading="lazy" class="img-fluid"/></td>
                            </tr>
                            <tr>
                                <td>Description</td>         
                                <td>${description}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                `;
                
                let popup = new mapboxgl.Popup({ offset: 25 }).setHTML(content).setMaxWidth("400px");

                el.addEventListener('click', (e) => {   
                    const locationId = e.toElement.id                  
                    @this.findLocationById(locationId)
                }); 
            
                new mapboxgl.Marker(el)
                .setLngLat(geometry.coordinates)
                .setPopup(popup)
                .addTo(map);
            });
            }
	}
	google.maps.event.addDomListener(window, 'load', initialize);

    function generateContent(place)
    {
        var content = `
            <div class="gd-bubble" style="">
                <div class="gd-bubble-inside">
                    <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                        <li>
                                            <div class="geodir-post-title">
                                                <h4 class="geodir-entry-title">
                                                    <a href="#" title="View: `+place.name+`">`+place.name+`</a>
                                                </h4>
                                            </div>
                                            <a href="#"><img src="`+place.thumbnail+`" alt="`+place.name+`" class="align size-medium_large" width="1400" height="930"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                            <i class="fas fa-minus" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Place Title: </span></span>`+place.name+`</div>
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>`;

    return content;

    }
</script>
<script>
    document.addEventListener('livewire:init',  ()  => {
       
         const defaultLocation = [106.697, -6.313];
         const coordinateInfo = document.getElementById('info');
 
         mapboxgl.accessToken = "{{env('MAPBOX_ACCESS_TOKEN')}}";
         let map = new mapboxgl.Map({
             container: "map",
             center: defaultLocation,
             zoom: 11.15,
             style: "mapbox://styles/mapbox/streets-v11"
         });
 
         map.addControl(new mapboxgl.NavigationControl());
 
         const loadGeoJSON = (geojson) => {
 
             geojson.features.forEach(function (marker) {
                 const {geometry, properties} = marker
                 const {iconSize, locationId, title, image, description} = properties
 
                 let el = document.createElement('div');
                 el.className = 'marker' + locationId;
                 el.id = locationId;
                 el.style.backgroundImage = 'url({{asset("image/car2.png")}})';
                 el.style.backgroundSize = 'cover';
                 el.style.width = iconSize[0] + 'px';
                 el.style.height = iconSize[1] + 'px';
 
                 const pictureLocation = '{{asset("/storage/images")}}' + '/' + image
 
                 const content = `
                 <div style="overflow-y: auto; max-height:400px;width:100%;">
                     <table class="table table-sm mt-2">
                          <tbody>
                             <tr>
                                 <td>Title</td>
                                 <td>${title}</td>
                             </tr>
                             <tr>
                                 <td>Picture</td>
                                 <td><img src="${pictureLocation}" loading="lazy" class="img-fluid"/></td>
                             </tr>
                             <tr>
                                 <td>Description</td>         
                                 <td>${description}</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 `;
                 
                 let popup = new mapboxgl.Popup({ offset: 25 }).setHTML(content).setMaxWidth("400px");
 
                 el.addEventListener('click', (e) => {   
                     const locationId = e.toElement.id                  
                     @this.findLocationById(locationId)
                 }); 
             
                 new mapboxgl.Marker(el)
                 .setLngLat(geometry.coordinates)
                 .setPopup(popup)
                 .addTo(map);
             });
         }
 
         loadGeoJSON({!! $geoJson !!})
 
         window.addEventListener('locationAdded', (e) => {           
             swal({
                 title: "Location Added!",
                 text: "Your location has been save sucessfully!",
                 icon: "success",
                 button: "Ok",
             }).then((value) => {
                 loadGeoJSON(JSON.parse(e.detail))
             });
         }) 
         
         window.addEventListener('deleteLocation', (e) => {  
             console.log(e.detail);         
             swal({
                 title: "Location Delete!",
                 text: "Your location deleted sucessfully!",
                 icon: "success",
                 button: "Ok",
             }).then((value) => {
                $('.marker' + e.detail).remove();
                $('.mapboxgl-popup').remove();
             });
         })
 
         window.addEventListener('updateLocation', (e) => {  
             console.log(e.detail);         
             swal({
                 title: "Location Update!",
                 text: "Your location updated sucessfully!",
                 icon: "success",
                 button: "Ok",
             }).then((value) => {
                loadGeoJSON(JSON.parse(e.detail))
                $('.mapboxgl-popup').remove();
             });
         })
 
         //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
         const style = "dark-v10"
         map.setStyle(`mapbox://styles/mapbox/${style}`);
 
         const getLongLatByMarker = () => {
             const lngLat = marker.getLngLat();           
             return 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
         }    
 
         map.on('click', (e) => {
             if(@this.isEdit){
                 return
             }else{
                 coordinateInfo.innerHTML = JSON.stringify(e.point) + '<br />' + JSON.stringify(e.lngLat.wrap());
                 @this.long = e.lngLat.lng;
                 @this.lat = e.lngLat.lat;
             }            
         });  
     })
 </script>
