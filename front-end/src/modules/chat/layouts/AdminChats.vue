<template>
  <section class="container d-flex flex-column align-content-top mt-3">
    <div v-for="usuario in usuarios" :key="usuario.id" class="d-flex justify-content-center">
        <button @click="cambiarIdUsuario(usuario.id)" v-if="usuario.id != 1" class="btn btn-light fw-bold m-1">
          {{ usuario.email }}
        </button>
    </div>
  </section>
</template>

<script>
import { ref, onMounted } from 'vue';
import { guardarIdUsuario } from '../composables/chatComposable.js'



export default {
  setup() {
      const usuarios = ref([]);

    const cargarUsuarios = async () => {
      try {
        const res = await fetch('http://localhost/ADL/usuario.php');
        const data = await res.json();
        usuarios.value = data;
      } catch (error) {
        console.error('Error al cargar usuarios', error);
      }
    };

    onMounted(cargarUsuarios);

    // Guardar id de usuario
    const { setIdUsuario  } = guardarIdUsuario();

    const cambiarIdUsuario = (id) => {
        setIdUsuario(id);
        console.log(id);
    }


    return {
      usuarios,
      cambiarIdUsuario,
    };
  },
};
</script>
