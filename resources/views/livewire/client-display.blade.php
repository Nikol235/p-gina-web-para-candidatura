<div>
  <!-- ========================
       SECCIÓN 5: EVENTOS (DINÁMICO)
       ======================== -->
  <section id="eventos" class="contact-section">
    <h2 class="about-title" data-key="eventos">EVENTOS</h2>

    <div class="grid">

      @foreach ($clients as $client)
      <article class="card">
        <img src="{{ $client->image ?? 'default.jpg' }}" alt="{{ $client->name }}">
        <div class="card-body">
          <h3 class="card-title">{{ $client->name }}</h3>
          <p class="card-text">{{ $client->description }}</p>
        </div>
        <div class="card-actions">
          <a href="#" class="btn">Ver mas</a>
        </div>
      </article>
      @endforeach

    </div>
  </section>
</div>
