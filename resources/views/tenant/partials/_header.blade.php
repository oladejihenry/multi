<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Penzest</title>
  <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('tenant/dashboard-asset/assets/css/rt-plugins.css')}}">
  <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
  <link rel="stylesheet" href="{{ asset('tenant/dashboard-asset/assets/css/app.css')}}">
  <!-- START : Theme Config js-->
  <script src="{{ asset('tenant/dashboard-asset/assets/js/settings.js')}}" sync></script>
  <!-- END : Theme Config js-->
</head>
<body class=" font-inter skin-default">
  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="left-column relative z-[1]">
        <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
          <a href="index.html">
            <img src="{{ asset('tenant/dashboard-asset/assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
            <img src="{{ asset('tenant/dashboard-asset/assets/images/logo/logo-white.svg')}}" alt="" class="mb-10 white_logo">
          </a>
          <h4>
            Unlock your Project
            <span class="text-slate-800 dark:text-slate-400 font-bold">
                            performance
                        </span>
          </h4>
        </div>
        <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
          <img src="{{ asset('tenant/dashboard-asset/assets/images/auth/ils1.svg')}}" alt="" class=" h-full w-full object-contain">
        </div>
      </div>
      <div class="right-column  relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <a href="index.html">
                <img src="{{ asset('tenant/dashboard-asset/assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
                <img src="{{ asset('tenant/dashboard-asset/assets/images/logo/logo-white.svg')}}" alt="" class="mb-10 white_logo">
              </a>
            </div>
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">Sign in</h4>
              <div class="text-slate-500 text-base">
                Sign in to your account to start using Dashcode
              </div>
            </div>
    <!-- Conent start --->
    @yield('body')
   
</body>