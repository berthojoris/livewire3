<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ?? env('APP_NAME') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />

		@vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        <x-navigation-menu/>
        <div class="container mt-5">
			{{ $slot }}
        </div>
        <script src="{{ asset('template/js/scripts.js') }}"></script>
    </body>
</html>
