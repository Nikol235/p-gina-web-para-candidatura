<div class="info-grid" style="margin-top:30px;">
    @foreach ($categories as $category)
        <article class="info-card">
            <img src="{{ $category->image ?? 'default.jpg' }}" alt="{{ $category->name }}" class="info-img">
            <div class="info-text">
                <h3 class="info-title">{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
            </div>
        </article>
    @endforeach
</div>
