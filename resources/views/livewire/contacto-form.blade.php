<section id="contacto" class="contact-section1" aria-label="Contacto" style="padding:40px 0;">
    <h2 class="about-title" data-key="ayudanos"></h2>

    <div class="form-wrapper">

      <form action="{{ route('contacto.enviar') }}" method="POST" class="php-email-form cool-form" novalidate>
        @csrf

        <h3 class="form-title">Contáctanos 🌱</h3>

        <div class="form-group">
          <input type="text" name="name" class="cool-input" placeholder="Tu Nombre" required>
        </div>

        <div class="form-group">
          <input type="email" name="email" class="cool-input" placeholder="Tu Correo" required>
        </div>

        <div class="form-group">
          <input type="text" name="subject" class="cool-input" placeholder="Asunto" required>
        </div>

        <div class="form-group">
          <textarea name="message" class="cool-input textarea" rows="5" placeholder="Tu Mensaje" required></textarea>
        </div>

        <div class="form-btn">
          <button type="submit" class="cool-btn">Enviar Mensaje</button>
        </div>

      </form>

    </div>
</section>
