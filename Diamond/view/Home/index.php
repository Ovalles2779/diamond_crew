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
</head>
<body class="with-side-menu">

	<div id="map"></div>

	<div class="page-content">

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PvQJW4RbqnZtcgzy8DI7cmVAaHu4Yk&callback=inicializarMapa" async defer></script>


		<script>
			function inicializarMapa() {
				var barranquilla = { lat: 10.980853, lng: -74.803992 };

				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 12,
					center: barranquilla
				});

				// Coordenadas y nombres de las rutas
				var rutas = [
					{ nombre: 'Ruta 1', origen: 'Barranquilla, Colombia', destino: 'Adelita de Char Etp 2, Riomar, Barranquilla, Atlántico' },
					{ nombre: 'Ruta 2', origen: 'Zoológico de Barranquilla, Atlántico, Colombia', destino: 'Plaza De La Aduana Barranquilla, Atlántico, Colombia' },
					{ nombre: 'Ruta 3', origen: 'Punto B', destino: 'Punto C' }
				];

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
				var directionsRenderer = new google.maps.DirectionsRenderer({
					map: map,
					polylineOptions: {
						strokeColor: '#FF0000',
						strokeOpacity: 1.0,
						strokeWeight: 2
					}
				});

				function obtenerRuta(origen, destino, nombre) {
					var request = {
						origin: origen,
						destination: destino,
						travelMode: google.maps.TravelMode.DRIVING
					};

					directionsService.route(request, function (result, status) {
						if (status == google.maps.DirectionsStatus.OK) {
							directionsRenderer.setDirections(result);

							// Agregar marcadores en los puntos de inicio y fin de la ruta
							var leg = result.routes[0].legs[0];
							var marcadorInicio = new google.maps.Marker({
								position: leg.start_location,
								map: map,
								icon: iconoInicio
							});
							var marcadorFin = new google.maps.Marker({
								position: leg.end_location,
								map: map,
								icon: iconoFin
							});

							// Crear una etiqueta de información para mostrar el nombre de la ruta
							var infoWindow = new google.maps.InfoWindow({
								content: nombre
							});

							// Mostrar la etiqueta de información al hacer clic en el marcador de inicio de la ruta
							marcadorInicio.addListener('click', function () {
								infoWindow.open(map, marcadorInicio);
							});
						} else {
							console.error('Error al obtener la ruta:', status);
						}
					});
				}

				// Obtener las rutas y enlazarlas entre sí
				for (var i = 0; i < rutas.length - 1; i++) {
					var rutaActual = rutas[i];
					var rutaSiguiente = rutas[i + 1];

					obtenerRuta(rutaActual.destino, rutaSiguiente.origen, rutaActual.nombre);
				}
			}

			// Llamar a la función para inicializar el mapa al cargar la página
			window.addEventListener('DOMContentLoaded', inicializarMapa);
		</script>

	</div>
	    
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
	                </div>
	                       
	                        
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
	            
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon fa fa-bus"></i>
	                <span class="lbl">Menu Buses</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Add Buses</span></a></li>
	                <li><a href="#"><span class="lbl">List Buses</span></a></li>
	               
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
	
	                
	            </ul>
	        </li>
	        
	
	    
	</nav><!--.side-menu-->

	<!--.page-content-->
	<script src="../../public/js/lib/jquery/jquery.min.js"></script>
	<script src="../../public/js/lib/tether/tether.min.js"></script>
	<script src="../../public/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="../../public/js/plugins.js"></script>
	<script src="../../public/js/app.js"></script>
</body>
</html>