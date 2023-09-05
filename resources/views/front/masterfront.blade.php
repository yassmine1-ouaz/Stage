<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from social.webestica.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 12:34:09 GMT -->

<head>
    <title>@yield('title')</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function(theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('Front/assets/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/flatpickr/dist/flatpickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/plyr/plyr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/vendor/zuck.js/dist/zuck.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('Front/assets/css/style.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
    </script>

</head>

<body>

    <!-- =======================
Header START -->
    @include('front.header')
    <!-- =======================
Header END -->

    <!-- **************** MAIN CONTENT START **************** -->

    @yield('content')

    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="{{asset('Front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Vendors -->
    <script src="{{asset('Front/assets/vendor/tiny-slider/dist/tiny-slider.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/plyr/plyr.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('Front/assets/vendor/zuck.js/dist/zuck.min.js')}}"></script>
    <script src="{{asset('Front/assets/js/zuck-stories.js')}}"></script>

    <!-- Theme Functions -->
    <script src="{{asset('Front/assets/js/functions.js')}}"></script>
    @yield('script')

</body>

<!-- Mirrored from social.webestica.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 12:34:35 GMT -->

</html>