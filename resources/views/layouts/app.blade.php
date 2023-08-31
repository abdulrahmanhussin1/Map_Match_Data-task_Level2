<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')


</body>

</html>
