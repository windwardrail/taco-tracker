(function() {
  var MY_MAPTYPE_ID, bellingham, black_hue, calibrateRadarOverlay, calibrateSweep, green_hue, initialize, rotateSweep, setMarkers,
    _this = this;

  bellingham = new google.maps.LatLng(48.755433, -122.478819);

  green_hue = '#007D1C';

  black_hue = '#000000';

  window.markers = [];

  MY_MAPTYPE_ID = 'radar_style';

  initialize = function() {
    var customMapType, featureOpts, map, mapOptions, ro, styledMapOptions, sw;
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
      zoom: 15,
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
    setMarkers(map, truck_locations);
    ro = $('#radar_overlay');
    sw = $('#sweep');
    sw.fadeTo(0, 0.5);
    calibrateRadarOverlay(ro);
    calibrateSweep(sw);
    rotateSweep(sw);
    return $(window).resize(function() {
      calibrateRadarOverlay(ro);
      return calibrateSweep(sw);
    });
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
        marker = new google.maps.Marker({
          position: truck_coord,
          map: map,
          icon: image,
          title: location.name
        });
        window.markers.push(marker);
        return google.maps.event.addListener(marker, 'click', function() {
          return window.location.assign('/trucks/' + location.id);
        });
      })(location));
    }
    return _results;
  };

  calibrateRadarOverlay = function(overlay) {
    var aspect, h, hr, left, top, w;
    h = $(window).height();
    w = $(window).width();
    hr = 900 / 1600;
    aspect = 1600 / 2000;
    overlay.height(h / hr);
    overlay.width(overlay.height() / aspect);
    top = -(overlay.height() - h) / 2;
    left = -(overlay.width() - w) / 2;
    return overlay.offset({
      top: top,
      left: left
    });
  };

  calibrateSweep = function(sweep) {
    var h, w;
    h = $(window).height();
    w = $(window).width();
    sweep.height(h);
    sweep.width(h);
    return sweep.offset({
      top: 0,
      left: (w - h) / 2
    });
  };

  rotateSweep = function(sweep) {
    return sweep.animate({
      rotate: '360'
    }, 3000, 'linear', function() {
      return rotateSweep(sweep);
    });
  };

  $(function() {
    return initialize();
  });

}).call(this);
