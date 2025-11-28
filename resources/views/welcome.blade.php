<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">

  <meta name="keywords" content="">

  <title>Hugo Tapara Saya</title>

  <link href="assets/img/favicon.png" rel="icon">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- FUENTES DE GOOGLE -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- ICONOS DE FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- ARCHIVOS DE ESTILOS Y SCRIPTS PROPIOS -->
  <link href="assets/styles.css" rel="stylesheet">

  <script defer src="assets/scripts.js"></script>
  <!-- Archivo JavaScript que hace funcionar las partes de noticias, eventos y  propuestas-->
</head>

<body>

<!--BARRA SUPERIOR FIJA CON EFECTO DIFUMINADO -->
<div class="header-blur"></div>

<img class="menu" src="assets/img/logo.png" alt="logo">
<!-- Es el logo en la esquina superior izquierda -->


<div class="lado">

  <ul>

    <a href="#inicio"><img class="cas" src="assets/img/cas.jpg" alt="cas"></a>
    <!-- La casita que lleva al inicio -->

    <li><a href="#acerca" data-key="acerca">ACERCA DE</a></li>

    <li><a href="#noticias" data-key="noticias">NOTICIAS</a></li>

    <li><a href="#eventos" data-key="eventos">EVENTOS</a></li>

    <li><a href="#propuestas" data-key="propuestas">PROPUESTAS</a></li>

    <li><a href="#contacto" data-key="ayudanos">AYUDANOS</a></li>

    <li class="idioma-wrapper">
      <!-- Contenedor del menú de idiomas -->

      <a id="idiomaBtn" class="idioma-btn" data-key="idiomas">IDIOMAS ▼</a>
      <!-- Botón que muestra/oculta el menú de idiomas -->

      <ul class="idioma-menu" id="idiomaMenu">

        <li><a href="#" onclick="cambiarIdioma('es')">Español</a></li>

        <li><a href="#" onclick="cambiarIdioma('ay')">Aymara</a></li>

        <li><a href="#" onclick="cambiarIdioma('qu')">Quechua</a></li>
      </ul>
    </li>
  </ul>
</div>

<section id="inicio" style="background-image: url('assets/img/can.jpg');">
  <!-- Sección principal con imagen de fondo del candidato -->

  <div class="hero-overlay">
    <!-- Contenedor de los iconos de redes sociales -->

    <div class="icons-under-text">

      <a href="#"><i class="fab fa-whatsapp"></i></a>

      <a href="#"><i class="fab fa-tiktok"></i></a>

      <a href="#"><i class="fab fa-facebook-f"></i></a>

      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</section>


<section id="acerca" class="contact-section">


  <h2 class="about-title" data-key="tite">ACERCA DE MI</h2>

  <div class="about-content">


    <img src="assets/img/cel.jpg" alt="About Image" class="about-img">

    <p>
     Hugo Raúl Tapara Saya es un político y dirigente originario de la región Puno, Perú. Estudió Ciencias de la Comunicación en la Universidad Nacional del Altiplano, donde fortaleció su interés por el desarrollo social y educativo de su región. Inició su participación pública en organizaciones comunitarias y posteriormente fue miembro fundador del movimiento regional Gestionando Obras y Oportunidades con Liderazgo (GOOL). En 2018 postuló a la alcaldía del distrito de Ituata y, en 2022, al Gobierno Regional de Puno, centrando su propuesta en mejorar la educación, la conectividad digital, la salud y las oportunidades de desarrollo para las comunidades rurales puneñas.
    </p>
  </div>

  @livewire('category-display')
  <!-- Esto carga información desde la base de datos y tambien desde el category-main.blade.php -->
</section>


<section id="noticias" class="noticias-section">

  <h2 class="about-title" data-key="noticias" style="color: #fff;">NOTICIAS</h2>

  <div class="news-carousel">

    <!-- BOTÓN ANTERIOR -->
    <button class="prev-btn news-prev" onclick="moveCarousel('news', -1)">
      <i class="fas fa-chevron-left"></i>
      <!-- Icono de flecha izquierda -->
    </button>

    <div class="news-wrapper">

      <div class="news-track" id="newsTrack">

        <!-- NOTICIA 1 -->
        <div class="news-item">
          <img src="assets/img/clima.jpg" alt="Noticia 1" class="news-img">
          <div class="news-text">
            <h3>Nueva Legislación Ambiental 2025</h3>
            <p>El gobierno aprueba nuevas medidas para la protección de ecosistemas andinos. Esta iniciativa busca preservar la biodiversidad y promover el desarrollo sostenible en las comunidades rurales.</p>
            <span class="news-date"><i class="far fa-calendar"></i> 15 Nov 2025</span>
          </div>
        </div>

        <!-- NOTICIA 2 -->
        <div class="news-item">
          <img src="assets/img/reforestacion.jpg" alt="Noticia 2" class="news-img">
          <div class="news-text">
            <h3>Proyecto de Reforestación Exitoso</h3>
            <p>Se plantaron más de 50,000 árboles nativos en la región andina durante este año. Los resultados han superado las expectativas iniciales, mejorando significativamente la calidad del aire.</p>
            <span class="news-date"><i class="far fa-calendar"></i> 10 Nov 2025</span>
          </div>
        </div>

        <!-- NOTICIA 3 -->
        <div class="news-item">
          <img src="assets/img/escuela.jpg" alt="Noticia 3" class="news-img">
          <div class="news-text">
            <h3>Inauguración Centro de Educación</h3>
            <p>Nuevo centro educativo ambiental abre sus puertas en Juliaca. El espacio ofrecerá talleres gratuitos sobre sostenibilidad, reciclaje y conservación del medio ambiente.</p>
            <span class="news-date"><i class="far fa-calendar"></i> 5 Nov 2025</span>
          </div>
        </div>

      </div>
    </div>

    <!-- BOTÓN SIGUIENTE (FLECHA DERECHA) -->
    <button class="next-btn news-next" onclick="moveCarousel('news', 1)">
      <i class="fas fa-chevron-right"></i>
      <!-- Icono de flecha derecha -->
    </button>
  </div>

  <div class="carousel-indicators" id="newsIndicators"></div>
</section>


<section id="eventos" class="eventos-section">

  <h2 class="about-title" data-key="eventos">EVENTOS</h2>

  <div class="events-carousel">

    <button class="prev-btn events-prev" onclick="moveCarousel('events', -1)">
      <i class="fas fa-chevron-left"></i>
    </button>

    <div class="events-wrapper">
      <div class="events-track" id="eventsTrack">

        <!-- EVENTO 1 -->
        <div class="event-card">

          <div class="event-date-badge">
            <!-- Badge (insignia) con la fecha en la esquina -->
            <span class="day">15</span>
            <span class="month">DIC</span>
          </div>

          <img src="assets/img/feria.jpg" alt="Evento 1" class="event-img">
          <div class="event-content">
            <h3>Feria Ecológica Regional</h3>
            <p class="event-location"><i class="fas fa-map-marker-alt"></i> Plaza Principal, Juliaca</p>
            <p class="event-description">Encuentro de productores locales, talleres de reciclaje y actividades para toda la familia. Entrada libre.</p>
            <a href="#" class="event-btn">Más Información</a>
          </div>
        </div>

        <!-- EVENTO 2 -->
        <div class="event-card">
          <div class="event-date-badge">
            <span class="day">20</span>
            <span class="month">DIC</span>
          </div>
          <img src="assets/img/compostaje.jpg" alt="Evento 2" class="event-img">
          <div class="event-content">
            <h3>Taller de Compostaje</h3>
            <p class="event-location"><i class="fas fa-map-marker-alt"></i> Centro Comunitario</p>
            <p class="event-description">Aprende a crear tu propio compost casero y reducir residuos orgánicos. Materiales incluidos.</p>
            <a href="#" class="event-btn">Más Información</a>
          </div>
        </div>

        <!-- EVENTO 3 -->
        <div class="event-card">
          <div class="event-date-badge">
            <span class="day">28</span>
            <span class="month">DIC</span>
          </div>
          <img src="assets/img/rios.jpg" alt="Evento 3" class="event-img">
          <div class="event-content">
            <h3>Limpieza de Ríos</h3>
            <p class="event-location"><i class="fas fa-map-marker-alt"></i> Río Torococha</p>
            <p class="event-description">Jornada de voluntariado para limpiar y proteger nuestros recursos hídricos. Inscripciones abiertas.</p>
            <a href="#" class="event-btn">Más Información</a>
          </div>
        </div>

      </div>
    </div>

    <!-- BOTÓN SIGUIENTE -->
    <button class="next-btn events-next" onclick="moveCarousel('events', 1)">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>

  <div class="carousel-indicators" id="eventsIndicators"></div>
</section>


<section id="propuestas" class="propuestas-section">

  <h2 class="about-title" data-key="propuestas">PROPUESTAS</h2>

  <div class="proposals-carousel">

    <!-- BOTÓN ANTERIOR -->
    <button class="prev-btn proposals-prev" onclick="moveCarousel('proposals', -1)">
      <i class="fas fa-chevron-left"></i>
    </button>

    <div class="proposals-wrapper">
      <div class="proposals-track" id="proposalsTrack">
        <!-- PROPUESTA 1 -->
        <div class="proposal-card">
            <div class="proposal-icon">
            <i class="fas fa-leaf"></i>
          </div>

          <img src="assets/img/parques.jpg" alt="Propuesta 1" class="proposal-img">

          <div class="proposal-content">
            <h3>Parques Verdes Urbanos</h3>
            <p class="proposal-category">Medio Ambiente</p>
            <p class="proposal-description">Crear espacios verdes en zonas urbanas para mejorar la calidad del aire y promover la recreación saludable de las familias.</p>
            <div class="proposal-stats">
              <span><i class="fas fa-users"></i> 1,245 apoyos</span>
              <span><i class="fas fa-chart-line"></i> En progreso</span>
            </div>
            <a href="#" class="proposal-btn">Apoyar Propuesta</a>
          </div>
        </div>

        <!-- PROPUESTA 2 -->
        <div class="proposal-card">
          <div class="proposal-icon">
            <i class="fas fa-recycle"></i>
            <!-- Icono de reciclaje -->
          </div>
          <img src="assets/img/reciclake.jpg" alt="Propuesta 2" class="proposal-img">
          <div class="proposal-content">
            <h3>Reciclaje Comunitario</h3>
            <p class="proposal-category">Economía Circular</p>
            <p class="proposal-description">Implementar puntos de reciclaje en todos los barrios con incentivos para las familias que separen correctamente sus residuos.</p>
            <div class="proposal-stats">
              <span><i class="fas fa-users"></i> 892 apoyos</span>
              <span><i class="fas fa-chart-line"></i> Planificación</span>
            </div>
            <a href="#" class="proposal-btn">Apoyar Propuesta</a>
          </div>
        </div>

        <!-- PROPUESTA 3 -->
        <div class="proposal-card">
          <div class="proposal-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <img src="assets/img/cel.jpg" alt="Propuesta 3" class="proposal-img">
          <div class="proposal-content">
            <h3>Seguridad Ciudadana</h3>
            <p class="proposal-category">Seguridad</p>
            <p class="proposal-description">Fortalecer la seguridad con más patrullaje, cámaras de vigilancia y programas de prevención del delito en zonas vulnerables.</p>
            <div class="proposal-stats">
              <span><i class="fas fa-users"></i> 2,456 apoyos</span>
              <span><i class="fas fa-chart-line"></i> En ejecución</span>
            </div>
            <a href="#" class="proposal-btn">Apoyar Propuesta</a>
          </div>
        </div>
      </div>
    </div>

    <button class="next-btn proposals-next" onclick="moveCarousel('proposals', 1)">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>

  <div class="carousel-indicators" id="proposalsIndicators"></div>
</section>


<section id="contacto" class="contact-section1">
  <div class="form-wrapper">

    <form class="cool-form">

      <h2 class="form-title">CONTÁCTANOS</h2>
      <div class="form-group">

        <input type="text" class="cool-input" placeholder="Nombre completo" required>
      </div>

      <div class="form-group">
        <input type="email" class="cool-input" placeholder="Correo electrónico" required>
        <!-- Campo para email (el type="email" valida automáticamente que sea un email válido esito noma era xd) -->
      </div>

      <div class="form-group">
        <input type="tel" class="cool-input" placeholder="Teléfono">
      </div>

      <div class="form-group">
        <textarea class="cool-input textarea" placeholder="Tu mensaje" rows="5" required></textarea>

      </div>

      <div class="form-btn">
        <button type="submit" class="cool-btn">Enviar Mensaje</button>
        <!-- "type=submit" indica que este botón envía los datos -->
      </div>
    </form>
  </div>
</section>

</body>
</html>
