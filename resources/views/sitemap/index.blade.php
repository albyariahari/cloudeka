<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        @foreach (languages() as $item)
        <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}"/>
        @endforeach
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($pages as $page)
        <url>
            <loc>{{ url('/') }}/{{ $page->anchor }}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/{{ $page->anchor }}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>{{ route('product.show',$product->translate(locale_lang())->slug) }}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/products/{{ $product->translate($item)->slug }}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($solutions as $solution)
        <url>
            <loc>{{ route('solution.show',$solution->translate(locale_lang())->slug) }}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/solutions/{{ $solution->translate($item)->slug }}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($newsCategories as $newsCategory)
        <url>
            <loc>{{ route('news.category',$newsCategory->translate(locale_lang())->slug) }}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/news/{{ $newsCategory->translate($item)->slug }}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
        @foreach ($newsCategory->News as $new)
            <url>
                <loc>{{ route('news.detail',[$newsCategory->translate(locale_lang())->slug,$new->translate(locale_lang())->slug]) }}</loc>
                @foreach (languages() as $item)
                <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/news/{{ $newsCategory->translate($item)->slug }}/{{ $new->translate($item)->slug }}"/>
                @endforeach
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
        @endforeach
    @endforeach
    @foreach ($docs as $doc)
        <url>
            <loc>{{route('documentation.detail', [$doc->id, \Str::slug(strtolower($doc->translate(locale_lang())->name))])}}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/documentation/{{ $doc->id }}/{{ \Str::slug(strtolower($doc->translate($item)->name)) }}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
        @foreach ($doc->Childs as $child)
        <url>
            <loc>{{route('documentation.child', [$doc->id, \Str::slug(strtolower($doc->translate(locale_lang())->name)),$child->id,\Str::slug(strtolower($child->translate(locale_lang())->title))])}}</loc>
            @foreach (languages() as $item)
            <xhtml:link rel="alternate" hreflang="{{$item}}" href="{{ url('/') }}/{{$item}}/documentation/{{ $doc->id }}/{{ \Str::slug(strtolower($doc->translate($item)->name)) }}/{{$child->id}}/{{\Str::slug(strtolower($child->translate($item)->title))}}"/>
            @endforeach
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
        @endforeach
    @endforeach
</urlset>
