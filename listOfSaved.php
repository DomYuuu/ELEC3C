<?php
if(!isset($_COOKIE['account']))
{
    header("location:index.php");
}

?>
<html>
<script src="https://kit.fontawesome.com/4505ce12d2.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/4505ce12d2.js" crossorigin="anonymous"></script>
    <head>
        <title>List</title>
    </head>
    <body>
        <div class="main-container d-flex">
            <div class="sidebar" id="sidenav">
                <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
                    <h1 class="fs-2">VROOM</h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
                </div>
                <ul class="list-unstyled px-2">
                    <li ><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-house"></i> Home</a></li>
                    <li><a href="aboutUs.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-circle-info"></i> About Us</a></li>
                    <li><a href="listOfSaved.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-list"></i> List</a></li>

                </ul>
                <hr class="h-color mx-2">
                <ul class="unstyled-list px-2">
                    <li><a href="index.php?logout=true" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </div>
        </div>
       
        <div class="container mt-5">
            <div class="row justify-content-center">
                <h1><b>Saved Routes</b></h1>
                <div class="col-sm-10">
                    <div class="formDesign">
                        <table>
                        <?php 
                        interface getRoutes{
                            public function getAllRoutes();
                        }
         class Account implements getRoutes{
            public $fname;
            public $lname;
            public $user;
            function __construct($fname,$lname,$user)
            {
                $this->fname=$fname;
                $this->lname=$lname;
                $this->user=$user;
            }
            function getAllRoutes()
            {
                $conn = new mysqli("localhost", "root", "123456", "elecfinalproj");
                $sql = "select * from routes where Username='$this->user'";
                $res = $conn->query($sql);
                $rows= $res->fetch_all();
                return $rows;
            }
        }
            $acc = unserialize($_COOKIE["account"]);
            $routes = $acc->getAllRoutes();
        ?>
                            <ul>
                                <?php
                                        foreach($routes as $x)
                                        {
                                            echo "<li>$x[0] <i class='fa-solid fa-arrow-right'></i> $x[1] | Distance = $x[2] KM| Cost: $x[3] PHP</li>";
                                        }
                                ?>
                                
                            </ul>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>