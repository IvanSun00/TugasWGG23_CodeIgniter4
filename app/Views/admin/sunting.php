<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Sign Up</title>

    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');

*{
    font-family: 'poppins', sans-serif;
}

body{
   background-image: url("../../public/image/scene.jpg");
   /* Resize the background image to cover the entire container, even if it has to stretch the image or cut a little bit off one of the edges */
   background-size: cover; /*Cover:full vertical lalu jika width tidak mencukupi akan ngezoom */ /*Contain: gambar ke duplikat */
   background-attachment: fixed; /*fixed: gambar tetap tidak bergerak ; default:scroll ->gambar ikut bergerak*/
   background-repeat: no-repeat;

}

.box{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
    
    
    
  
}

.contain{
    background: rgba(0,0,0,0.2);
     border-radius:20px ;
    backdrop-filter: blur(5px);
    display: flex;
    flex-direction: column;
    width: 350px;
    padding: 17px 35px 40px ;
    box-shadow: 0px 0px 7px 3px  rgba(0,0,0,0.3);
}

#judul{
    color: white;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 0 0 ;
    margin-bottom: 0;

}

header{
    color: white;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0px;
}

.form-control{
    height: 45px;
    width: 87%;
    border: none;
    border-radius: 15px;
    color: white;
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255,255,255,0.1);

    
}

i{
    position: relative;
    top: -33px;
    left: 17px;
}

::-webkit-input-placeholder{
    color: #fff;
}

input:focus::placeholder{
    color:transparent;
}

.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;
    width: 100%;
    color: black;
    background-color: rgba(255,255,255,0.7);
    cursor:pointer;
    transition: .3s;
}

.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}


.two a{
    display: flex;
    justify-content: flex-start;
    color: #fff;
    font-size: small;
    margin-top: 10px;
    text-decoration: none;
    color: white;
}

.is-invalid{
    border: 1px solid rgb(220,20,60);
    
}

.is-invalid:hover{
    box-shadow: 0px 0px 3px 0px red;
}

.invalid-feedback{
    color:red;
    font-size: small;
    
}

    </style>


  </head>
  <body>
    
  <?php if(session()->has('msg_success')):?>
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Berhasil Mengubah',
            text: '<?=session()->getFlashdata('msg_success')?>',
            
            })
        </script>
                    
    <?php elseif(session()->has('msg_error')): ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Gagal Mengubah',
            text: '<?=session()->getFlashdata('msg_error')?>',
            
            })
        </script>
    
    <?php endif ?>
   
    <!-- <div class="d-flex w-100 vh-100 bg-dark text-white align-items-center justify-content-center">
        <h1>hai</h1>
       
    </div> -->
    <div class="box">
            <div class="contain">
                <div class="top-header">
                    <p id="judul">Sunting</p>
                    <header>Data Admin</header>
                </div>
                <?php

                    $error = session()->has('error_val');
                    $error_val = session()->getFlashdata('error_val');

                 
                ?>

                    <?php if(!$fetch_data): ?> 

                    <div class="alert alert-danger">
                        Data NRP tidak tersedia di dalam database
                    </div>


                    <?php else: ?>


                <?= form_open() ?>
                    
                   
                    <input type="text" name="Username" id=""  placeholder="Username" value="<?=old('Username')?? htmlspecialchars($fetch_data->username)?>" class="form-control<?=$error && !empty($error_val['Username']) ? ' is-invalid' : ''?>">
                    <i class='bx bx-user' ></i>
                    <?php if ($error && !empty($error_val['Username'])): ?>
                            <div class="invalid-feedback">
                                <?=$error_val['Username']?>
                            </div>
                        <?php endif ?>
                        <br>


                     <input type="text" name="Nrp" id=""  placeholder="NRP" value="<?= htmlspecialchars($fetch_data->nrp)?>" disabled class="form-control<?=$error && !empty($error_val['Nrp']) ? ' is-invalid' : ''?>" >
                     <i class='bx bx-id-card'></i>
                     <?php if ($error && !empty($error_val['Nrp'])): ?>    
                            <div class="invalid-feedback">
                                <?=$error_val['Nrp']?>
                            </div>
                        <?php endif ?>
                        <br>

                    <input type="email" name="Email" id=""  placeholder="Email" value="<?=old('Email')?? htmlspecialchars($fetch_data->email)?>" class="form-control<?=$error && !empty($error_val['Email']) ? ' is-invalid' : ''?>">
                    <i class='bx bx-envelope' ></i>
                    <?php if ($error && !empty($error_val['Email'])): ?>
                        <div class="invalid-feedback">
                            <?=$error_val['Email']?>
                        </div>
                    <?php endif ?>
                    <br>
                    
                    <input type="password" name="Password" id=""  placeholder="Password" value="<?=old('Password')?>"class="form-control<?=$error && !empty($error_val['Password']) ? ' is-invalid' : ''?>">
                    <i class='bx bx-lock-alt'></i>     
                    <?php if ($error && !empty($error_val['Password'])): ?>
                            <div class="invalid-feedback">
                                <?=$error_val['Password']?>
                            </div>
                        <?php endif ?>
                        <br>
                        
                        <input type="hidden" name="_method" value="PUT">
                  
                    <button name="submit" class="submit" value="ya">tambah</button>
                    <div class="two">
                            <label><a href="<?=site_url("/admin")?>">&lt;&lt; back </a></label>
                        </div>


                <!-- </form> -->
                <?= form_close() ?>

                <?php endif ?>

               
            </div>
        
        </div>
   
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
  </body>
</html>