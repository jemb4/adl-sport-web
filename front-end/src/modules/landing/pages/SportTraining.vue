<template>
  <!-- Presentación -->
  <section class="container px-5 pb-3 pt-4">
    <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/domingo.jpg"
          alt="Domingo Luna"
          class="img-fluid rounded"
        />
      </div>

      <div class="col d-flex justify-content-center">
        <div class="row align-items-center">
          <h1>Domingo Luna</h1>
          <p>
            Domingo Luna, nuestro entrenador, es un experto en readaptación deportiva y preparación
            física. Posee un Máster en preparación física y readaptación de lesiones, otro en
            optimización del entrenamiento y readaptación físico-deportiva, así como una
            especialización en neurología deportiva.
          </p>
        </div>
      </div>
    </div>
  </section>

  <hr class="mx-auto w-50"/>

  <!-- Imágenes -->
  <section class="container px-5 pb-3 pt-4">
    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/h2.jpg"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Horizontal individual training 1"
        />

        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/v1.jpg"
          class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block vertical"
          alt="Vertical individual training 1"
        />
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/v2.jpg"
          class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block vertical"
          alt="Vertical individual training 1"
        />

        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/h1.jpg"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Horizontal individual training 2"
        />
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/h3.jpg"
          class="w-100 shadow-1-strong rounded mb-4"
          alt="Horizontal individual training 2"
        />

        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/v3.jpg"
          class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block vertical"
          alt="Vertical individual training 1"
        />
      </div>
    </div>
  </section>

  <!-- Fin Imagenes -->
  <hr class="mx-auto w-50" />
  <!-- Experiencia -->
  <section class="container px-5 py-3">
    <div>
      <h3>Trayectoria</h3>
      <p>
        Durante su carrera profesional, Domingo Luna comenzó como monitor deportivo y director
        técnico. Con el tiempo, se adentró en el mundo de la preparación física, iniciando su
        trayectoria de forma individual hasta llegar a trabajar con jugadores profesionales de
        fútbol. Fue entonces cuando recibió la invitación para ser el preparador físico y
        readaptador del Cádiz Senior, donde trabajó durante un año.
      </p>
      <p>
        Durante ese período, Domingo se dio cuenta de que su verdadera pasión no residía únicamente
        en trabajar con profesionales, sino en ayudar a deportistas aficionados. Personas comunes
        que no poseen la misma educación deportiva que los atletas profesionales. Su objetivo es
        educar y mejorar la vida de aquellos que desean iniciarse en el deporte, no con el fin de
        convertirse en profesionales, sino para llevar una vida más sana y activa, practicando
        deporte de manera moderada y correcta para evitar lesiones.
      </p>
      <p>
        Para lograr esto, Domingo cree firmemente que la mejor manera de entrenar es con la guía de
        un profesional que te acompañe y te oriente. Sin embargo, reconoce que cada persona es
        única, por lo que el entrenamiento en grupo puede resultar menos efectivo. Por ello, Domingo
        Luna confía en la eficacia del <b>entrenamiento individualizado</b>, adaptado a las
        necesidades específicas de cada persona.
      </p>
    </div>
  </section>

  <!-- Fin de experiencia -->
  <hr class="mx-auto w-50" />
  <!-- Entrenamiento individualizado -->
  <section class="container px-5 py-3">
    <div class="row">
      <div class="col-md">
        <h3>Entrenamiento individualizado</h3>
        <p>
          En ADL, Domingo Luna ofrece un servicio de entrenamiento personalizado, adaptado a las
          necesidades y objetivos de cada persona. Con una amplia experiencia en el sector, Domingo
          Luna se encarga de diseñar un plan de entrenamiento específico para cada cliente, teniendo
          en cuenta su condición física, sus objetivos y sus preferencias.
        </p>
        <p>
          El entrenamiento personalizado es la mejor manera de garantizar que cada persona reciba la
          atención y el asesoramiento que necesita para alcanzar sus metas de forma segura y eficaz.
          Además, Domingo Luna se encarga de supervisar y ajustar el plan de entrenamiento según los
          progresos de cada cliente, asegurando que se mantenga motivado y comprometido con su
          entrenamiento.
        </p>
        <p>
          Si estás buscando un entrenador personal que te ayude a alcanzar tus objetivos de forma
          eficaz y segura, no dudes en ponerte en contacto con nosotros.
        </p>
      </div>
      <div class="col-4 d-flex justify-content-center align-items-center">
        <img
          src="https://res.cloudinary.com/djusxbbq6/image/upload/v1717782155/adl-sport-training/footer-adlsport.jpg"
          alt="Entrenamiento individualizado"
          class="d-none d-md-block img-fluid shadow-1-strong rounded mb-4"
        />
      </div>
      
    </div>
  </section>
</template>

<style scoped>
img {
  mask-image: linear-gradient(black 98%, transparent);
  box-shadow: 0 4px 6px 0 hlsa(0, 0%, 0%, 0.2);
}

@media (max-width: 992px) {
  .vertical {
    display: none !important;
  }
}
</style>