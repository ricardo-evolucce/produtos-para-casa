{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($urls as $url)
    <url>
        <loc>{{ $url['loc'] }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($url['lastmod'])->format('Y-m-d') }}</lastmod>
        <changefreq>
            @if(isset($url['type']))
                @switch($url['type'])
                    @case('homepage')
                        daily
                        @break
                    @case('category')
                        weekly
                        @break
                    @case('product')
                        weekly
                        @break
                    @default
                        monthly
                @endswitch
            @else
                weekly
            @endif
        </changefreq>
        <priority>
            @if(isset($url['type']))
                @switch($url['type'])
                    @case('homepage')
                        1.0
                        @break
                    @case('category')
                        0.8
                        @break
                    @case('product')
                        0.5
                        @break
                    @default
                        0.5
                @endswitch
            @else
                0.8
            @endif
        </priority>
    </url>
    @endforeach
</urlset>
