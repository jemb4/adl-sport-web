<template>
  <div class="row">
    <div class="col-3">
      <ChatUsuarios />
    </div>
    <div class="col">
      <ChatLayout />
    </div>
  </div>
</template>

<script setup>
import ChatLayout from '../layouts/ChatLayoutAdmin.vue';
import ChatUsuarios from '../layouts/AdminChats.vue';
</script>

<style></style>
