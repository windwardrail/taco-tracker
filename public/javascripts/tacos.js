(function() {
  var MY_MAPTYPE_ID, bellingham, black_hue, green_hue, initialize, setMarkers, truck_locations;

  bellingham = new google.maps.LatLng(48.755433, -122.478819);

  green_hue = '#007D1C';

  black_hue = '#000000';

  truck_locations = [
    {
      name: 'mario\'s',
      latitude: '48.749543',
      longitude: '-122.473016'
    }
  ];

  MY_MAPTYPE_ID = 'radar_style';

  initialize = function() {
    var customMapType, featureOpts, map, mapOptions, styledMapOptions;
    featureOpts = [
      {
        stylers: [
          {
            hue: green_hue
          }, {
            visibility: 'simplified'
          }, {
            gamma: 0.1
          }, {
            weight: 0.4
          }
        ]
      }, {
        elementType: 'labels',
        stylers: [
          {
            visibility: 'off'
          }
        ]
      }, {
        featureType: 'water',
        stylers: [
          {
            color: black_hue
          }
        ]
      }
    ];
    mapOptions = {
      zoom: 14,
      center: bellingham,
      mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
      },
      mapTypeId: MY_MAPTYPE_ID
    };
    map = new google.maps.Map($('#map-canvas')[0], mapOptions);
    styledMapOptions = {
      name: 'Taco Radar'
    };
    customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
    map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
    return setMarkers(map, truck_locations);
  };

  setMarkers = function(map, locations) {
    var image, location, shape, _i, _len, _results;
    image = {
      url: 'images/taco_ping.png',
      size: new google.maps.Size(64, 56),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(28, 32)
    };
    shape = {
      coord: [1, 1, 1, 55, 55, 63, 63, 1],
      type: 'poly'
    };
    _results = [];
    for (_i = 0, _len = locations.length; _i < _len; _i++) {
      location = locations[_i];
      _results.push((function(location) {
        var marker, truck_coord;
        truck_coord = new google.maps.LatLng(location.latitude, location.longitude);
        return marker = new google.maps.Marker({
          position: truck_coord,
          map: map,
          icon: image,
          title: location.name
        });
      })(location));
    }
    return _results;
  };

  $(function() {
    return initialize();
  });

}).call(this);
