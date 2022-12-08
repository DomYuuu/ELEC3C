<?php
if(isset($_COOKIE['account']))
{
    header("location:index.php");
}
?>
<html>
    <head>
        <title>Map Test</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
        <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    </head>
    <body>

        <nav class="navbar navbar-expand-xl navbar-light bg-warning">
            <a class="navbar-brand px-4 fs-1" href="#">VROOM</a>
              
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-lable="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                  <ul class="navbar-nav ms-auto text-center px-4">
                      
                      <li class="nav-item">
                          <a href="index.php"><button class="btn btn-danger">Cancel</button></a>
                      </li>
                      
                  </ul>
                </div>
            </nav>


        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="formDesign">
                        <h1><b>Create an Account</b></h1>
                        <h4>Enter Details</h4>
                        <form action="createAcc.php" method="post">
                            <p>Username:<input class="form-control" name="user" type="text" required></p>
                            <p>First Name<input class="form-control" name="fname" type="text" required></p>
                            <p>Last Name<input class="form-control" name="lname" type="text" required></p>
                            <p>Password<input class="form-control" name="pw" type="password" required></p>
                            <p><button class="btn btn-warning" name="submit" type="submit">Create</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
    if(isset($_POST["user"]))
    {
        $conn = new mysqli("localhost", "root", "123456", "elecfinalproj");
        $sql = "insert into accounts values('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['user']. "','" . $_POST['pw']. "')";
        try{
            if($conn->query($sql)===TRUE)
            {
            echo "<script>alert('success!');window.location.href='index.php'</script>";    
            
            }
        else
            echo "<script>alert('Username is already taken!')</script>";    
        }
        catch(Exception $e)
        {
            echo "<script>alert('Username is already taken!')</script>";    
        }
        
    }
    
?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
