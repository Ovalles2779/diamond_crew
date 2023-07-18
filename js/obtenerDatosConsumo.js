import L from 'leaflet';
import axios from 'axios';

// Obtener los datos de consumo de la API
async function obtenerDatosConsumo() {
  try {
    const apiUrl = 'http://74.208.141.171:8082/api/devices';
    const username = 'admin';
    const password = 'admin';

    const respuesta = await axios.get(apiUrl, {
      auth: {
        username: username,
        password: password
      }
    });

    // Obtener los datos de consumo de la respuesta
    const datosConsumo = respuesta.data;

    // Configurar el mapa
    const map = L.map('map').setView([14.634915, -90.506882], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

    // Agregar marcadores en el mapa para cada dispositivo
    datosConsumo.forEach(device => {
      const latitud = device.latitude;
      const longitud = device.longitude;

      // Verificar si el dispositivo tiene coordenadas de ubicación válidas
      if (latitud && longitud) {
        // Crear un marcador con un icono personalizado 
        const icono = L.icon({
          iconUrl: 'icons/mini plataforma.png',
          iconSize: [32, 32], // Tamaño del icono en píxeles
          iconAnchor: [16, 16], // Punto de anclaje del icono en relación con la ubicación del marcador
        });

        // Crear un marcador y agregarlo al mapa
        L.marker([latitud, longitud], { icon: icono }).addTo(map);
      }
    });
  } catch (error) {
    console.error('Error al obtener los datos de consumo:', error.message);
  }
}

// Llamar a la función para obtener los datos de consumo y mostrarlos en el mapa
obtenerDatosConsumo();
