<!DOCTYPE html>
<html>
<head>

<title>7</title>

<link rel = "icon" href = "img/11.png" type = "image/png">
<link rel="stylesheet" href="styles.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.top-container {
  background-color: #eef4f7;
  padding: 30px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  background: #87b1c5;
  box-shadow: 1px 1px 2px #98bccd, 0 0 25px #98bccd, 0 0 5px #98bccd;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
.alert {
  padding: 15px;
  background-color: #f44336;
  color: #000000;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
h1{
	  text-align: center; 
}

h2{
	  text-align: center; 
      color: #eef4f7;	  
}

hr{
  background-color: #eef4f7;
}
</style>
</head>
<body>

<div class="top-container">
<h1><img src="icons8-chart-64.png"></h1>
</div>

<div class="header" id="myHeader">
<h2>My Average Day</h2>
</div>
<br/>
<br/>
<?php

$errors = array(); 

// define variables and set to empty values
$Work = $Eat = $TV = $Gym = $Sleep = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Work = test_input($_POST["Work"]);
  $Eat = test_input($_POST["Eat"]);
  $TV = test_input($_POST["TV"]);
  $Gym = test_input($_POST["Gym"]);
  $Sleep = test_input($_POST["Sleep"]);
  
  if (empty($Work)) { array_push($errors, "Work is required"); 
  }else{
	        if (!preg_match("/^[0-9]*$/",$Work)) {
      array_push($errors, "Error: Only number ");
}
  }
 
    if (empty($Eat)) { array_push($errors, "Eat is required"); 
  }else{
	        if (!preg_match("/^[0-9]*$/",$Eat)) {
      array_push($errors, "Error: Only number ");
}
  }
      if (empty($TV)) { array_push($errors, "TV is required"); 
  }else{
	        if (!preg_match("/^[0-9]*$/",$TV)) {
      array_push($errors, "Error: Only number ");
}
  }

      if (empty($Gym)) { array_push($errors, "Gym is required"); 
  }else{
	        if (!preg_match("/^[0-9]*$/",$Gym)) {
      array_push($errors, "Error: Only number ");
}
  }
  
        if (empty($Sleep)) { array_push($errors, "Sleep is required"); 
  }else{
	        if (!preg_match("/^[0-9]*$/",$Sleep)) {
      array_push($errors, "Error: Only number ");
}
  }
  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <div class="column">
  <div class="col2">


<br>
<?php include('error.php'); ?>
<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  Work:<br/> <input type="text" name="Work">
  <br/><br/>
  Eat:<br/> <input type="text" name="Eat">
  <br/><br/> 
  TV: <br><input type="text" name="TV">
  <br><br>
  Gym:<br> <input type="text" name="Gym">
  <br><br>
  Sleep: <br><input type="text" name="Sleep">
  <br><br>
  <h1><button type="submit" name="submit" value="Submit"> Submit </button></h1>
</form>
  </div>
    </div>
	  <div class="column">
   <div class="col3"> 
 <div id="piechart_3d" style="width: 100%; height: 100%;" ></div>
 <br/>
 <hr/>
 <br/>
  <div id="piechart" style="width: 100%; height: 100%;"></div>
  </div>
    </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
  ['Work', <?php echo $Work;?>],
  ['Eat', <?php echo $Eat;?>],
  ['TV', <?php echo $TV;?>],
  ['Gym', <?php echo $Gym;?>],
  ['Sleep', <?php echo $Sleep;?>]
        ]);

        var options = {
          title: 'My Average Day (2)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
  ['Work', <?php echo $Work;?>],
  ['Eat', <?php echo $Eat;?>],
  ['TV', <?php echo $TV;?>],
  ['Gym', <?php echo $Gym;?>],
  ['Sleep', <?php echo $Sleep;?>]
        ]);

        var options = {
          title: 'My Average Day (1)',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>



<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
