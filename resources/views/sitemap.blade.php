{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($urls as $url)
    <url>
        <loc>{{ $url['loc'] }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($url['lastmod'])->format('Y-m-d') }}</lastmod>
        <changefreq>
            @php
                // Define changefreq padrão baseado na URL
                if(str_contains($url['loc'], '/inicio')) {
                    echo 'daily';
                } elseif(str_contains($url['loc'], '/produtos-para-')) {
                    echo 'weekly';
                } else {
                    echo 'monthly';
                }
            @endphp
        </changefreq>
        <priority>
            @php
                // Define prioridade baseado na URL
                if(str_contains($url['loc'], '/inicio')) {
                    echo '1.0';
                } elseif(str_contains($url['loc'], '/produtos-para-')) {
                    echo '0.8';
                } else {
                    echo '0.5';
                }
            @endphp
        </priority>
    </url>
    @endforeach
</urlset>
