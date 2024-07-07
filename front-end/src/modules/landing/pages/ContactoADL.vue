<template>
  <section>
    <!-- AUTH -->
    <div v-if="!user">
      <div class="auth-container row">
        <div class="col-lg-6 col-md-12">
          <LoginComponent />
        </div>
        <div class="col-lg-6 col-md-12">
          <RegisterComponent />
        </div>
      </div>

      <br />
      <br />
    </div>
    <!-- Fin AUTH -->

    <!-- Chat -->
    <div v-else>
      <!-- usuario Chat -->
      <div v-if="userRol === 1">
        <ChatUser />
      </div>
      <!-- Fin usuario Chat -->

      <!-- admin Chat -->
      <div v-else-if="userRol === 2">
        <ChatAdmin />
      </div>
      <!-- Fin admin Chat -->
      <button class="btn btn-dark fixed" @click="logout">Cerrar sesión</button>
    </div>
    <!-- Fin del Chat -->
  </section>
</template>

<script setup>
import RegisterComponent from '@/modules/auth/components/RegisterComponent.vue';
import LoginComponent from '@/modules/auth/components/LoginComponent.vue';

import ChatUser from '@/modules/chat/views/ChatUser.vue';
import ChatAdmin from '@/modules/chat/views/ChatAdmin.vue';

import { ref } from 'vue';
import { useAuthStore } from '@/stores/user.js';

const user = ref(localStorage.getItem('user'));
const authStore = useAuthStore();
const userRol = ref(0); // 1 = user, 2 = admin

if (user.value) {
  userRol.value = JSON.parse(user.value).rol_id;
}

const logout = () => {
  authStore.logout();
  user.value = null;
  window.location.reload();
};
console.log(user);
</script>

<style scoped>
.form-container {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-top: 50px;
  padding: 20px;
  width: 400px;
}

.auth-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.fixed {
  position: fixed;
  bottom: 20px;
  left: 20px;
}

section {
  font-weight: bold;
}
</style>
