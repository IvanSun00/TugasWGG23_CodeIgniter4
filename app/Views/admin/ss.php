<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleUp.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <title>Sign Up</title>

    



  </head>
  <body>
   
    <!-- <div class="d-flex w-100 vh-100 bg-dark text-white align-items-center justify-content-center">
        <h1>hai</h1>
       
    </div> -->
        <div class="box">
            <div class="container">
                <div class="top-header">
                    <span>Sign Up</span>
                    <header>Data Pendaftar</header>
                </div>
                <?php

$error = session()->has('error_val');
$error_val = session()->getFlashdata('error_val');

if (session()->has('msg_success'))
echo '<div class="alert alert-success">'.session()->getFlashdata('msg_success').'</div>';

?>
<!-- <form method="post"> -->
<?= form_open() ?>


<input type="text" name="Username" id=""  placeholder="Username" value="<?=old('Username')?>" class="form-control<?=$error && !empty($error_val['Username']) ? ' is-invalid' : ''?>">
    <?php if ($error && !empty($error_val['Username'])): ?>
        <div class="invalid-feedback">
            <?=$error_val['Username']?>
        </div>
    <?php endif ?>
    <br>


 <input type="text" name="Nrp" id=""  placeholder="NRP" value="<?=old('Nrp')?>"class="form-control<?=$error && !empty($error_val['Nrp']) ? ' is-invalid' : ''?>" >
    <?php if ($error && !empty($error_val['Nrp'])): ?>    
        <div class="invalid-feedback">
            <?=$error_val['Nrp']?>
        </div>
    <?php endif ?>
    <br>

<input type="text" name="Nilai" id="" value="<?=old('Nilai')?>" placeholder="Nilai" class="form-control<?=$error && !empty($error_val['Nilai']) ? ' is-invalid' : ''?>"> 
    <?php if ($error && !empty($error_val['Nilai'])): ?> 
        <div class="invalid-feedback">
            <?=$error_val['Nilai']?>
        </div>
    <?php endif ?>
    <br>

<input type="email" name="Email" id=""  placeholder="Email" value="<?=old('Email')?>" class="form-control<?=$error && !empty($error_val['Email']) ? ' is-invalid' : ''?>">
<?php if ($error && !empty($error_val['Email'])): ?>
    <div class="invalid-feedback">
        <?=$error_val['Email']?>
    </div>
<?php endif ?>
<br>

<input type="password" name="Password" id=""  placeholder="Password" value="<?=old('Password')?>"class="form-control<?=$error && !empty($error_val['Password']) ? ' is-invalid' : ''?>">
    <?php if ($error && !empty($error_val['Password'])): ?>
        <div class="invalid-feedback">
            <?=$error_val['Password']?>
        </div>
    <?php endif ?>
    <br>

<button name="submit" value="ya">tambah</button>



<!-- </form> -->
<?= form_close() ?>

            

               
            </div>
        
        </div>
   
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
  </body>
</html>