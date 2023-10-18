<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{env("APP_URL")}}/blog/{{$post->id}}</loc>
            <lastmod>{{$post->updated_at->format(DateTime::W3C)}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>