// Instanciamos los input a manipular
const departamento = document.getElementById('departamento');
const municipio = document.getElementById('municipio');
const form = document.getElementById('form');

// Eventos
departamento.addEventListener('change', () => {
  if (departamento.value == null) {
    getMunicipios(departamento.value);
  }
});

const getMunicipios = (id) => {
  const url = 'http://localhost/SoftLibre/Practicas_DWSL_Cll24/Practica7/municipios.php?id=' + id;
  fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((response) => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Error en la respuesta del servidor');
      }
    })
    .then((data) => {
      municipio.innerHTML = '';
      data.forEach((element) => {
        municipio.innerHTML += `
                <option value="${element.id}">
                    ${element.nombre}
                </option>
            `;
      });
    })
    .catch((error) => {
      console.log(error);
    });
};

form.addEventListener('submit', function (event) {
  event.preventDefault();
  const formData = new FormData(this);

  fetch('resultado.php', {
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
