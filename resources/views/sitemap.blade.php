<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($posts as $post)
        <url>
            <loc>https://lenterakasihagape.org/article/{{ $post->slug }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>