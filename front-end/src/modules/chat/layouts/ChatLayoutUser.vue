<template>
  <div>
    <div class="bg-light d-flex flex-column max-w-50 mx-auto">
      <div class="bg-primary p-4 text-white d-flex justify-content-center align-items-center">
        <span>Chat</span>
      </div>

      <div class="flex-fill overflow-auto p-4">
        <div class="d-flex flex-column gap-2">
          <!-- Messages go here -->

          <!-- Example Message -->
          <div v-for="mensaje in mensajes" :key="mensaje.id">
            <!-- Mensaje del admin -->
            <div v-if="mensaje.destinatario_id == idUsuario" class="d-flex justify-content-end">
              <div class="bg-dark text-white p-2 rounded">
                {{ mensaje.mensaje }}
              </div>
            </div>
            <!-- Mensaje del usuario -->
            <div v-else class="flex justify-content-start">
              <div class="bg-white text-black p-2 rounded">
                {{ mensaje.mensaje }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- FORM -->
      <form @submit.prevent="enviarMensaje">
        <div class="bg-white p-4 d-flex align-items-center">
          <input
            type="text"
            placeholder="Type your message..."
            class="form-control flex-fill me-2 rounded-pill"
            v-model="mensaje.mensaje"
            required
          />
          <button class="btn btn-primary p-2" type="submit">
            <i class="fas fa-share"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { watch, onMounted, ref } from 'vue';
import { guardarIdUsuario } from '../composables/chatComposable';

const user = ref(localStorage.getItem('user'));
const userId = ref(0);

if (user.value) {
  userId.value = JSON.parse(user.value).id;
  console.log(userId.value);
}

export default {
  setup() {
    const mensajes = ref([]);

    const { idUsuario } = guardarIdUsuario();

    const cargarMensajes = async () => {
      try {
        const res = await fetch(`http://localhost/ADL/mensajes.php?id=${userId.value}`);
        const data = await res.json();
        mensajes.value = data;
      } catch (error) {
        console.error('Error al cargar mensajes', error);
      }
    };

    watch(idUsuario, cargarMensajes);

    onMounted(cargarMensajes);

    // Crear mensaje

    const mensaje = ref({
      mensaje: '',
      destinatario_id: 0,
      remitente_id: userId.value,
    });

    const enviarMensaje = async () => {
      mensaje.value.remitente_id = userId.value;
      mensaje.value.destinatario_id = 1;

      console.log(mensaje.value);
      const response = await fetch('http://localhost/ADL/mensajes.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },

        body: JSON.stringify(mensaje.value),
      });

      if (response.ok) {
        const data = await response.json();
        console.log(data);
        await cargarMensajes();
        console.log(mensaje.value);

        mensaje.value = {
          mensaje: '',
          destinatario_id: '',
          remitente_id: '',
        };
      } else {
        console.error('Error al enviar mensaje ', response.status, response.statusText);
      }
    };

    return {
      mensajes,
      cargarMensajes,
      mensaje,
      enviarMensaje,
      idUsuario,
    };
  },
};
</script>

<style scoped>
p {
  color: white;
}
</style>
