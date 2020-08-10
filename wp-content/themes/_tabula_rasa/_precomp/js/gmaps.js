/**
 * @param {*} $ 
 * @param {*} window 
 * @param {*} document 
 */
(function ($, window, document) {
	/**
	 *   Fire Immediately 
	 */


	/**
	 * initMap
	 *
	 * Renders a Google Map onto the selected jQuery element
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   jQuery $el The jQuery element
	 * @return  object The map instance
	 */
	function initMap($el) {


		// gather all the marker elements that are children of this map element
		var $markers = $el.find('.gmapmarker');


		// set the args for the map we will create
		var mapArgs = {
			zoom: $el.data('zoom') || 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true,
			scrollwheel: false,
			zoomControl: true,
			keyboardShortcuts: false
		};


		// create a new google map object from the map el and args
		var map = new google.maps.Map($el[0], mapArgs);


		// create an infowindow
		// ? (at window root, so any others will overwrite eachother)
		window.infowindow = new google.maps.InfoWindow();

		// (clear map markers just in case)
		map.markers = [];


		// add each marker to the map
		$markers.each(function () {
			initMarker($(this), map);
		});

		// center the map around the just center point - and set zoom
		var bounds = new google.maps.LatLngBounds();
		var latlng = new google.maps.LatLng($el.attr('data-lat'), $el.attr('data-lng'));
		bounds.extend(latlng);
		map.setCenter(bounds.getCenter());
		map.setZoom(16);

		// Return map instance.
		return map;
	}

	/**
	 * initMarker
	 *
	 * Creates a marker for the given jQuery element and map.
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   jQuery $el The jQuery element.
	 * @param   object The map instance.
	 * @return  object The marker instance.
	 */
	function initMarker($marker, map) {


		// Get position from marker.
		var lat = $marker.data('lat');
		var lng = $marker.data('lng');
		var latLng = {
			lat: parseFloat(lat),
			lng: parseFloat(lng)
		};


		// Create marker instance.
		marker = new google.maps.Marker({
			position: latLng,
			map: $marker.hasClass('active') ? map : undefined,
			title: $marker.find('strong').text(),
			pointTitle : $marker.attr('data-title'),
			category : $marker.attr('data-categorytitle'),
			type : $marker.attr('data-categorytype'),
			icon: {
				// size: new google.maps.Size(20, 32),
				// scaledSize: new google.maps.Size(20, 32),
				url: $marker.attr('data-icon')
			},
			animation: google.maps.Animation.DROP,
		});

		// Append to reference for later use.
		map.markers.push(marker);

		google.maps.event.addListener(marker, 'click', (function (marker) {

			return function () {
				window.infowindow.setContent($marker[0].innerHTML);
				window.infowindow.open(map, marker);
			}

		})(marker));

	}



	/**
	 * centerMap
	 *
	 * Centers the map showing all markers in view.
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   object The map instance.
	 * @return  void
	 */
	function centerMap(map) {

		// Create map boundaries from all map markers.
		var bounds = new google.maps.LatLngBounds();
		map.markers.forEach(function (marker) {
			bounds.extend({
				lat: marker.position.lat(),
				lng: marker.position.lng()
			});
		});

		// Case: Single marker.
		if (map.markers.length == 1) {
			map.setCenter(bounds.getCenter());

			// Case: Multiple markers.
		} else {
			map.fitBounds(bounds);
		}
	}


	/**
	 *   jQuery Document Ready
	 */
	$(function () {


		var mapEls = $('.tr__googlemap');
		
		$(mapEls).each(function (index, element) {
			
			thisMap = initMap($(this));


		});








	});
}(window.jQuery, window, document));