<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    

    @include('includes.meta')

    @include('includes.style')

    @include('includes.alert')
</head>
<body>
    <div id="app">

        @include('includes.navbar')

        <main class="">
            @yield('content')
        </main>
        
    </div>

    @include('includes.script')

</body>
</html>
