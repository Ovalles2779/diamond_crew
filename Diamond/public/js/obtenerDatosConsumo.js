const axios = require('axios');

// Función para cargar el mapa al iniciar la página
function cargarMapa() {
  // Configurar el mapa
  const map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 10.9878, lng: -74.7889 },
    zoom: 12,
  });

  // Obtener los datos de ubicación de los vehículos
  obtenerUbicacionVehiculos(map);
}

// Obtener los datos de ubicación de los vehículos desde el API de Wialon
async function obtenerUbicacionVehiculos(map) {
  try {
    const loginUrl = 'https://hst-api.wialon.com/wialon/ajax.html';
    const searchUrl = 'https://hst-api.wialon.com/wialon/ajax.html';

    // Realizar la solicitud de autenticación en Wialon
    const loginConfig = {
      method: 'get',
      url: loginUrl,
      params: {
        svc: 'token/login',
        params: JSON.stringify({ token: '64cb51f3b4be808290d2b68f0f8aaa0a197891A1F1E24A3B524977B0FCC0E3E5F69EACDC' })
      }
    };

    const loginResponse = await axios.request(loginConfig);
    const sid = loginResponse.data.eid;

    // Realizar la solicitud de búsqueda de vehículos en Wialon
    const searchConfig = {
      method: 'get',
      url: searchUrl,
      params: {
        svc: 'core/search_items',
        params: JSON.stringify({
          spec: {
            itemsType: 'avl_unit',
            propName: 'sys_name',
            propValueMask: '*',
            sortType: 'sys_name'
          },
          force: 1,
          flags: 9217,
          from: 0,
          to: 0
        }),
        sid: sid
      }
    };

    const searchResponse = await axios.request(searchConfig);
    const vehicles = searchResponse.data.items;

    // Procesar los datos de ubicación de los vehículos
    vehicles.forEach(vehiculo => {
      const latitud = vehiculo.pos.y;
      const longitud = vehiculo.pos.x;
      const nombre = vehiculo.nm;

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
    url: '../../icons/mini plataforma.png', // Ruta a la imagen del icono personalizado
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
