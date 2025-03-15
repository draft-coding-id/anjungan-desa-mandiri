<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
</head>

<body>

    <div class="header">
        <h2>
            @yield('header')
        </h2>
    </div>
    {{-- <div class="video-container">
        <p>Video Profil Desa</p>
        <!-- <video controls> <source src="video-profil-desa.mp4" type="video/mp4"> Replace with your video source Your browser does not support the video tag. </video>  -->
    </div> --}}
    <div class="page-content">
        @yield('content')
    </div>
    @yield('form-container')
    @yield('back-button')
    @yield('footer')
    <!-- <script> // Optional: Add any additional JavaScript functionality here
        document.querySelectorAll('.button').forEach(button => {
            button.addEventListener('click', function() {
                alert('Tombol ' + this.textContent + ' diklik!');
            });
        });
    </script>  -->
</body>

</html>
