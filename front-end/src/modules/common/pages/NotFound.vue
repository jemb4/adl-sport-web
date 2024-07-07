<template>
  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card w-75 shadow">
      <div class="card-body text-center">
        <h1 class="display-1 font-weight-bold">404</h1>
        <h1 class="display-4 py-4">oops! Page not found</h1>
        <p class="h5 pb-4 px-5 d-flex justify-content-center">
          Oops! The page you are looking for does not exist. It might have been moved or deleted.
        </p>
        <RouterLink replace to="/">
          <button class="btn btn-lg btn-secondary mr-3">HOME</button>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<style scoped>
.btn-secondary {
  color: white;
}
</style>
