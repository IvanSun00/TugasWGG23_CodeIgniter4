<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?=$title?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        .top{
            width: 100%;
            height: 100vh;
            background: url("public/image/mountain.jpg");
            background-size: cover;
            background-position: center;
            
            filter: blur(2px) brightness(0.9);
            position: fixed;
            z-index: -1;
        
            

        }
        .navbar-scrolled{
            background-color: rgba(43,43,43,1); 
            box-shadow: 0 3px 10px rgba(43,43,43,0.7);
        }
        main{
            display: flex;
            justify-content: center;

            /* min-height: 100vh; */
            /* background-color:red; */
            padding: 100px;
         
        }

        .tb{
            background-color: aliceblue;
            width: 80vw;

            padding: 30px 20px ;
        }

        
        

    </style>

</head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-scrolled fs-5 fixed-top ">
        <div class="container-fluid">
        <a class="navbar-brand ms-2" href="./home.html">Navbar</a>
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
    <section class="top">
        
    </section>
    <main class="">
               

            <div class="tb" >

                <?php if(session()->has('delete_success')):?>

                    <script>
                        Swal.fire({
                        icon: 'success',
                        title: 'Hapus Berhasil',
                        text: '<?=session()->getFlashdata('delete_success')?>',
                        
                        })
                    </script>

                    
                
                <?php elseif(session()->has('delete_error')): ?>
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Hapus Gagal',
                        text: '<?=session()->getFlashdata('delete_error')?>',
                        
                        })
                    </script>
                    
                
                <?php endif ?>

                <table id="example" >
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>NRP</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php
                            foreach($data_admin as $admin):
                            ?>

                            <tr>
                                <!-- $admin['username'] ini kalo type data array -->
                                <td><?=htmlspecialchars($admin->username)?> </td> 
                                <td><?=htmlspecialchars($admin->nrp)?> </td>
                                <td><?=htmlspecialchars($admin->email)?> </td>
                                <td>
                                    <form action="admin/hapus" method='post'>
                                    <input type="hidden" name="nrp_delete" value="<?=htmlspecialchars($admin->nrp)?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    
                                    <a href="<?=site_url('admin/sunting/'.$admin->nrp)?>" class="btn btn-secondary btn-sm">Edit</a> 
                                        <button name="submit" value="ya" class="btn btn-danger btn-sm">Hapus</button> 
                                    </form>
                                 </td>
                            </tr>


                            <?php endforeach ?>
                        
                    </tbody>
                    
                </table>

            </div>
           

       
        
        
    </main>



    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  </body>
</html>