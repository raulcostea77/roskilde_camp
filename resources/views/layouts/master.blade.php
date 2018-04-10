<!DOCTYPE html>
 <html class="no-js">
     <head>
         <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <title>Laravel + Foundation Boilerplate</title>
 
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="theme-color" content="#F74902">
         <meta name="msapplication-navbutton-color" content="#F74902">
         <meta name="mobile-web-app-capable" content="yes">
         <meta name="apple-mobile-web-app-capable" content="yes">
         <meta name="apple-mobile-web-app-status-bar-style" content="#F74902">
         @yield('meta')
 
         @yield('styles')
         <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
          
     </head>
 
     <body>
 
         @yield('content')
         
         @yield('before-scripts')
         
         <script src="{{asset('js/app.js')}}"></script>
         {{-- <script> $(document).foundation();</script> --}}

         @yield('after-scripts')
         
     </body>
 </html>
