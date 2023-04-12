<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        body{
          
            overflow-x:hidden ;
        }
        .bg-image{
            height: 100vh;
            width: 100vw;
            object-fit: cover;
            filter: brightness(0.9);
            /* absolute membuat image keluar dari flow (dianggap tidak exist)*/
           /* position: absolute;
            top: 0; 
            left: 0;
            right: 0; */
            z-index: -1;
            
        }
        
        .navbar{
            transition: all 0.5s ;
        }
        .navbar-scrolled{
            background-color: rgba(43,43,43,1); 
            box-shadow: 0 3px 10px rgba(43,43,43,0.7);
        }

        
        footer a{
            color:white;
        }
        .social a{
            padding: 5px;
        }

        .second-footer{
            border-top:1px solid #444 ;
            
        }



    </style>
</head>
<body>
    
        <img src="public/image/mountain.jpg" alt="bg-image" class="bg-image">
        
   
        <?php if(session()->has('login_success')):?>
                    <script>
                        Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: '<?=session()->getFlashdata('login_success')?>',
                        
                        })
                    </script>
                                
                <?php endif ?>

<!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark fs-5 fixed-top ">
        <div class="container-fluid">
        <a class="navbar-brand ms-2" href="<?=site_url("home")?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=site_url("home")?>">Home</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">About-us</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url("admin")?>">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url("login")?>">Log Out</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    

      <!-- <p>dada</p>
      <div style="background-color: red;" class="c">
        <p>haiadsfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</p>
    </div> -->
    


    <div class="container-fluid py-3" style="background-color: beige;">
        <div class="card">
            <div class="card-body">
                Content
            </div>
          </div>
       
    </div>


    <footer class="bg-dark pt-5 pb-4 ">
        <div class="container text-light">
            <div class="row pb-5">
                <div class="col-12 col-md-6">
                    <h3>Christophorus Ivan Sunjaya</h3>
                    <p>Mahasiswa Informatika UK Petra angkatan 2022</p>
                </div>

                <div class="col-12 col-md-6 social">
                    <p>Connect with me</p>
                    <a href=""> <i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href=""> <i class="fab fa-twitter fa-lg"></i></a>
                    <a href=""> <i class="fab fa-instagram fa-lg"></i></a>
                    <a href=""> <i class="fab fa-youtube fa-lg"></i></a>
                    <a href=""> <i class="fab fa-github fa-lg"></i></a>
                    <a href=""> <i class="fab fa-linkedin-in fa-lg"></i></a>
                </div>


               
            </div>

            <div class="row">
                <div class="col-12 second-footer text-center pt-4 ">
                    <p>&copy; Copyright 2023. Made by <a href="" target="_parent">Ivan Sunjaya</a></p>
                </div>
            </div>


            
            
        </div>

       
    </footer>
   

<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>
    $(function(){
        $(window).scroll(function(e) {
            if ($(document).scrollTop() > 60) {
             $("nav").addClass("navbar-scrolled");
            } else {
             $("nav").removeClass("navbar-scrolled");
             
            }
        });


    })
       
    
</script>
</body>
</html>