import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: () => import('@/modules/landing/layouts/LandingPage.vue'),
      children: [
        {
          path: '/',
          name: 'home',
          component: () => import('@/modules/landing/pages/LandingADL.vue'),
        },
        {
          path: '/sport-training',
          name: 'sport-training',
          component: () => import('@/modules/landing/pages/SportTraining.vue'),
        },
        {
          path: '/nutricion-y-dietetica',
          name: 'nutricion-y-dietetica',
          component: () => import('@/modules/landing/pages/NutricionYDietetica.vue'),
        },
        {
          path: '/noticias',
          name: 'noticias',
          component: () => import('@/modules/landing/pages/NoticiasADL.vue'),
        },
        {
          path: '/contacto',
          name: 'contacto',
          component: () => import('@/modules/landing/pages/ContactoADL.vue'),
        }
      ],
    },

    //Not found
    {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: () => import('@/modules/common/pages/NotFound.vue'),
    },
  ],
});

export default router;
