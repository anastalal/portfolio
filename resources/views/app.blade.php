<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="Anas Talal - Full Stack Developer with a strong foundation in computer science and hands-on experience in both front-end and back-end development. "/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        @if(isset($page['props']['aboutMe']))
        <meta property="og:title" content="{{ isset($page['props']['aboutMe']['seo_title']) ? $page['props']['aboutMe']['seo_title'] : '' }}" />
        <meta property="og:description" content="{{ (isset($page['props']['aboutMe']['seo_description'])) ? $page['props']['aboutMe']['seo_description'] : '' }}"/>
        <meta property="og:image" content="{{  (isset($page['props']['aboutMe']['open_graph_image'])) ? ($page['props']['aboutMe']['open_graph_image']) : '' }}"/>
        @endif
    </head>
    <body class="font-sans antialiased">
        @inertia
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
