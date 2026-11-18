@extends('layouts.app')

@section('title', 'Yukafii | Creative Web Developer')

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.work')
    @include('partials.stack')
    @include('partials.contact')

    @php
        $clientProjects = array_map(function (array $project) {
            return [
                'number' => $project['number'],
                'slug' => $project['slug'],
                'title' => $project['title'],
                'type' => $project['type'],
                'category' => $project['category'],
                'summary' => $project['summary'],
                'image_url' => asset($project['image']),
                'alt' => $project['alt'],
                'url' => $project['url'],
                'cta' => $project['cta'],
                'stack' => $project['stack'],
            ];
        }, $projects);
    @endphp

    <script id="portfolio-projects-data" type="application/json">
        {!! json_encode($clientProjects, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection
