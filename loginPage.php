<?php
if(isset($_COOKIE['account']))
{
    header("location:index.php");
}
class Account{
public $fname;
public $lname;
public $user;
function __construct($fname,$lname,$user)
{
    $this->fname=$fname;
    $this->lname=$lname;
    $this->user=$user;
}
}
if(isset($_POST['submit']))
{
   $conn = new mysqli("localhost", "root", "123456", "elecfinalproj");
   $sql = "select * from accounts where Username='" . $_POST["uname"] . "' and Password='" . $_POST["pass"]."'";
    $res = $conn->query($sql);
    if($res->num_rows>0)
    {
        $acc = $res->fetch_row();
        $acc = new Account($acc[0],$acc[1],$acc[2]);
        $acc = serialize($acc);
        setcookie("account",$acc);
        echo "<script>alert('Successful login');window.location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('No Accounts found')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta charset="ISO-8859-1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lab Act</title>
    </head>
    <body class="signPage">
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

                <form class="form-group" method="POST" action="loginPage.php">

                    <p>USERNAME<input class="form-control" type="text" name="uname" placeholder="Enter your Username..." required></p>
                    <p>PASSWORD<input class="form-control" type="password" name="pass" placeholder="Enter your Password..." required></p>
                    <p style="text-align: center"; class="text-decoration-none"><a href="createAcc.php">Don't have an Account?</a></p>
                    <input class="form-control btn btn-outline-warning" type="submit" name="submit" value="Login">
                 </form>
             </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </body>
</html>