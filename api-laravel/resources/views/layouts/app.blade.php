<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.partials.theme-head', ['title' => config('app.name', 'MarketplaceTest').' | Painel'])
    </head>
    <body>
        @include('layouts.navigation')

        @if (isset($header))
            <section class="container page-shell pb-0">
                <div class="page-header-card">
                    {{ $header }}
                </div>
            </section>
        @endif

        <main class="container page-shell {{ isset($header) ? 'pt-4' : '' }}">
            {{ $slot }}
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
