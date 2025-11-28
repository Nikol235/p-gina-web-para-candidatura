<div class="news-carousel" style="margin-bottom:30px;">
    <button class="prev-btn" aria-label="Anterior noticia">&#10094;</button>

    <div class="news-wrapper">
        <div class="news-track">

            @foreach ($noticias as $noticia)
                <div class="news-item">
                    <img src="{{ $noticia->image ?? 'default.jpg' }}"
                         alt="{{ $noticia->name }}"
                         class="about-img">

                    <div class="about-text">
                        <h1>{{ $noticia->name }}</h1>
                        <p>{{ $noticia->description }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <button class="next-btn" aria-label="Siguiente noticia">&#10095;</button>
</div>
