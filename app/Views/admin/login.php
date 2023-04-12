<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?=$title?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');

*{
    font-family: 'poppins', sans-serif;
}

body{
   background-image: url('public/image/scene.jpg');
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

.container{
   background: rgba(0,0,0,0.2);
   border-radius:20px ;
    backdrop-filter: blur(5px);
    display: flex;
    flex-direction: column;
    width: 350px;
    padding: 40px 35px ;
    box-shadow: 0px 0px 7px 3px  rgba(0,0,0,0.3);
}

#ishave{
    color: white;
    /* font-size: small; */
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0 ;

}

header{
    color: white;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0px;
}

.log .input{
    height: 45px;
    width: 87%;
    border: none;
    border-radius: 30px;
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

.masuk{
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

.masuk:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}

.two-col{
    display: flex;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
    
}

.one{
    display: flex;
}

.two a {
    text-decoration: none;
    color: white;
}


.SignUp{
    color: white ;
    font-size: small;
    display: table;
    margin: 25px auto 0;
}

.SignUp a{
    color: white;
}
    </style>
  </head>
  <body>
   


    <?php if(session()->has('msg_success')):?>
        <!-- yg sukses ga kepakek soalnya langsung redirect ke home -->
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: '<?=session()->getFlashdata('msg_success')?>',
            
            })
        </script>
                    
    <?php elseif(session()->has('msg_error')): ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '<?=session()->getFlashdata('msg_error')?>',
            
            })
        </script>
    
    <?php endif ?>

        <div class="box">
            <div class="container">
                <div class="top-header">
                    <span id= "ishave">Have an Account? </span>
                    <header>Login</header>
              
                
                    
                
                <form method="post" class="log">
                    
                        <input type="text" name="Nrp" id="" class="input"  value = "<?=old('Nrp')?>" placeholder="NRP" >
                        <i class='bx bx-user' ></i>

                    
                        <input type="password" name="Password" id="" class="input" value = "<?=old('Password')?>" placeholder="Password" >
                        <i class='bx bx-lock-alt'></i>
                    
                        <button class="masuk" name="login" value='ya'>Login</button>
                    


                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" name="" id="check">
                            <label for="check">Remember Me</label>
                        </div>

                        <div class="two">
                            <label><a href="#">Forgot password?</a></label>
                        </div>
                    </div>

                    <div class="SignUp">
                        <label>Don't have an account? <a href="<?=site_url('admin/signUp')?>" >Create new</a></label>
                    </div>


                </form>

               
            </div>
        
        </div>
   
        
  </body>
</html>