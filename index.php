<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Control-Covid19</title>
      <link rel="icon" href="../../assets/img/logo.png">
      <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
      <style>
          body {
              font-family: 'Roboto', sans-serif;
              background-color: #cae6d1 !important;
          }
          .navbar-dark {
              background-color: #2c3e50 !important;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          }
          .bg-primary {
              background-color: #27ae60 !important;
          }
          header {
              height: 50vh;
              min-height: 300px;
              display: flex;
              align-items: center;
              justify-content: center;
              color: white;
              text-align: center;
              background-image: url('img/home-page.png');
              background-size: cover;
              background-position: center;
              background-repeat: no-repeat;
              position: relative;
          }
          header::after {
              content: '';
              position: absolute;
              top: 0;
              right: 0;
              bottom: 0;
              left: 0;
              background: rgba(0, 0, 0, 0.3);
          }
          header h1 {
              font-size: 3rem;
              margin-bottom: 0.5rem;
              z-index: 1;
              position: relative;
          }
          header p {
              font-size: 1.5rem;
              margin-bottom: 1rem;
              z-index: 1;
              position: relative;
          }
          section {
              padding: 40px 0;
          }
          .card {
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
              border: none;
              border-radius: 10px;
              margin-bottom: 20px;
          }
          .card-body {
              padding: 20px;
          }
          .hr-style {
              border-top: 3px solid #27ae60;
              width: 50px;
              margin: 20px auto;
          }
          .lead {
              font-size: 1.1rem;
          }
          footer {
              padding: 20px 0;
          }
      </style>
  </head>
  <body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
          <div class="container">
              <a class="navbar-brand js-scroll-trigger" href="#page-top">Control-Covid19</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="#about">¿Qué es?</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="#services">Síntomas</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="#contact">Prevención</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="new-user-testing.php">Registro</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="live-test-updates.php">Estadísticas</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="login.php">Ingresar</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <header class="bg-primary text-white">
          <div class="container">
              <h1>Control-Covid19</h1>
              <p class="lead" style="font-size: 28px;"><strong>Control de Registro de Pruebas</strong></p>
          </div>
      </header>
      <section id="about">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 mx-auto text-center">
                      <h2>¿Qué es el Covid-19?</h2>
                      <hr class="hr-style"/>
                      <div class="card">
                          <div class="card-body">
                              <p class="lead">La enfermedad por coronavirus (COVID-19) es una infección causada por un nuevo tipo de coronavirus. La mayoría de las personas infectadas con el virus COVID-19 presentarán síntomas leves a moderados y se recuperarán sin necesidad de un tratamiento especial. Sin embargo, las personas mayores y aquellas con condiciones médicas subyacentes, como enfermedades cardiovasculares, corren un mayor riesgo de desarrollar complicaciones graves.</p>
                              <p class="lead">La propagación del virus COVID-19 ocurre predominantemente mediante la emisión de gotas de saliva o secreciones nasales durante la tos o el estornudo de una persona infectada. Por consiguiente, es crucial adherirse a las normas de etiqueta respiratoria para mitigar su transmisión.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services" class="bg-light">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 mx-auto text-center">
                      <h2>Síntomas de Infección por Covid-19</h2>
                      <hr class="hr-style"/>
                      <div class="card">
                          <div class="card-body">
                              <p><strong>Fiebre alta 2-14 días!</strong><br />Las enfermedades registradas han abarcado una amplia gama de manifestaciones, desde síntomas leves hasta condiciones graves, con consecuencias fatales en algunos casos.</p>
                              <hr class="hr-style"/>
                              <p><strong>Tos seca 2-14 días!</strong><br />Las patologías registradas han presentado una diversidad de sintomatologías, que oscilan desde manifestaciones leves hasta condiciones severas, algunas de las cuales han culminado lamentablemente en fallecimiento.</p>
                              <hr class="hr-style"/>
                              <p><strong>Dificultad para respirar!</strong><br />La casuística médica ha evidenciado una amplia gama de presentaciones, que van desde manifestaciones sintomáticas leves hasta cuadros clínicos graves, con desenlaces fatales en determinados casos.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="contact">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 mx-auto text-center">
                      <h2>Cuidados Preventivos</h2>
                      <hr class="hr-style"/>
                      <div class="card">
                          <div class="card-body">
                              <ul class="list-unstyled">
                                <li>Practica una adecuada higiene de manos con regularidad.</li>
                                <li>Utiliza mascarillas de forma apropiada y en los lugares indicados.</li>
                                <li>Evita el contacto directo con individuos que presenten síntomas de enfermedad.</li>
                                <li>Adopta siempre la medida de cubrir tu boca y nariz al toser o estornudar.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <footer class="py-3 bg-dark">
          <div class="container text-center text-white">
            <p class="m-0" data-wow-delay=".5s" style="font-size: 16px; visibility: visible;">Conoce mas sobre nosotros</p>
            <p class="m-0" data-wow-delay=".5s" style="font-size: 16px; visibility: visible;"><strong>&copy; Copyright <span>2024 </span>Alejandro Cisneros Villegas v2.0.1</strong></p>
          </div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <script src="js/scrolling-nav.js"></script>
  </body>
</html>