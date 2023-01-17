
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Ecommerce-@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/cute-alert/style.css') }}" />
    <style>
      /*CUSTOM PRELOADER*/
      .loader-bg {
          position: fixed;
          z-index: 1;
          background: #ffffffd4;
          width: 100%;
          height: 100%;
      }

      .loader-p {
          border: 0 solid transparent;
          border-radius: 50%;
          width: 150px;
          height: 150px;
          position: absolute;
          top: calc(50vh - 75px);
          left: calc(50vw - 75px);
      }

      .loader-p:before,
      .loader-p:after {
          content: '';
          border: 1em solid #009688;
          border-radius: 50%;
          width: inherit;
          height: inherit;
          position: absolute;
          top: 0;
          left: 0;
          animation: loader 2s linear infinite;
          opacity: 0;
      }

      .loader-p:before {
          animation-delay: 0.5s;
      }

      @keyframes loader {
          0% {
              transform: scale(0);
              opacity: 0;
          }

          50% {
              opacity: 1;
          }

          100% {
              transform: scale(1);
              opacity: 0;
          }
      }

      /*end of custom preloader*/
      .help-block{
          font-size: 12px;
          color: red;
      }
  </style>
    @stack('css')
  </head>