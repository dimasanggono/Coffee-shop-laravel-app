 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>kopi shop</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
     ">
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

     <!-- Google Font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;600&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="{{url('frontend/styles/main.css')}}">

 </head>

 <body>
     <div class="container">
         <nav class="navbar navbar-expand-lg fixed-top navbar-fixed-top">
             <div class="container">
                 <a class="navbar-brand" href="#"><img src="{{url('frontend/images/logo 2.png')}}" alt="" width="100px"></a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#product">Products</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#">Contact</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ request()->is('register') ? route('login') : route('register') }}">
                                 {{ request()->is('register') ? 'Sign In' : 'Sign Up' }}
                             </a>
                         </li>
                     </ul>
                 </div>
         </nav>
     </div>

     <main>
         @yield('content')
     </main>
     <div class="container">
         <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
             <div class="col-md-4 d-flex align-items-center">
                 <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                     <img src="{{url('frontend/images/logo 2.png')}}" alt="" width="50px">
                 </a>
                 <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Liberated, Inc</span>
             </div>

             <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                 <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                 <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                 <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
             </ul>
         </footer>
     </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- Isotope Filter -->
     <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
     "></script>
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

     <script src="{{url('frontend/library/js/main.js')}}"></script>

     <script>
         AOS.init();
     </script>
 </body>

 </html>