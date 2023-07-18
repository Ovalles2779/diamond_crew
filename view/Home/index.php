<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Crew Diamond Service::Home</title>
  
  <style>
    #map {
      width: 100%;
      height: 550px;
    }
  </style>

  <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
  <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
  <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
  <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
  <link href="img/favicon.png" rel="icon" type="image/png">
  <link href="img/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
  <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../public/css/main.css">
  <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
</head>
<body class="with-side-menu">
  <div id="map"></div>

  <div class="page-content">

  <!-- Resto del contenido HTML -->

  <!DOCTYPE html>
<html>
<head>
  <title>Mapa de Rutas</title>
  <style>
    #map {
      height: 600px;
    }
  </style>
</head>
<body>
  <div id="map"></div>
  <script>
      function inicializarMapa() {
        var barranquilla = { lat: 10.980853, lng: -74.803992 };

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: barranquilla
        });

        function seleccionarRuta(numeroRuta) {
          // Desmarcar todas las rutas en el mapa
          desmarcarRutas();

          // Coordenadas y nombres de las rutas
          var rutas = [
            { nombre: 'Ruta 1', numeroRuta: 1, latitud: 11.019191894265118, longitud: -74.83534901980056 },
            { nombre: 'Ruta 1', numeroRuta: 1, latitud: 11.023956331604472, longitud: -74.81789814301551 },
            { nombre: 'Ruta 2', numeroRuta: 2, latitud: 11.023571117165528, longitud: -74.81814569313802 },
            { nombre: 'Ruta 2', numeroRuta: 2, latitud: 11.015600131129837, longitud: -74.82632326723208 },
            // Agrega más rutas aquí...
          ];

          var rutaSeleccionada = rutas.filter(function (ruta) {
            return ruta.numeroRuta === numeroRuta;
          });

          // Resaltar la ruta seleccionada en el mapa
          if (rutaSeleccionada.length > 0) {
            marcarRuta(rutaSeleccionada[0]);
          }
        }

        function desmarcarRutas() {
          // Implementa el código para desmarcar todas las rutas en el mapa
          // Puedes utilizar una lógica similar a la función obtenerRuta() en el código anterior
        }

        function marcarRuta(ruta) {
          // Implementa el código para marcar la ruta en el mapa con un color diferente
          
        }

        // Icono personalizado para los marcadores de inicio y fin de la ruta
        var iconoInicio = {
          url: '../../icons/ini.png',
          scaledSize: new google.maps.Size(30, 30)
        };

        var iconoFin = {
          url: '../../icons/fin.png',
          scaledSize: new google.maps.Size(30, 30)
        };

        var directionsService = new google.maps.DirectionsService();

        function obtenerRuta(origen, destino, nombre, numeroRuta) {
          var request = {
            origin: origen,
            destination: destino,
            travelMode: google.maps.TravelMode.DRIVING
          };

          directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
              var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                polylineOptions: {
                  strokeColor: '#0d47a1',
                  strokeOpacity: 1.0,
                  strokeWeight: 4
                }
              });

              directionsRenderer.setDirections(result);

              var leg = result.routes[0].legs[0];

              // Agregar marcadores en los puntos de inicio y fin de la ruta
              var marcadorInicio = new google.maps.Marker({
                position: leg.start_location,
                map: map,
                icon: iconoInicio,
                label: { text: numeroRuta.toString(), color: 'blue' }
              });

              var marcadorFin = new google.maps.Marker({
                position: leg.end_location,
                map: map,
                icon: iconoFin,
                label: { text: numeroRuta.toString(), color: 'blue' }
              });

              // Crear una etiqueta de información para mostrar el nombre de la ruta y la dirección
              var infoWindowInicio = new google.maps.InfoWindow({
                content: 'Ruta: ' + nombre + '<br>Dirección Inicial: ' + leg.start_address
              });

              var infoWindowFin = new google.maps.InfoWindow({
                content: 'Ruta: ' + nombre + '<br>Dirección Final: ' + leg.end_address
              });

              // Mostrar la etiqueta de información al hacer clic en el marcador de inicio de la ruta
              marcadorInicio.addListener('click', function () {
                infoWindowInicio.open(map, marcadorInicio);
              });

              // Mostrar la etiqueta de información al hacer clic en el marcador final de la ruta
              marcadorFin.addListener('click', function () {
                infoWindowFin.open(map, marcadorFin);
              });
            } else {
              console.error('Error al obtener la ruta:', status);
            }
          });
        }

        // Obtener las rutas y enlazarlas entre sí
        var rutas = [
          { nombre: 'Ruta 1', numeroRuta: 1, latitud: 11.019191894265118, longitud: -74.83534901980056 },
          { nombre: 'Ruta 1', numeroRuta: 1, latitud: 11.023956331604472, longitud: -74.81789814301551 },
          { nombre: 'Ruta 2', numeroRuta: 2, latitud: 11.023571117165528, longitud: -74.81814569313802 },
          { nombre: 'Ruta 2', numeroRuta: 2, latitud: 11.015600131129837, longitud: -74.82632326723208 },
		  { nombre: 'Ruta 3', numeroRuta: 3, latitud: 11.015600131129837, longitud: -74.82632326723208 },
		  { nombre: 'Ruta 4', numeroRuta: 4, latitud: 11.019294288259111, longitud: -74.83545345505011 }    
          // Agrega más rutas aquí...
        ];

        for (var i = 0; i < rutas.length - 1; i++) {
          var rutaActual = rutas[i];
          var rutaSiguiente = rutas[i + 1];

          obtenerRuta(
            { lat: rutaActual.latitud, lng: rutaActual.longitud },
            { lat: rutaSiguiente.latitud, lng: rutaSiguiente.longitud },
            rutaActual.nombre,
            rutaActual.numeroRuta
          );
        }

        // Icono personalizado para el movimiento
        var iconoMovimiento = {
          url: '../../icons/truck.png',
          scaledSize: new google.maps.Size(40, 40)
        };

        // Coordenadas de las rutas para el movimiento del icono personalizado
        var rutasMovimiento = [
          { latitud: 11.019191894265118, longitud: -74.83534901980056 },
          { latitud: 11.019802417982499, longitud: -74.83623017496164 },
          { latitud: 11.021607219361972, longitud: -74.83617745727008 },
          { latitud: 11.026152468349796, longitud: -74.83428801089438 },
          { latitud: 11.027377692712594, longitud: -74.83262870325453 },
          { latitud: 11.027373265078324, longitud: -74.83009356628801 },
          { latitud: 11.025749754035177, longitud: -74.8271250093527 },
          { latitud: 11.02412643494666, longitud: -74.82551668560461 },
          { latitud: 11.02339668309345, longitud: -74.82493253029975 },
          { latitud: 11.022920109477283, longitud: -74.82496287602987 },
          { latitud: 11.022838198292268, longitud: -74.82454562219901 },
          { latitud: 11.0220637642848, longitud: -74.8236276638316 },
          { latitud: 11.021170184071888, longitud: -74.822117963758 },
          { latitud: 11.0209542351132, longitud: -74.82181450645679 },
          { latitud: 11.020634034641281, longitud: -74.82144277126277 },
          { latitud: 11.020261708072924, longitud: -74.82126069688205 },
          { latitud: 11.020447871416007, longitud: -74.82086620239045 },
          { latitud: 11.020797858182084, longitud: -74.82088137525551 },
          { latitud: 11.021676546525818, longitud: -74.8203351521133 },
          { latitud: 11.023482442487753, longitud: -74.81931434937395 },
          { latitud: 11.024461812452294, longitud: -74.81878863638481 },
          { latitud: 11.023956331604472, longitud: -74.81789814301551 },
          { latitud: 11.023956331604472, longitud: -74.81789814301551 },
          { latitud: 11.023956331604472, longitud: -74.81789814301551 },
          { latitud: 11.023956331604472, longitud: -74.81789814301551 },
          { latitud: 11.02312096030197, longitud: -74.81824828981966 },
          { latitud: 11.022406098918047, longitud: -74.81875658079923 },
          { latitud: 11.02207845353646, longitud: -74.81921176675107 },
          { latitud: 11.021691235796803, longitud: -74.81911314312816 },
          { latitud: 11.021065729140636, longitud: -74.81922693961613 },
          { latitud: 11.021445501160295, longitud: -74.82033455880352 },
          { latitud: 11.021125301223105, longitud: -74.82079733118789 },
          { latitud: 11.020678510030605, longitud: -74.82134355433008 },
          { latitud: 11.020246611232873, longitud: -74.82133596789757 },
          { latitud: 11.01898703805006, longitud: -74.82245367720927 },
          { latitud: 11.018144553808808, longitud: -74.82325833989238 },
          { latitud: 11.017070382903004, longitud: -74.82424539278367 },
          { latitud: 11.015859303160003, longitud: -74.8251788014961 },
          { latitud: 11.015859303160003, longitud: -74.8251788014961 },
          { latitud: 11.014132189452022, longitud: -74.8264018888345 },
          { latitud: 11.014427063230801, longitud: -74.82728165336802 },
          { latitud: 11.01505893462789, longitud: -74.82905191130591 },
          { latitud: 11.015006278730672, longitud: -74.83019989673382 },
          { latitud: 11.015006278730672, longitud: -74.83019989673382 },
          { latitud: 11.015468511406853, longitud: -74.83132099323517 },
          { latitud: 11.01615105417183, longitud: -74.83231618024661 },
          { latitud: 11.017184258124542, longitud: -74.83390465185445 },
          { latitud: 11.017785393302184, longitud: -74.83456810988393 },
          { latitud: 11.018355218206139, longitud: -74.83433845134283 },
          { latitud: 11.018906256624225, longitud: -74.83435121015067 },
          { latitud: 11.019432246878823, longitud: -74.83512949742885 },
          { latitud: 11.019231869749841, longitud: -74.83565260855026 }
        ];

        moverIconoPersonalizado(map, iconoMovimiento, rutasMovimiento);
      }

      function moverIconoPersonalizado(map, iconoMovimiento, rutasMovimiento) {
        var icono = new google.maps.Marker({
          position: { lat: rutasMovimiento[0].latitud, lng: rutasMovimiento[0].longitud },
          map: map,
          icon: iconoMovimiento
        });

        // Crear una etiqueta de información para mostrar la placa del vehículo
        var infoWindowMovimiento = new google.maps.InfoWindow({
          content: 'Placa: GHZ-922 Ruta: Carga'
        });

        // Mostrar la etiqueta de información al hacer clic en el marcador de movimiento
        icono.addListener('click', function () {
          infoWindowMovimiento.open(map, icono);
        });

        var i = 1;
        var intervalId;

        function moverIcono() {
          icono.setPosition({ lat: rutasMovimiento[i].latitud, lng: rutasMovimiento[i].longitud });
          i = (i + 1) % rutasMovimiento.length;

          if (i === 0) {
            clearInterval(intervalId);
            setTimeout(function () {
              i = 1;
              intervalId = setInterval(moverIcono, 10000);
            }, 1800000); // Esperar 30 minutos antes de reiniciar el movimiento del icono (30 minutos = 1800000 ms)
          }
        }

        intervalId = setInterval(moverIcono, 10000);
      }

      // Llamar a la función para cargar el mapa al iniciar la página
      window.addEventListener('DOMContentLoaded', inicializarMapa);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PvQJW4RbqnZtcgzy8DI7cmVAaHu4Yk&callback=inicializarMapa" async defer></script>







</body>
  
  </div>
	<header class="site-header">
	    <div class="container-fluid">
	
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="../../public/img/png--crew diamond--logo-02.png" alt="">
	            <img class="hidden-lg-up" src="../../public/img/png--crew diamond--logo-04.png" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown dropdown-notification notif">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
	                            <div class="dropdown-menu-notif-list">
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-1.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Morgan</a> was bothering about something
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-2.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-3.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-4.jpg" alt="">
	                                    </div>
	                                    <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something...</span>
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burtons</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-lang">
	                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="flag-icon flag-icon-us"></span>
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ru"></span>Русский</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-de"></span>Deutsch</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-it"></span>Italiano</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-es"></span>Español</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-pl"></span>Polski</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-li"></span>Lietuviu</a>
	                            </div>
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item current" href="#"><span class="flag-icon flag-icon-us"></span>English</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-fr"></span>Français</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-by"></span>Беларускi</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ua"></span>Українська</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-cz"></span>Česky</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ch"></span>中國</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                <!--<div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-cogwheel"></span>
	                                <span class="lbl">Marketing automation</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
	                                <a class="dropdown-item" href="#">Current Search</a>
	                                <a class="dropdown-item" href="#">Search for Issues</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Recent issues</div>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                                <div class="dropdown-more">
	                                    <div class="dropdown-more-caption padding">more...</div>
	                                    <div class="dropdown-more-sub">
	                                        <div class="dropdown-more-sub-in">
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#">Import Issues from CSV</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Filters</div>
	                                <a class="dropdown-item" href="#">My Open Issues</a>
	                                <a class="dropdown-item" href="#">Reported by Me</a>
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#">Manage filters</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Timesheet</div>
	                                <a class="dropdown-item" href="#">Subscribtions</a>
	                            </div>
	                        </div>
	                        <div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-social" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-share"></span>
	                                <span class="lbl">Social media</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-social">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown dropdown-typical">
	                            <a href="#" class="dropdown-toggle no-arr">
	                                <span class="font-icon font-icon-page"></span>
	                                <span class="lbl">Projects</span>
	                                <span class="label label-pill label-danger">35</span>
	                            </a>
	                        </div>
	
	                        <div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-form-builder" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-pencil"></span>
	                                <span class="lbl">Form builder</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-form-builder">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown">
	                            <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                Add
	                            </button>
	                            <div class="dropdown-menu" aria-labelledby="dd-header-add">
	                                <a class="dropdown-item" href="#">Quant and Verbal</a>
	                                <a class="dropdown-item" href="#">Real Gmat Test</a>
	                                <a class="dropdown-item" href="#">Prep Official App</a>
	                                <a class="dropdown-item" href="#">CATprer Test</a>
	                                <a class="dropdown-item" href="#">Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="help-dropdown">
	                            <button type="button">
	                                <i class="font-icon font-icon-help"></i>
	                            </button>
	                            <div class="help-dropdown-popup">
	                                <div class="help-dropdown-popup-side">
	                                    <ul>
	                                        <li><a href="#">Getting Started</a></li>
	                                        <li><a href="#" class="active">Creating a new project</a></li>
	                                        <li><a href="#">Adding customers</a></li>
	                                        <li><a href="#">Settings</a></li>
	                                        <li><a href="#">Importing data</a></li>
	                                        <li><a href="#">Exporting data</a></li>
	                                    </ul>
	                                </div>
	                                <div class="help-dropdown-popup-cont">
	                                    <div class="help-dropdown-popup-cont-in">
	                                        <div class="jscroll">
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum is simply
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum is simply
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum is simply
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div><!--.help-dropdown-->
	                        
	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search"/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon fa fa-street-view "></i>
	                <span class="lbl">Map View</span>
	            </span>
	            <!--<ul>
	                <li><a href="index.html"><span class="lbl">Default</span><span class="label label-custom label-pill label-danger">new</span></a></li>
	                <li><a href="dashboard-top-menu.html"><span class="lbl">Top menu</span></a></li>
	                <li><a href="side-menu-compact-full.html"><span class="lbl">Compact menu</span></a></li>
	                <li><a href="dashboard-addl-menu.html"><span class="lbl">Submenu</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Menu with avatar</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Compact menu with avatar</span></a></li>
	                <li><a href="dark-menu.html"><span class="lbl">Dark menu</span></a></li>
	                <li><a href="dark-menu-blue.html"><span class="lbl">Blue dark menu</span></a></li>
	                <li><a href="dark-menu-green.html"><span class="lbl">Green dark menu</span></a></li>
	                <li><a href="dark-menu-green-compact.html"><span class="lbl">Green compact dark menu</span></a></li>
	                <li><a href="dark-menu-ultramarine.html"><span class="lbl">Ultramarine dark menu</span></a></li>
	                <li><a href="asphalt-menu.html"><span class="lbl">Asphalt top menu</span></a></li>
	                <li><a href="side-menu-big-icon.html"><span class="lbl">Big menu</span></a></li>
	            </ul>-->
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon fa fa-bus"></i>
	                <span class="lbl">Menu Buses</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Add Buses</span></a></li>
	                <li><a href="#"><span class="lbl">List Buses</span></a></li>
	                <!--<li><a href="theme-side-caesium-dark-caribbean.html"><span class="lbl">Caesium Dark Caribbean</span></a></li>
	                <li><a href="theme-side-tin.html"><span class="lbl">Tin</span></a></li>
	                <li><a href="theme-side-litmus-blue.html"><span class="lbl">Litmus Blue</span></a></li>
	                <li><a href="theme-rebecca-purple.html"><span class="lbl">Rebecca Purple</span></a></li>
	                <li><a href="theme-picton-blue.html"><span class="lbl">Picton Blue</span></a></li>
	                <li><a href="theme-picton-blue-white-ebony.html"><span class="lbl">Picton Blue White Ebony</span></a></li>-->
	            </ul>
	        </li>
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon fa fa-road"></i>
	                <span class="lbl">Bus Routes</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Adds Bus Routes</span></a></li>
					

	                <li><a href="#"><span class="lbl">List Bus Routes</span><span class="label label-custom label-pill label-danger">8</span></a></li>
					<li><a href="#" onclick="seleccionarRuta(1)"><span class="lbl">Route 1</span></a></li>
					<li><a href="#" onclick="seleccionarRuta(2)"><span class="lbl">Route 2</span></a></li>
					<li><a href="#" onclick="seleccionarRuta(3)"><span class="lbl">Route 3</span></a></li>
	            
	            </ul>
	        </li>
	      
	        <li class="gold with-sub">
	            <span>
	                <i class="font-icon fa fa-users"></i>
	                <span class="lbl">Users</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Registers Users</span></a></li>
	                
	            </ul>
	       
	        <li class="magenta with-sub">
	            <span>
	                <span class="fa fa-cog" aria-hidden="true"></span>
	                <span class="lbl">System Settings</span>
	            </span>
	            <ul>
	                <a href="#"><span class="lbl">Adds Admins</span></a></li>
	                <a href="#"><span class="lbl">Adds Roles</span></a></li>
					<a href="#"><span class="lbl">Roles Permisson</span></a></li>
	
	                <!--<li><a href="datatables.html"><span class="lbl">Default</span></a></li>
	                <li><a href="datatables-fixed-columns.html"><span class="lbl">Fixed Columns</span></a></li>
	                <li><a href="datatables-reorder-rows.html"><span class="lbl">Reorder Rows</span></a></li>
	                <li><a href="datatables-reorder-columns.html"><span class="lbl">Reorder Columns</span></a></li>
	                <li><a href="datatables-resize-columns.html"><span class="lbl">Resize Columns</span></a></li>
	                <li><a href="datatables-mobile.html"><span class="lbl">Mobile</span></a></li>
	                <li><a href="datatables-filter-control.html"><span class="lbl">Filters</span></a></li>-->
	            </ul>
	        </li>
	        
	
	    
	</nav><!--.side-menu-->

	<!--.page-content-->
	<script src="../../public/js/lib/jquery/jquery.min.js"></script>
	<script src="../../public/js/lib/tether/tether.min.js"></script>
	<script src="../../public/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="../../public/js/plugins.js"></script>
	<script src="../../public/js/app.js"></script>
	<script>  window.addEventListener('load', inicializarMapa);</script>
	<script>  document.addEventListener('DOMContentLoaded', inicializarMapa);
	

</script>

</body>
</html>