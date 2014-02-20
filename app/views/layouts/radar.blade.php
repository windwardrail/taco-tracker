<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
      #radar_overlay {
        position: absolute;
        pointer-events: none;
      }
      #sweep {
        position: absolute;
        pointer-events: none;
      }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtOxrot7xZqWgX7OI6fjgljtI4_BPCEMA&sensor=false"></script>
  </head>

  <body>
    @yield('main')
  </body>

</html>