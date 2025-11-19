<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="index-page">

    @include('layouts.header')

    <main class="main">
        @yield('content')
    </main>

    @include('layouts.footer')
    @include('layouts.scripts')

</body>
</html>
