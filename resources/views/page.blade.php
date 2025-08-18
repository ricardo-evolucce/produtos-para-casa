<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link rel="icon" href="img/favicon-2.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon3.png">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="robots" content="index, follow, max-image-preview:large">

    {{-- Dynamic Schema.org for 1 to 3 products --}}
    @foreach($schemaProducts as $product)
        <script type="application/ld+json">
        {!! json_encode([
            "@context" => "https://schema.org",
            "@type" => "Product",
            "name" => $product->name,
            "image" => asset('img/' . $product->image),
            "description" => $product->description,
            "offers" => [
                "@type" => "Offer",
                "priceCurrency" => "BRL",
                "price" => number_format($product->price, 2, '.', ''),
                "availability" => "https://schema.org/InStock"
            ]
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
        </script>
    @endforeach

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <title>{{ $page->title }}</title>
</head>
<body>

    {{-- Navbar --}}
    <header class="navbar">
        <div class="logo"><a href="{{route('home')}}">PRODUTOS PARA CASA.COM.BR</div>

        {{-- Botão Mobile --}}
        <div class="menu-toggle" id="menu-toggle">&#9776;</div>

        {{-- Menu Principal (categorias amplas) --}}
        <nav class="nav-links" id="nav-links">
            <a href="{{ url('/') }}">Home</a>
            @foreach(getMenu('principal') as $item)
                <a href="{{ url($item->page->slug) }}">{{ $item->title }}</a>
            @endforeach
        </nav>
    </header>

    {{-- Menu Secundário (caudas longas) - Faixa Rolável --}}
    <div class="menu-secundario">
        @foreach(getMenu('secundario') as $item)
            <a href="{{ url($item->page->slug) }}">{{ $item->title }}</a>
        @endforeach
    </div>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-content">
            <h1>{{ $page->title }}</h1>
            <p>{!! nl2br(e($page->description)) !!}</p>
        </div>
        @if($page->hero_image)
            <div class="hero-image">
                <img src="{{ asset('img/' . $page->hero_image) }}" alt="{{ $page->title }}" />
            </div>
        @endif
    </section>

    {{-- Product Grid --}}
    <div class="product-grid">
        @foreach($page->products as $product)
            <a href="{{ $product->url }}">
                <div class="product-card" data-category="{{ $product->category }}" data-price="{{ $product->price }}">
                    <img src="{{ asset('/' . $product->image) }}" alt="{{ $product->alt ?? $product->name }}" />
                    <h4>{{ $product->name }}</h4>
                    <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    @if($product->description)
                        <p class="product-desc">{{ $product->description }}</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>

    {{-- Rodapé com Menu Especial --}}
<footer class="footer">
    <ul class="footer-links">
        @foreach(getMenu('rodape') as $item)
            <li><a href="{{ url($item->page->slug) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</footer>



    <script>
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.getElementById('menu-toggle');
  const nav = document.getElementById('nav-links');

  toggle.addEventListener('click', function () {
    nav.classList.toggle('active');
  });
});
</script>


</body>
</html>
