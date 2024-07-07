<template>
  <section class="container px-5 pb-3 pt-4 form-container">
    <div class="d-flex justify-content-center">
      <form @submit.prevent="login">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" v-model="email" class="form-control" id="email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" v-model="password" class="form-control" id="password" required />
        </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
      </form>
    </div>
  </section>
</template>

<script>
import { useAuthStore } from '@/stores/user.js';

export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    async login() {
      try {
        const response = await fetch('http://localhost/ADL/usuario.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            email: this.email,
            password: this.password,
          }),
        });

        const data = await response.json();

        if (data.id) {
          const authStore = useAuthStore();
          authStore.setUser(data);
          //recarga la página
          this.$router.go();
        } else {
          this.errorMessage = data.mensaje;
        }
      } catch (error) {
        this.errorMessage = 'Error logging in. Please try again.';
      }
    },
  },
};
</script>

