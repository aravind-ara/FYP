<?php  
    include "db_events.php";      
    $page = $_SERVER['PHP_SELF'];
    $sec = "15";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>STATUS</title>
    <link rel="stylesheet" href="Events_style.css">
</head>
<body >
    <div class = 'header'>
        <h2>HUMAN MACHINE INTERFACE</h2>
    </div>
    <div class="topnav">
        <a href="./Home_page.php">HOME</a>
        <a href="./Work_Station.php">WORKSTATION</a>
        <a href="./Events.php" >EVENTS</a>
        <a href="./logout.php" style="float:right">LOGOUT</a>
    </div>
    <!-- <button onclick="initset()">click me</button> -->
    
    <table>
        <tr >
            <th>Time of activity</th>
            <th>Origin</th>
            <th>Name</th>
            <th>Status..</th>
        </tr>
    <?php
    // MySQLi Procedural
    function insert($cookie_name){
        include "db_events.php";
        $str = explode(" ",$_COOKIE[$cookie_name]);
        $ct = str_replace('_',' ',$str[0]);
        $origin = $str[1];
        $name = $str[2];
        $status = $str[3];
        // echo "Value is: " . $_COOKIE[$cookie_name];   
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO `events`( `Time_of_activity`, `Origin`, `Name`, `Status`) VALUES ('$ct','$origin','$name','$status');";
    
        if (mysqli_query($conn, $sql)) 
            return;
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }

    $cookies_name = array('Circuit_breaker','Line_isolator_1','Line_isolator_2','Isolator3_operation',
                            'Earth_switch_1','Earth_switch_2','Earth_switch_3');
    foreach ($cookies_name as $cookie_name) {
        if(isset($_COOKIE[$cookie_name])) {
            insert($cookie_name);
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 3600, '/');
        } 
        else {
            continue;
        }
    }
    ?>
    <?php
    // MySQLi Object-oriented
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM events ORDER BY `Time_of_activity` DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Time_of_activity"] . "</td><td>". $row["Origin"]. "</td><td>". $row["Name"]. "</td><td>".$row["Status"]. "</td></tr>";
        }
    echo "</table>";
    } 

    $conn->close();
    ?>

    </table>
    <!-- <div class="datetime">
        <div class="date">
          <span id="dayname">Day</span>,
          <span id="month">Month</span>
          <span id="daynum">00</span>,
          <span id="year">Year</span>
        </div>
        <div class="time">
          <span id="hour">00</span>:
          <span id="minutes">00</span>:
          <span id="seconds">00</span>
          <span id="period">AM</span>
        </div>
    </div> -->
    <!-- <scrip type="text/javascript">
        function updateClock(){
          var now = new Date();
          var dname = now.getDay(),
            mo = now.getMonth(),
            dnum = now.getDate(),
            yr = now.getFullYear(),
            hou = now.getHours(),
            min = now.getMinutes(),
            sec = now.getSeconds(),
            pe = "AM";
            
            if(hou >= 12){
            pe = "PM";
            }
            if(hou == 0){
            hou = 12;
            }
            if(hou > 12){
            hou = hou - 12;
            }

            Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], mo, dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for(var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];


        }
    
        function initClock(){
          updateClock();
          window.setInterval("updateClock()", 1);
        }

        function initset() {
            var CT = ["hr","min","sec","period","d","mnth","yr"];
            values = [];
            var ids = [ "hour", "minutes", "seconds", "period","daynum","month",  "year" ];
            for(var i = 0; i < ids.length; i++){
                values[i] = document.getElementById(ids[i]).firstChild.nodeValue;
                console.log(values[i]);
            }
            for(var i = 0; i < ids.length; i++)
            document.getElementById(CT[i]).firstChild.nodeValue = values[i];
        }
    </scrip> -->
</body>
</html>


