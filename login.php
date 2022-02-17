<?php 
include 'koneksi.php';
if(isset($_POST['login'])){
$username           =$_POST['username'];
$password           =$_POST['password'];


$cek=mysql_query("select * from tb_pemesan where username='$username' and password='$password' ") or die(mysql_error());

$hasil= mysql_num_rows($cek);

$data=mysql_fetch_array($cek);

if ($hasil>0){
    session_start();
    $_SESSION[username]=$data[username];
    $_SESSION[password]=$data[password];
    $_SESSION[id_pemesan]=$data[id_pemesan];
    header('location:index_pelanggan.php');
}else{
    echo "<script>alert('maaf gagal login')</script>";
}

  }  
 ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>TA | AMIKI</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="clog/css/normalize.css">

    
        <link rel="stylesheet" href="clog/css/style.css">

    
    
    
  </head>

  <body>

    <div class="form">
      
      
      
      <div class="tab-content">
        <div id="signup">   
          <h1>LOGIN</h1>
          
          <form action="" method="post">
          <div class="field-wrap">
            <label>
            </label>
            <input  name="username" placeholder="username" type="Text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
            </label>
            <input type="password"required name="password" placeholder="password" autocomplete="off"/>
          </div>
          
          <button name="login" type="submit" class="button button-block"/>Masuk</button>
          
          </form>

        </div>
        
          <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="POST">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button name="login" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="clog/js/index.js"></script>

    
    
    
  </body>
</html>
