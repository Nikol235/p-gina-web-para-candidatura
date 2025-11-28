<div>
  <section id="propuestas" class="contact-section">
    <h2 class="about-title" data-key="propuestas">PROPUESTAS</h2>

    <div class="grid1">

      @foreach ($agregars as $agregar)
      <article class="card1">
        <img src="{{ $agregar->image ?? 'default.jpg' }}" alt="{{ $agregar->name }}">

        <div class="card1-body">
          <h3 class="card1-title">{{ $agregar->name }}</h3>
          <p class="card1-text">{{ $agregar->description }}</p>
        </div>

        <div class="card1-actions">
          <a href="#" class="btn">Ver mas</a>
        </div>
      </article>
      @endforeach

    </div>
  </section>
</div>
