<?php 
if(isset($_GET["logout"]))
{
  setcookie("account",'',time()-3600,"/ELEC3C");
  echo "<script>alert('success');window.location.href='index.php'</script>";

}
?>
<html>
    <head>
        <title>Map</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
        <script src="https://kit.fontawesome.com/4505ce12d2.js" crossorigin="anonymous"></script>
        <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    </head>
    <body>

    <nav class="navbar navbar-expand-xl navbar-light bg-warning">
    <a class="navbar-brand px-4 fs-1" href="index.php" id = "banner">VROOM</a>
      
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

              <li class="nav-item hide" hidden>
                  <a class="nav-link" href="listOfSaved.php">LIST</a>
              </li>

              <li class="nav-item unhide">
                  <a class="nav-link" href="loginPage.php">SIGN IN</a>
              </li>
              
              <li class="nav-item hide" hidden>
                  <a href="index.php?logout=true"><button class="btn btn-outline-danger">Logout</button></a>
              </li>
              
          </ul>
        </div>
    </nav>

    <div id="map" style="width: 100%; height: 530px;"></div>


    <div class="container mt-5 mb-5">
      <div class="formDesign calcuForm">
      <div class="row justify-content-center">
        
          <div class="col-sm-6 text-center">
            <h3>From</h3>
            <p>E.G. Street: Padre Noval St City: Manila</p>
            <p>Name of Street: <input class="inputBoxMain" id="street"></p> 
            <p>City: <input class="inputBoxMain" id="city"></p>
          </div>

          <div style="border-left:1px solid #000;height:20vh" class="col-sm-6 text-center mb-2">
            <h3>To</h3>
            <p>E.G. Street: Antonio St City: Manila</p>
            <p>Name of Street: <input class="inputBoxMain" id="ToStreet"></p>
            <p>City: <input class="inputBoxMain" id="ToCity"></p>
          </div>
          <hr class="h-color mx-2">
          <div class="text-center mt-2">
            <h2><b id="from"></b> <i class='fa-solid fa-arrow-right'></i><b id="to"></b></h2>
            <p>__________________________________</p>
            <p>Cost of first km : 20 php </p>
            <p>Cost of succeeding half km : 5 php </p>
            <p id="distance">Total Distance: </p>
            <p>__________________________________</p>
            <p id="cost"> Total Cost: </p>
            <button class="btn calculateBtn btn-warning" onclick="submit()">Calculate</button>
            <br><br>
            <form action="index.php" method="post">
            <input id="from2" name="from" hidden>
            <input id="to2" name="to" hidden>
            <input id="distance2" name="distance" hidden>
            <input id="fare2" name="fare" hidden>
            <button hidden class="btn calculateBtn btn-warning hide" type="submit">Save</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <script type="text/javascript">
      var customLayer;
        L.mapquest.key = 'BXAg2sFJrVVdiiEfL7xtD192SXfqGTXc';
        var map = L.mapquest.map('map', {
    center: [0, 0],
    layers: L.mapquest.tileLayer('dark'),
    zoom: 12
  });
        var directions = L.mapquest.directions();
directions.route({
  start: 'Padre Noval , Manila',
  end: 'Antonio St, Manila'
}, createMap);

function createMap(err, response) {
  if(err.length>0)
  {
    alert(err)
    return
  }

  if(customLayer!=null)  
  map.removeLayer(customLayer);
    customLayer = L.mapquest.directionsLayer({
    startMarker:{
      draggable:false
    },
    endMarker:{
      draggable:false
    },
    directionsResponse: response
  });
  customLayer.addTo(map);
  var distance = response.route.distance * 1.609
  document.getElementById("distance").innerHTML = "Total Distance: " + distance.toFixed(2) + " KM"
  var cost = 20
  if(distance>1)
  {
    var extra = distance - 1;
    var mult = Math.floor(extra*2)
    if(extra%2!=0)
    mult++
    cost += mult * 5
  }
  document.getElementById("cost").innerHTML = "Fare: " + cost + " php";
  var route = response.route.locations

  document.getElementById("from").innerHTML = route[0].street +", " + route[0].adminArea5 
  document.getElementById("to").innerHTML = route[1].street +", " + route[1].adminArea5
  document.getElementById("from2").value = route[0].street +", " + route[0].adminArea5 
  document.getElementById("to2").value = route[1].street +", " + route[1].adminArea5
  document.getElementById("fare2").value = cost;
  document.getElementById("distance2").value =  distance.toFixed(2) 
}
function submit()
{
  var a = document.getElementById("street").value
  var b = document.getElementById("city").value
  var c = document.getElementById("ToStreet").value
  var d = document.getElementById("ToCity").value
  if(a.length==0||b.length==0||c.length==0||d.length==0)
  {
    alert("Enter all required details")
  }
  else{
  var from = a + " , " + b
  var to = c + " , " + d
  directions.route({
    start: from,
    end:to
  },createMap);
  
  }
}
    </script>
   <?php
   abstract class routes{
    public $from;
    public $to;
    public $username;
    public $fare;
    public $distance;
    abstract function addRoute($from,$to,$username,$fare,$distance);
   }
   class Account extends routes{
    public $fname;
    public $lname;
    public $user;
    function __construct($fname,$lname,$user)
    {
        $this->fname=$fname;
        $this->lname=$lname;
        $this->user=$user;
    }
    function addRoute($from,$to,$username,$fare,$distance)
    {
      
      $conn = new mysqli("localhost", "root", "123456", "elecfinalproj");
      $sql = "insert into routes values('$from','$to','$distance','$fare','$username')";
      if($conn->query($sql)===TRUE)
      {
        echo "<script>alert('Success!')</script>";
      }
      else
      echo "<script>alert('Error!')</script>";
    }
    }
    if(isset($_COOKIE["account"]))
{
 echo "<script> var x = document.querySelectorAll('.hide'); x.forEach((z)=>{z.removeAttribute('hidden')});document.querySelector('.unhide').setAttribute('hidden',true)</script>";
 $acc = unserialize($_COOKIE["account"]);
 echo "<script>document.getElementById('banner').innerHTML='VROOM $acc->fname $acc->lname'</script>";
}
if(isset($_POST["fare"]))
{
  $acc->addRoute($_POST["from"],$_POST["to"],$acc->user,$_POST["fare"],$_POST["distance"]);
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>