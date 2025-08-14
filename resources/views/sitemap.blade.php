{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 
                            https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    @foreach($urls as $url)
    <url>
        <loc>{{ e($url['loc']) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($url['lastmod'])->format('Y-m-d') }}</lastmod>
        <changefreq>@php
                $loc = $url['loc'];
                if (str_contains($loc, '/inicio')) {
                    echo 'daily';
                } elseif (str_contains($loc, '/produtos-para-')) {
                    echo 'weekly';
                } else {
                    echo 'monthly';
                }
            @endphp</changefreq>
        <priority>@php
                $loc = $url['loc'];
                if (str_contains($loc, '/inicio')) {
                    echo '1.0';
                } elseif (str_contains($loc, '/produtos-para-')) {
                    echo '0.8';
                } else {
                    echo '0.5';
                }
            @endphp</priority>
    </url>
    @endforeach

</urlset>
