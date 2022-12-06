<?php

if(isset($_POST['submit']))
{
    session_start();
    $_SESSION['uname'] = htmlentities($_POST['uname']);
    $_SESSION['password'] = htmlentities($_POST['password']);
    header('Location: homepage.php');
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
    <head>
    <meta charset="ISO-8859-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Lab Act</title>
    </head>
    <body class="">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">

                 <div class="text-center">
                    <br>
                  <img class="img-fluid" alt="Responsive image" src="vroomlogo.png">
            
                  </div>

            </div>

        </div>
        <br>
        <div class="row justify-content-center">

            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 signIn">

                <form class="form-group" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <p>USERNAME<input class="form-control" type="text" name="uname" placeholder="Enter your Username..." required></p>
                    <p>PASSWORD<input class="form-control" type="password" name="pass" placeholder="Enter your Password..." required></p>
                    <br>
                    <input class="form-control btn btn-outline-warning" type="submit" name="submit" value="Login">
                 </form>
             </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </body>
</html>