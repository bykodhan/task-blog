<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('back/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('back/assets/css/style.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('back.layouts.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('back.layouts.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('back/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ Session::get('error') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <script>
        function slugifyTurkish(text) {
            const turkishChars = {
                'ı': 'i',
                'I': 'i',
                'ş': 's',
                'Ş': 's',
                'ğ': 'g',
                'Ğ': 'g',
                'ü': 'u',
                'Ü': 'u',
                'ö': 'o',
                'Ö': 'o',
                'ç': 'c',
                'Ç': 'c',
                ' ': '-',
                '_': '-',
            };

            return text.replace(/[ıIşŞğĞüÜöÖçÇ\s_]/g, (match) => turkishChars[match] || '');
        }

        function updateSlug(inputValue, slugInputID) {
            const metin = inputValue;
            const slugInput = document.getElementById(slugInputID);

            const slug = slugifyTurkish(metin);

            slugInput.value = slug;
        }
    </script>
</body>

</html>
