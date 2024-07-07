<template>
  <div class="flex flex-col h-screen">
    <!-- Navbar -->
        <NavBar />
    <!-- Fin Navbar -->


    <!-- Main -->
    <main class="container flex items-center justify-center landing-container">
      <!-- <RouterView /> -->
      <router-view>
      </router-view>
    </main>
    <!-- Fin Main -->


    <!-- Footer -->
    <FooterWeb />
    <WhatsApp />
    <!-- Fin Footer -->
  </div>
</template>

<script setup>
import NavBar from '@/modules/common/components/NavBar.vue';
import FooterWeb from '@/modules/common/components/FooterWeb.vue';
import WhatsApp from '@/modules/common/components/WhatsApp.vue';
</script>

<style scoped>
.landing-container{
background-color: rgb(365, 365, 365, 0.2);
border-radius: 10px 10px 5px 0px;
}
</style>