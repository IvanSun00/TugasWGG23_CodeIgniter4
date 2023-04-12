<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title><?=$title?></title>




  </head>
  <body>
  <h2>Sunting Kelas</h2>
        <div class="box">
            <div class="container">
            <?php

                $error = session()->has('error_val');
                $error_val = session()->getFlashdata('error_val');

                if (session()->has('msg_success'))
                echo '<div class="alert alert-success">'.session()->getFlashdata('msg_success').'</div>';

                ?>
                <!-- kalo data kosong => null maka output tidak tersedia -->
                 <?php if(!$fetch_data): ?> 

                    <div class="alert alert-danger">
                        Data NRP tidak tersedia di dalam database
                    </div>
                

               <?php else: ?>
                <form method="post">
                   
                    <input type="text" name="Username" id=""  placeholder="Username" value="<?=old('Username') ?? htmlspecialchars($fetch_data->username) ?>" class="form-control<?=$error && !empty($error_val['Username']) ? ' is-invalid' : ''?>">
                        <?php if ($error && !empty($error_val['Username'])): ?>
                            <div class="invalid-feedback">
                                <?=$error_val['Username']?>
                            </div>
                        <?php endif ?>
                        <br>


                     <input type="text" name="Nrp" id=""  placeholder="NRP" value="<?=htmlspecialchars($fetch_data->nrp)?>" disabled class="form-control<?=$error && !empty($error_val['Nrp']) ? ' is-invalid' : ''?>" >
                        <?php if ($error && !empty($error_val['Nrp'])): ?>    
                            <div class="invalid-feedback">
                                <?=$error_val['Nrp']?>
                            </div>
                        <?php endif ?>
                        <br>

                    

                    <input type="email" name="Email" id=""  placeholder="Email" value="<?=old('Email')?? htmlspecialchars($fetch_data->email)?>" class="form-control<?=$error && !empty($error_val['Email']) ? ' is-invalid' : ''?>">
                    <?php if ($error && !empty($error_val['Email'])): ?>
                        <div class="invalid-feedback">
                            <?=$error_val['Email']?>
                        </div>
                    <?php endif ?>
                    <br>
                    
                    <input type="password" name="Password" id=""  placeholder="Password" value="<?=htmlspecialchars($fetch_data->password)?>" disabled class="form-control<?=$error && !empty($error_val['Password']) ? ' is-invalid' : ''?>">
                        <?php if ($error && !empty($error_val['Password'])): ?>
                            <div class="invalid-feedback">
                                <?=$error_val['Password']?>
                            </div>
                        <?php endif ?>
                        <br>
                  
                        <input type="hidden" name="_method" value="PUT">
                    <button name="submit" value="ya">sunting</button>



                </form>

                        <?php endif ?>
            </div>
        
        </div>
   
        
  </body>
</html>