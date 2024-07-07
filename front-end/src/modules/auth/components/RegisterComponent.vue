<template>
  <section class="container px-5 pb-3 pt-4 form-container">
    <div class="d-flex justify-content-center">
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" v-model="usuario.nombre" required />
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" v-model="usuario.apellido" required />
        </div>
        <div class="mb-3">
          <label for="apellido2" class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" id="apellido2" v-model="usuario.apellido2" />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email-register" v-model="usuario.email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password-register" v-model="usuario.password" required />
        </div>
        <div class="d-flex justify-content-start">
          <button type="submit" class="btn btn-primary my-3">Crear Usuario</button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import { ref } from 'vue';

// let user = localStorage.getItem('user');
// let userId = JSON.parse(user).rol_id;
// console.log(userId);

export default {
  setup() {
    const usuario = ref({
      nombre: '',
      apellido: '',
      apellido2: '',
      email: '',
      password: '',
      rol_id: 1,
    });

    const submitForm = async () => {
      const response = await fetch('http://localhost/ADL/usuario.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(usuario.value),
      });

      if (response.ok) {
        const data = await response.json();
        console.log('usuario creado', data);

        alert(`Usuario ${usuario.value.nombre} creado con éxito`);

        usuario.value = {
          nombre: '',
          apellido: '',
          apellido2: '',
          email: '',
          password: '',
          rol_id: 1,
        };

  
      } else {
        console.error('Error:', response.status, response.statusText);
      }
    };

    return {
      usuario,
      submitForm,
    };
  },
};
</script>

<style scoped>

</style>