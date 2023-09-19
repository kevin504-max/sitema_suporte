<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        {{-- Font Awesome --}}
        <link  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    </head>
    <body class="antialiased">
        

        @yield('modals')

        {{-- Scripts --}}
        <script src="{{ asset('frontend/js/jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        @if (session("status"))
            <script>
                Swal.fire({
                    title: "{{ session("message") }}",
                    icon: "{{ session("status") }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        @yield('scripts')
    </body>
</html>
