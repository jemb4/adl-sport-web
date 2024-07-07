<template>
  <section class="container px-5 pb-3 pt-4">
    <div class="text-center mb-5">
      <h1>Noticias ADL</h1>
    </div>

    <!-- Noticias  -->

    <div v-for="noticia in noticias" :key="noticia.id" class="card mb-4">
      <div class="card-body" v-if="noticia.activa === '1'">
        <h2 class="card-title">{{ noticia.titulo }}</h2>
        <pre class="card-text">{{ noticia.descripcion }}</pre>
        <p class="card-text">
          <small class="text-muted"> - {{ noticia.autor }}</small>
        </p>
      </div>
    </div>
  </section>

  <!-- Fin Noticias -->

  <!-- Subir noticia, solo se puede usar si somos administradorse -->
  <section class="container px-5 pb-3 pt-4">
    <!-- ABRIR MODAL -->
    <div @click="showModal = true">
      <button class="btn btn-dark fixed" v-if="userRol === 2">Crear noticia</button>
    </div>

    <!-- MODAL -->
    <div
      v-if="showModal"
      class="modal fade show d-block"
      @click.self="closeModal"
      style="background: rgba(0, 0, 0, 0.5)"
    >
      <div class="modal-dialog" @click.stop v-if="userRol === 2">
        <div class="modal-content">
          <div class="modal-header px-5 mt-2">
            <h3>Nueva Noticia: <span class="adm">administradores</span></h3>
            <button type="button" class="close" @click="showModal = false">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body px-5 mb-2">
            <!-- FORM -->
            <form @submit.prevent="submitForm">
              <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input
                  type="text"
                  class="form-control"
                  id="titulo"
                  v-model="noticia.titulo"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea
                  class="form-control"
                  id="descripcion"
                  v-model="noticia.descripcion"
                  required
                ></textarea>
              </div>
              <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input
                  type="text"
                  class="form-control"
                  id="autor"
                  v-model="noticia.autor"
                  required
                />
              </div>
              <div class="mb-3 form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="activa"
                  v-model="noticia.activa"
                />
                <label class="form-check-label" for="activa">Activa</label>
              </div>
              <button type="submit" class="btn btn-primary">Crear Noticia</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, onMounted } from 'vue';

const user = ref(localStorage.getItem('user'));
const userRol = ref(0); // 1 = user, 2 = admin
console.log(user)

if (user.value) {
  userRol.value = JSON.parse(user.value).rol_id;
}

export default {
  setup() {
    // noticias
    // ver noticias
    const noticias = ref([]);

    const cargarNoticias = async () => {
      try {
        const res = await fetch('http://localhost/ADL/noticias.php');
        const data = await res.json();
        noticias.value = data.sort((a, b) => b.id - a.id); // Ordenar por id de forma descendente
      } catch (error) {
        console.error('Error al cargar las noticias:', error);
      }
    };

    onMounted(cargarNoticias);

    // Crear noticia

    const noticia = ref({
      titulo: '',
      descripcion: '',
      autor: '',
      activa: false,
    });

    const submitForm = async () => {
      const response = await fetch('http://localhost/ADL/noticias.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(noticia.value),
      });

      if (response.ok) {
        //enviamos la noticia
        const data = await response.json();
        console.log(data);
        // cargamos las noticias
        await cargarNoticias();

        // limpiamos el formulario
        noticia.value = {
          titulo: '',
          descripcion: '',
          autor: '',
          activa: false,
        };

        // cerramos el modal
        showModal.value = false;
      } else {
        console.error('Error:', response.status, response.statusText);
      }
    };

    // modal
    const showModal = ref(false);

    const closeModal = () => {
      showModal.value = false;
    };

    return {
      noticia,
      submitForm,
      noticias,
      showModal,
      closeModal,
      userRol,
    };
  },
};
</script>

<style scoped>
.container {
  max-width: 800px;
}

.card-title {
  color: #ff4f14;
}

.card-text {
  color: #6c757d;
}

.adm {
  color: #ff4f14;
  font-size: small;
  font-style: italic;
}
.modal.show {
  display: block;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #f8f9fa;
  color: #495057;
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  text-align: center;
  line-height: 30px;
  font-size: 1.2rem;
  transition: background-color 0.3s ease;
}

.close:hover {
  background-color: #495057;
  color: #f8f9fa;
}

.modal.fade .modal-dialog {
  transition: transform 0.3s ease-out;
}

.modal.fade.show .modal-dialog {
  transform: translate(0, 0);
}

.modal-dialog {
  width: 55%;
  max-width: none;
}

.pointer:hover {
  cursor: pointer !important;
}

.fixed {
  position: fixed;
  bottom: 20px;
  left: 20px;
}
</style>
