;(function ($, window, document, undefined) {
    "use strict";

    if ($('.g-map').length) {
        var maps = $('.g-map');
        maps.each(function (index) {
            var mapZoom   = parseInt($(this).attr('data-zoom'));
            var json      = $.parseJSON($(this).attr('data-json'));
            // default center
            var mapCenter = {
                lat: -34.397,
                lng: 150.644
            };

            // INITIALIZE THIS MAP
            initialize($('.g-map')[index], json, mapZoom, mapCenter);
        });
    }

    function initialize(map, json, zoom, center) {
        var markers            = [];
        var mapCenter          = [];
        var mapMarkerImg       = $(map).attr('data-marker-img');
        var mapMarkerActiveImg = $(map).attr('data-active-marker-img');
        var address            = $(map).attr('data-address').split("|");
        var icon               = mapMarkerImg;
        var myOptions          = {
            zoom: zoom,
            scrollwheel: false,
            mapTypeControl: false,
            fullscreenControl: false,
            center: center,
            styles: json,
            disableDefaultUI: true,
        };

        map = new google.maps.Map(map, myOptions);

        // map center
        var geocoder = new google.maps.Geocoder();

        if (address[0] !== "") {
            if (geocoder) {
                geocoder.geocode({
                    'address': String(address[0])
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            mapCenter = {
                                lat: results[0].geometry.location.lat(),
                                lng: results[0].geometry.location.lng()
                            };
                            map.setCenter(mapCenter);
                        } else {
                            console.log("No results found");
                        }
                    } else {
                        console.log("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }

        // map markers
        address.forEach(function (item, i) {
            if (item !== "") {
                //get location from address
                if (geocoder) {
                    geocoder.geocode({
                        'address': String(item)
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                icon       = (i == 0) ? mapMarkerActiveImg : mapMarkerImg;
                                markers[i] = new google.maps.Marker({
                                    position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                                    map: map,
                                    icon: icon,
                                    animation: google.maps.Animation.DROP
                                });
                            } else {
                                console.log("No results found");
                            }
                        } else {
                            console.log("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }
            }
        });

        // Marker Hover
        markersHover(map, markers, mapMarkerImg, mapMarkerActiveImg, zoom);
    }

    function markersHover(map, markers, markerImg, markerActiveImg, zoom) {
        $('.google-marker').each(function (index) {
            $(this).attr('data-marker-number', index);

            $(this).on('click', function () {
                var latLng = markers[$(this).attr('data-marker-number')].getPosition();
                map.setCenter(latLng);
                map.setZoom(zoom);
                markers.forEach(function (item, i) {
                    item.setIcon(markerImg);
                });
                markers[$(this).attr('data-marker-number')].setIcon(markerActiveImg);

                $(this).addClass('active').siblings().removeClass('active').closest('.js-wrap').find('.js-tab-item').removeClass('active');
                $(this).closest('.js-wrap').find('.js-tab-item:nth-child(' + (index + 1) + ')').addClass('active');
            });
        });
    }

})(jQuery, window, document);