// Instanciamos los input a manipular
const departamento = document.getElementById('departamento');
const municipio = document.getElementById('municipio');
const form = document.getElementById('form');

// Eventos
departamento.addEventListener('change', () => {
  if (departamento.value !== '') {
    // Si se seleccionó un valor, llama a getMunicipios
    getMunicipios(departamento.value);
  }
});

const getMunicipios = (id) => {
  console.log('ID del departamento seleccionado:', id); // Añadir para depuración
  const url = 'http://localhost/SoftLibre/Practicas_DWSL_CII24/Practica7/municipios.php?id=' + id;
  fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((response) => {
      console.log('Respuesta:', response); // Depurar el objeto de respuesta
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Error en la respuesta del servidor');
      }
    })
    .then((data) => {
      console.log('Datos:', data); // Depurar los datos recibidos
      municipio.innerHTML = '<option value="">-- Seleccione --</option>';
      data.forEach((element) => {
        municipio.innerHTML += `<option value="${element.id}">${element.nombre}</option>`;
      });
    })
    .catch((error) => {
      console.error('Error en el fetch:', error); // Mostrar errores del fetch
    });
};

form.addEventListener('submit', function (event) {
  event.preventDefault();
  const formData = new FormData(this);

  // Validar que el municipio esté seleccionado antes de enviar
  if (municipio.value === '') {
    alert('Por favor, selecciona un municipio antes de enviar.');
    return;
  }

  fetch('guardar.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      document.body.innerHTML = data;
    })
    .catch((error) => {
      console.log('error: ', error);
    });
});
