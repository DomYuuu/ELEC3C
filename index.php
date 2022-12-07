<html>
    <head>
        <title>Map Test</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
        <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    </head>
    <body>

    <nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a class="navbar-brand px-4 fs-1" href="#">VROOM</a>
      
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-lable="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto text-center px-4">
            
            <li class="nav-item">
                <a class="nav-link" href="map.php">HOME</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="aboutUs.html">ABOUT US</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="loginPage.php">SIGN IN</a>
            </li>
            
            <li class="nav-item">
                <a href="map.php"><button class="btn btn-outline-danger">Logout</button></a>
            </li>
            
        </ul>
        </div>
    </nav>

    <div id="map" style="width: 100%; height: 530px;"></div>
    <div>
      <h3>From</h3>
      <p>E.G. Street: Padre Noval St City: Manila</p>
    <p>Name of Street: <input id="street"> City: <input id="city"></p>
    <h3>To</h3>
    <p>E.G. Street: Antonio St City: Manila</p>
    <p>Name of Street: <input id="ToStreet"> City: <input id="ToCity"></p>
    <button onclick="submit()">Submit</button>
    <p>Cost of first km : 20 php </p>
    <p>Cost of succeeding half km : 5 php </p>
    <p id="distance">Total Distance: </p>
    <p>__________________________________</p>
    <p id="cost"> Total Cost: </p>
    
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
  document.getElementById("distance").innerHTML = "Total Distance: " + distance.toFixed(2)
  var cost = 20
  if(distance>1)
  {
    var extra = distance - 1;
    var mult = Math.floor(extra*2)
    if(extra%2!=0)
    mult++
    cost += mult * 5
  }
  document.getElementById("cost").innerHTML = "Fare: " + cost

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
$conn = mysqli_connect("localhost", "root", "123456","elecfinalproj");

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>