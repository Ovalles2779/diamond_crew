const axios = require('axios');

// Función para cargar el mapa al iniciar la página
async function cargarMapa() {
  // Configurar el mapa
  const map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 10.9878, lng: -74.7889 },
    zoom: 12,
  });

  // Obtener los datos de ubicación de los vehículos
  try {
    const Url = 'https://hst-api.wialon.com/wialon/ajax.html?svc=';

    // Realizar la solicitud de autenticación en Wialon
    const loginResponse = await axios.get(Url + 'token/login&params={"token":"64cb51f3b4be808290d2b68f0f8aaa0a197891A1F1E24A3B524977B0FCC0E3E5F69EACDC"}');
    const sid = loginResponse.data.eid;

    // Realizar la solicitud de búsqueda de vehículos en Wialon
    const searchResponse = await axios.get(Url + 'core/search_items&params={"spec":{"itemsType":"avl_unit","propName":"sys_name","propValueMask":"*","sortType":"sys_name"},"force":1,"flags":9217,"from":0,"to":0}', { params: { sid: sid } });
    const vehicles = searchResponse.data.items;

    // Procesar los datos de ubicación de los vehículos
    vehicles.forEach(vehiculo => {
        let latitud = vehiculo.pos.y;
        let longitud = vehiculo.pos.x;
        let nombre = vehiculo.nm;

        console.log('Patento:',nombre,'Latitud:', latitud,'Longitud:', longitud);

        // Agregar marcador en el mapa para cada vehículo
        agregarMarcador(map, latitud, longitud, nombre);
    });
} catch (error) {
    console.error('Error al obtener los datos de ubicación de los vehículos:', error.message);
}
}

// Agregar un marcador en el mapa para un vehículo
function agregarMarcador(map, latitud, longitud, nombre) {
  // Crear un objeto de icono personalizado
  const iconoVehiculo = {
    url: '../../icons/plataforma.png', // Ruta a la imagen del icono personalizado
    scaledSize: new google.maps.Size(32, 32), // Tamaño del icono en píxeles
  };

  // Crear un marcador con la ubicación del vehículo y el icono personalizado
  const marker = new google.maps.Marker({
    position: { lat: latitud, lng: longitud },
    map: map,
    title: nombre,
    icon: iconoVehiculo,
  });

  // Agregar el marcador al mapa
  marker.setMap(map);
}

// Llamar a la función para cargar el mapa al iniciar la página
window.addEventListener('DOMContentLoaded', cargarMapa);
