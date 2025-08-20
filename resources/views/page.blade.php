<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link rel="icon" href="img/favicon/favicon-2.ico">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon3.png">

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

{{-- Dynamic Schema.org para FAQ --}}
@foreach($page->sections as $section)
    @if($section->type === 'faq')
        <script type="application/ld+json">
        {!! json_encode([
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => collect($section->content['items'] ?? [])->map(function($item) {
                return [
                    "@type" => "Question",
                    "name" => $item['question'],
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $item['answer']
                    ]
                ];
            })->values()->all()
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
        </script>
    @endif
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

    @foreach($page->sections as $section)
    @if($section->type === 'faq')
        <section class="section-faq">
            <h2>Perguntas Frequentes</h2>
            <div class="faq-list">
                @foreach($section->content['items'] ?? [] as $item)
                    <div class="faq">
                        <button class="faq-question">{{ $item['question'] }}</button>
                        <div class="faq-answer">
                            <p>{{ $item['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- CSS inline para garantir --}}
        <style>
            .section-faq { max-width: 800px; margin: 50px auto; padding: 0 20px; }
            .section-faq h2 { font-size: 2rem; margin-bottom: 20px; text-align: center; color: #333; }
            .faq { border-bottom: 1px solid #e0e0e0; }
            .faq-question {
                width: 100%; background: #f7f7f7; border: none; padding: 15px 20px;
                text-align: left; font-size: 1.1rem; font-weight: 500; cursor: pointer;
                outline: none; transition: background 0.2s; display: flex; justify-content: space-between; align-items: center;
            }
            .faq-question:hover { background: #ececec; }
            .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease; padding: 0 20px; }
            .faq-answer p { margin: 15px 0; line-height: 1.6; color: #555; }
            .faq.open .faq-answer { max-height: 500px; padding: 10px 20px 20px; }
            .faq-question::after { content: '+'; font-size: 1.2rem; transition: transform 0.3s; }
            .faq.open .faq-question::after { transform: rotate(45deg); }
        </style>

        {{-- JS accordion --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.faq').forEach(faq => {
                    const btn = faq.querySelector('.faq-question');
                    btn.addEventListener('click', () => {
                        faq.classList.toggle('open');
                    });
                });
            });
        </script>
    @endif
@endforeach


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
