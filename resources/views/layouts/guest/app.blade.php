<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.head')
</head>
<body class="index-page">

    @include('layouts.guest.header')

    <main class="main">
        @yield('content')
    </main>

    @include('layouts.guest.footer')
    @include('layouts.guest.scripts')

</body>
</html>
