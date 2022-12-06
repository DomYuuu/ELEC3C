<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>Lab Act</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-xl navbar-light bg-warning">
    <a class="navbar-brand px-4 fs-1" href="index.php">VROOM</a>
      
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-lable="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav ms-auto text-center px-4">
              
              <li class="nav-item">
                  <a class="nav-link" href="index.php">HOME</a>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link" href="aboutUs.php">ABOUT US</a>
              </li>
              
          </ul>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-sm-2 col-md-2 col-lg-3 col-xl-8">

                 <div class="text-center">
                  <img class="img-fluid" alt="Responsive image" width="350px" height="350px" src="vroomlogo.png">
            
                  </div>

            </div>

        </div>
        <br>
        <div class="row justify-content-center">

            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 signIn">

                <form class="form-group" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <p>USERNAME<input class="form-control" type="text" name="uname" placeholder="Enter your Username..." required></p>
                    <p>PASSWORD<input class="form-control" type="password" name="pass" placeholder="Enter your Password..." required></p>
                    <p style="text-align: center"; class="text-decoration-none"><a href="createAcc.php">Don't have an Account?</a></p>
                    <input class="form-control btn btn-outline-warning" type="submit" name="submit" value="Login">
                 </form>
             </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
    </body>
</html>
<?php

if(isset($_POST['submit']))
{
    session_start();
    $_SESSION['uname'] = htmlentities($_POST['uname']);
    $_SESSION['password'] = htmlentities($_POST['password']);
    header('Location: index.php');
}
?>