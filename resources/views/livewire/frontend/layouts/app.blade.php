<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @yield('css') 
</head>
<body>
    <div>
        <header>
        </header>
        
            @yield('content') 
        
        <footer>
        </footer>

    </div>
    @livewireScripts
    @yield('js') 
</body>
</html>
