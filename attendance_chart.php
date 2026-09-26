<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="attend_chart.css">
    <link rel="stylesheet" href="navigation.css">
</head>
<body>
  <div class="main_container" id="home">

  <div class="navbar">
      <div class="logo">
      <a href="#">SmartTrack</a>
    </div>
        <div class="navbar_items">
        <ul>
        <li><a href="home.php">LOGOUT</a></li>
          <li><a href="home.php">CONTACT US</a></li>
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
  </div> 
  <div class="banner_image">
        <div class="form-box">
          <div class="button-box">
                <div>
                <h2><center>Attendance Chart</center></h2></div>
                </div>

<?php
$con = mysqli_connect("localhost", "root", "", "spt");
if($con){
  echo " ";
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColColors);

function drawColColors() {
    var data = google.visualization.arrayToDataTable([
        ['sub_id', 'total','attendance'],
        <?php
        $sub_id = $_POST['sub_id'];
        $month = $_POST['month'];
        $sql = "SELECT * FROM `attendance` WHERE sub_id='$sub_id' AND month='$month'";
        $fire = mysqli_query($con,$sql);
        while($result = mysqli_fetch_assoc($fire)){
          echo "['".$result['sub_id']."',".$result['total'].",".$result['attendance']."],";
        }
        ?>
        
      ]);

var options = {
title: 'Students Attendance',
// colors: ['#9575cd', '#33ac71'],
hAxis: {
title: 'Subject Code'
},
vAxis: {
title: 'Attendance'
}
};

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);
}

</script>
                <div id="chart_div"></div>
                <table border="1" style="margin-top: 20px;">
                    <tr>
                        <th>Subject ID</th>
                        <th>Total</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $sub_id = $_POST['sub_id'];
                    $month = $_POST['month'];
                    $sql = "SELECT * FROM `attendance` WHERE sub_id='$sub_id' AND month='$month'";
                    $fire = mysqli_query($con, $sql);
                    if ($fire->num_rows != 0) {
                        while ($result = mysqli_fetch_assoc($fire)) {
                            echo "<tr>";
                            echo "<td>" . $result['sub_id'] . "</td>";
                            echo "<td>" . $result['total'] . "</td>";
                            echo "<td>" . $result['attendance'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data available</td></tr>";
                    }
                    ?>
                </table>
            </div>

 </div>
</div> 
</body>

</html>