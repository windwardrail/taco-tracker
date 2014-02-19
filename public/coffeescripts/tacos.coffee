bellingham = new google.maps.LatLng(48.755433, -122.478819)
green_hue = '#007D1C'
black_hue = '#000000'

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

$ =>
  initialize()

