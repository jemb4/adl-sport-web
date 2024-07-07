<template>
  <!-- Presentación -->
  <section class="container px-5 pb-3 pt-4">
    <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717875070/adl-sport-training/cristina.jpg"
          alt="Cristina de Alba"
          class="img-fluid rounded"
        />
      </div>

      <div class="col d-flex justify-content-center">
        <div class="row align-items-center m-4">
          <h1>Cristina de Alba</h1>
          <p>
            Cristina de Alba, nuestra nutricionista y dietista, es especialista en asesoramiento
            nutricional individualizado y en la creación de menús adaptados a las necesidades
            específicas de cada persona.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Fin de Presentación -->
  <hr class="mx-auto w-50" />

  <!-- Servicios -->
  <section class="container px-5 py-3">
    <div>
      <h3>Asesoramiento nutricional</h3>
      <p>
        Especializada en asesoramiento nutricional individualizado, control de peso y planes
        adaptados a cada persona, Cristina de Alba tiene una gran experiencia trabajando con
        personas activas físicamente.
      </p>
      <p>
        Ofrece un control personal a través de bioimpedancia, permitiendo un seguimiento detallado
        no solo del peso, sino también de la composición corporal. Este enfoque se centra en los
        porcentajes de masa muscular, grasa y grasa visceral, que son los verdaderos indicadores de
        salud.
      </p>
      <p>
        Cristina promueve la adopción de mejores hábitos alimenticios, bocado a bocado, para que nos
        sintamos mejor con nosotros mismos y podamos estar orgullosos cuando nos veamos en el
        espejo.
      </p>
      <p>
        Su filosofía no se basa en la obsesión con dietas o entrenamientos, sino en aprender a comer
        y vivir de manera más saludable.
      </p>
    </div>
  </section>
  <!-- Fin de Servicios -->

  <hr class="mx-auto w-50" />

  <!-- Biorresonancia -->
  <section class="container px-5 py-3">
    <div @click="showModal = true">
      <img
        src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717875070/adl-sport-training/bio1.jpg"
        alt="Bioimpedancia"
        class="img-fluid rounded pointer"
      />
    </div>

    <div
      v-if="showModal"
      class="modal fade show d-block"
      @click.self="closeModal"
      style="background: rgba(0, 0, 0, 0.5)"
    >
      <div class="modal-dialog" @click.stop>
        <div class="modal-content">
          <div class="modal-header px-5 mt-2">
            <h3>ANÁLISIS Y TRATAMIENTO MAGNÉTICO POR BIORRESONANCIA:</h3>
            <button type="button" class="close" @click="showModal = false">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body px-5 mb-2">
            <p>
              La Terapia por Biorresonancia fue formulada por el doctor Franz Morell y desarrollada
              por el ingeniero alemán Erich Rasche. Consiste en un método de análisis y tratamiento
              que permite recuperar el equilibrio orgánico mediante la neutralización de las ondas
              patológicas que llevan al organismo a enfermar.
            </p>
            <p>
              Nuestras células, tejidos y órganos se expresan a través de ondas electromagnéticas y
              cuando se alteran por alguna interferencia –acusadas ya sean por algún patógeno, mala
              alimentación, alto nivel de estrés…- se desequilibran alterando así la capacidad de
              autorregulación del cuerpo y pudiendo provocar así la aparición de enfermedades.
            </p>
            <p>
              La Biorresonancia permite detectar las ondas electromagnéticas alteradas para
              reprogramarlas de nuevo mediante un “Filtro de Resonancia Molecular” que permite
              separar y clasificar las ondas en armónicas y disarmónicas, permitiendo potenciar el
              efecto de las primeras y neutralizar las ondas patológicas.
            </p>
            <p>
              Son varias las posibilidades de la Biorresonancia. Por su carácter “Biorregulador” a
              nivel orgánico su uso está indicado en un gran número de patologías. Se ha demostrado
              su eficacia en múltiples patologías como alergias, intolerancias alimenticias,
              alteraciones gastrointestinales, enfermedades dermatológicas, enfermedades reumáticas,
              asma, bronquitis… y otras patologías de carácter inflamatorio o degenerativo.
            </p>
            <p>
              En lo que a seguridad y eficacia se refiere. La Biorresonancia es tan segura tanto a
              nivel preventivo como terapéutico y puede ser utilizada en casos agudos y crónicos.
            </p>
            <p>
              Se resalta el papel fundamental que ejerce la nutrición a la hora de producir mejoras
              en los pacientes a través de un programa nutricional individualizado y ajustado a su
              patología.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin de Biorresonancia -->
</template>

<script>
import { ref } from 'vue';

export default {
  name: 'App',
  setup() {
    const showModal = ref(false);

    const closeModal = () => {
      showModal.value = false;
    };

    return {
      showModal,
      closeModal,
    };
  },
};
</script>

<style scoped>
.modal.show {
  display: block;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #f8f9fa;
  color: #495057;
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  text-align: center;
  line-height: 30px;
  font-size: 1.2rem;
  transition: background-color 0.3s ease;
}

.close:hover {
  background-color: #495057;
  color: #f8f9fa;
}

.modal.fade .modal-dialog {
  transition: transform 0.3s ease-out;
}

.modal.fade.show .modal-dialog {
  transform: translate(0, 0);
}

.modal-dialog {
  width: 55%;
  max-width: none;
}

.pointer:hover {
  cursor: pointer !important;
}
</style>
