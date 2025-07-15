<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon Apiti</title>
    <link rel="stylesheet" href="./style.css">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- bootstrap link -->
     <style>
        .snack-card{
            border-top-left-radius: 40%;
        }
     </style>
</head>

    <!-- navbar start -->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="./img pj/sticker-chef-cuisine-cook-wall-bon-apetit-4c773f87bd0369fcb953c826ee8888f2.png" alt="Logo" width="80" height="50" class="d-inline-block align-text-top"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.html">Home</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Burmese Snacks
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./item1mlyp.html">Mont Lone Yay Paw</a></li>
                  <li><a class="dropdown-item" href="./item2mlk.html">Mont Let Kauk</a></li>
                  <li><a class="dropdown-item" href="./item3montph.html">Mont Phet Htok</a></li>
                  <li><a class="dropdown-item" href="./item4montlmy.html">Mont  Lin Mayar</a></li>
                  <li><a class="dropdown-item" href="./item5tharky.html">Thar Khway Yai</a></li>
                  <li><a class="dropdown-item" href="./item6montkwelt.html">Mont Kwel thae</a></li>
                  <li><a class="dropdown-item" href="./item7shwehm.html">Shwe Tha Min</a></li>
                  <li><a class="dropdown-item" href="./item8montptl.html">Mont Pyar Tha Let</a></li>
                  <li><a class="dropdown-item" href="./item9mthinechone.html">Mont  Thine Chone</a></li>
                  <li><a class="dropdown-item" href="./item10mlatsaung.html">Mont Lat Saung</a></li>
                  <li><a class="dropdown-item" href="./item11montpong.html">Mont Pong</a></li>
                  <li><a class="dropdown-item" href="./item12thargusain.html">Thar Gu Sain</a></li>
                  <li><a class="dropdown-item" href="./item13monton.html">Mont Ohm Nout</a></li>
                  <li><a class="dropdown-item" href="./item14pyaryeeh.html">Pyar Yee Htoke</a></li>
                  <li><a class="dropdown-item" href="./item15koutnkh.html">Kout Nyin Kyi Htout</a></li>
                  <li><a class="dropdown-item" href="./item16htanntm.html">Htanthi Mont</a></li>
                  <li><a class="dropdown-item" href="./item17kconlk.html">Kaanhcwannu Nham Lone Kyaw</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./userlogin.html">Log In</a>
              </li>
            </ul>
            <form class="d-flex mr-5" role="search">
                <spam class="bg-white d-flex spam-search">
                  <input class="form-control me-2 text-dark" type="search" placeholder="search" aria-label="Search"/><i class="bi bi-search text-dark fs-4"></i>
                </spam>
                </form>
                <a href="./adminlogin.html"> <i class="bi bi-person-circle fs-2 text-black"></i></a>
          </div>
        </div>
      </nav>

 <!-- navbar end -->

 <!-- user login form -->
 <section class="login-section">
    <div class="login-container">
        <!-- Image Section (Left side on larger screens, top on smaller screens) -->
        <div class="image-section">
            <img src="./user login pg.png" alt="" width="100%" height="100%">
        </div>

        <!-- Form Section (Right side on larger screens, bottom on smaller screens) -->
        <div class="form-section">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Log in Form</h2>
            <hr class="mb-6 mx-auto w-24 border-blue-500 border-2 rounded-full">

            <form>
                <div class="mb-4">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="name" placeholder="your name ......">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" placeholder="your email .....">
                </div>
                <div class="mb-6">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" id="password" placeholder="your password _">
                </div>
                <div class="mb-6">
                  <label for="phone" class="form-label">Phone-No :</label>
                  <input type="phone" class="form-control" id="phone" placeholder="your ph-num..">
              </div>
                <div class="link-text mb-4">
                    If you want an account, need to <a href="resgi.html">Registration first</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>

 <!-- footer section start -->
 <footer class="text-dark py-5 footer-bg mt-5">
    <div class="container px-4">
     <div class="row">
       <div class="col col-lg-4">
        <img src="./img pj/sticker-chef-cuisine-cook-wall-bon-apetit-4c773f87bd0369fcb953c826ee8888f2.png" alt="" width="100px" height="90px" class="mt-5">
       </div>
       <div class="col">
          <h4 class="fw-bold pt-3">Help</h4>
          <hr>
          <ul class="list-unstyled">
           <li><a href="#" class="text-decoration-none text-dark"><i class="bi bi-person-badge-fill fs-3"></i>About Us</a></li>
           <li><a href="#" class="text-decoration-none text-dark"> <i class="bi bi-house-gear-fill fs-3"></i>Home</a></li>
           <li><a href="#" class="text-decoration-none text-dark"><i class="bi bi-people-fill fs-3"></i>Teams</a></li>
           
          </ul>
       </div>
      
       <div class="col">
         <h4 class="fw-bold pt-3">Contact Us</h4>
         <hr>
         <ul class="list-unstyled">
           <li><a href="#" class="text-decoration-none text-dark"><i class="bi bi-telephone-inbound-fill fs-3"></i>09-963-563-693</a></li>
           <li><a href="#" class="text-decoration-none text-dark"><i class="bi bi-mailbox2 fs-3"></i>myatchue25@gmail.com</a></li>
           
          </ul>
       </div>
       <div class="col col-lg-3 text-lg-end">
         <h4 class="fw-bold pt-3">Social links</h4>
         <hr>
         <div>
         <a href="#" class="text-decoration-none text-dark fs-2 me-3"><i class="bi bi-instagram"></i></a>
         <a href="#" class="text-decoration-none text-dark fs-2 me-3"><i class="bi bi-facebook"></i></a>
         <a href="#" class="text-decoration-none text-dark fs-2 me-3"><i class="bi bi-tiktok"></i></a>
       </div>
       </div>
     </div>
     
    </div>
   </footer>


 <!-- footer section end -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>   