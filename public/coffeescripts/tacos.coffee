bellingham = new google.maps.LatLng(48.755433, -122.478819)
green_hue = '#007D1C'
black_hue = '#000000'
window.markers = []

MY_MAPTYPE_ID = 'radar_style'

initialize = =>
  featureOpts = [
    stylers:
      [
        hue: green_hue
      ,
        visibility: 'simplified'
      ,
        gamma: 0.1
      ,
        weight: 0.4
      ]
  ,
    elementType: 'labels',
    stylers:
      [
        visibility: 'off'
      ]
  ,
    featureType: 'water',
    stylers:
      [
        color: black_hue
      ]
  ]

  mapOptions =
    zoom: 15,
    center: bellingham,
    mapTypeControlOptions:
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    ,
    mapTypeId: MY_MAPTYPE_ID

  map = new google.maps.Map($('#map-canvas')[0], mapOptions)

  styledMapOptions =
    name: 'Taco Radar'

  customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions)

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType)


  setMarkers(map, truck_locations);

  ro = $('#radar_overlay')
  sw = $('#sweep')
  sw.fadeTo(0, 0.5)

  calibrateRadarOverlay(ro)
  calibrateSweep(sw)

  rotateSweep(sw)

  $(window).resize ->
    calibrateRadarOverlay(ro)
    calibrateSweep(sw)

# ---------------------
# Sets the location markers on the map
# ----------------------
setMarkers = (map, locations) =>
  image =
    url: 'images/taco_ping.png',
    size: new google.maps.Size(64, 56),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(28, 32)

  shape =
    coord: [1, 1, 1, 55, 55, 63, 63, 1],
    type: 'poly'

  for location in locations
    do (location) ->
      truck_coord = new google.maps.LatLng(location.latitude, location.longitude)
      marker = new google.maps.Marker
        position: truck_coord,
        map: map,
        icon: image,
        # shape: shape,
        title: location.name
      window.markers.push(marker)
      google.maps.event.addListener(marker, 'click', ->
        window.location.assign('/trucks/'+location.id)
        )

calibrateRadarOverlay = (overlay) ->
  h = $(window).height()
  w = $(window).width()
  hr = 900/1600
  aspect = 1600/2000

  overlay.height(h/hr)
  overlay.width(overlay.height()/aspect)

  top = -(overlay.height() - h)/2
  left = -(overlay.width() - w)/2
  overlay.offset({top: top, left: left})

calibrateSweep = (sweep) ->
  h = $(window).height()
  w = $(window).width()
  sweep.height(h)
  sweep.width(h)
  sweep.offset({top: 0, left: (w - h)/2})

rotateSweep = (sweep) ->
  sweep.animate({rotate: '360'}, 3000, 'linear', -> rotateSweep(sweep))
  calibrateSweep(sweep)


$ =>
  initialize()

