<!-- var httpr = new XMLHttpRequest();
    httpr.open("POST","GET_DATA.php",true);
    httpr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpr.onreadystatechange=function(){
        if(httpr.readyState == 4 && httpr.status == 200){
            document.getElementById('response').innerHTML = httpr.responseText;
        };  
    }
    httpr.send("CT="+CT+"&origin="+origin+"&name="+name+"&status=",status); -->


<?php
print_r('aa');
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "mydb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
if (isset($_POST['CT'])) {
    $ct =  $_POST['CT'];
    $origin =  $_POST['origin'];
    $name =  $_POST['name'];
    $status =  $_POST['status'];
    $sql = "INSERT INTO `events`(`id`, `Time_of_activity`, `Origin`, `Name`, `Status`) VALUES ('$ct','$origin','$name','$status');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'sss';
    }
}

?>