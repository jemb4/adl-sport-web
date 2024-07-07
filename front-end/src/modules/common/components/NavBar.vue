<template>
  <header class="d-flex align-items-center border-bottom justify-content-center p-3 container">
    <nav class="navbar d-lg-block">
      <!-- Navbar -->
      <div class="container-fluid gap-3">
        <RouterLink :to="{ name: 'home' }">
          <img
            alt="Vue logo"
            class="logo d-flex align-items-center gap-2 font-weight-bold"
            src="/src/assets/images/ADL-logo.png"
            width="90"
            height="90"
          />
        </RouterLink>
        <RouterLink to="/sport-training" class="navbar-brand nav-link adl-navbar pad-left" exact-active-class="active"> Sport Training </RouterLink>
        <RouterLink to="/nutricion-y-dietetica" class="navbar-brand nav-link adl-navbar" exact-active-class="active">
          Nutrición y Dietética
        </RouterLink>
        <RouterLink to="/noticias" class="navbar-brand nav-link adl-navbar" exact-active-class="active"> Noticias </RouterLink>
        <RouterLink to="/contacto" class="navbar-brand nav-link adl-navbar" exact-active-class="active"> Contacto </RouterLink>

        <!-- Fin Navbar -->
      </div>
    </nav>
  </header>
</template>

<style scoped>
.adl-navbar{
  padding-bottom: 10px;
  font-weight: 600;
  font-size: larger;
  color: #353537;
}

.adl-navbar:hover{
  color: #ff5c16;
  opacity: 90%;
}

.active{
  color: #ff4114 !important;
}

.pad-left{
  padding-left: 15px;
}
</style>
