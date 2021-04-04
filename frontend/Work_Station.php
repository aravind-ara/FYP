<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body onload="initClock()">
  <div class = 'header'>
    <h2>HUMAN MACHINE INTERFACE</h2>
  </div>
  <div class="topnav">
    <a href="./Home_page.php">HOME</a>
    <a href="./Work_Station.php">WORKSTATION</a>
    <a href="./Events.php" target = "_blank">EVENTS</a>
    <a href="./logout.php" style="float:right">LOGOUT</a>
  </div>
  <div class = "rightcolumn">
    <div class="buttonContainer">
      <button id ='REMOTE' onclick="showPanel(0,'white')">REMOTE</button>
      <button id ='LOCAL' onclick="showPanel(1,'white')">LOCAL</button>
    </div>
    <div class="tabPanel">
      <p> The workstation is in remote mode,operations can be performed.</p> 
      <button id="activate_REMOTE" value="0" onclick="activate(this)">activate</button>
    </div>
    <div class="tabPanel">
      <p>The workstation is in local mode,no operations can be performed.</p> 
      <button id="activate_LOCAL" value="1" onclick="activate(this)">activate</button>
    </div>
    <div class="datetime">
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
    </div>
    <span id="response"></span>
  </div>
  <div class = "leftcolumn">
    <div class="card">
      <h2 style="text-align: center;">Status</h2>
      <div class="btn-status" >
        <button class="btn1_status" id = "CB_status">Q50</button> 
        <h3 class = "bt1" style = "float: right;">Circuit breaker</h3>
        <button class="btn2_status" id = "Isolator1_status">Q28</button>
        <h3 class = 'bt2' style = "float: right;">Line_isolator_1</h3>
        <button class="btn3_status" id = "Isolator2_status">Q21</button>
        <h3 class = 'bt3' style = "float: right;">Line_isolator_2</h3>
        <button class="btn4_status" id = "Isolator3_status">Q22</button>
        <h3 class = 'bt4' style = "float: right;">Line_isolator_3</h3>
        <button class="btn5_status" id = "Earth_switch_1_status">Q34</button> 
        <h3 class = "bt5" style = "float: right;">Earth_switch_1</h3>
        <button class="btn6_status" id = "Earth_switch_2_status">Q36</button>
        <h3 class = 'bt6' style = "float: right;">Earth_switch_2</h3>
        <button class="btn7_status" id = "Earth_switch_3_status">Q38</button>
        <h3 class = 'bt7' style = "float: right;">Earth_switch_3</h3>
        <button class="btn8_status" id = "Earth_switch_4_status">Q31</button>
        <h3 class = 'bt8' style = "float: right;">Earth_switch_4</h3>
        <button class="btn9_status" id = "Earth_switch_5_status">Q32</button>
        <h3 class = 'bt9' style = "float: right;">Earth_switch_5</h3>
      </div>
    </div>
  </div>
  <div class = "centercolumn">
    <img class = "img" src="SLD_2.jpg" alt="SCADA" >
    <button class="btn1" value="0" id = 'Circuit_breaker' onclick="CB_operation(this)">Q50</button>
    <button class="btn2" value="0" id = 'Line_isolator_1' onclick="Isolator1_operation(this)">Q28</button>
    <button class="btn3" value="0" id = 'Line_isolator_2' onclick="Isolator2_operation(this)">Q21</button>
    <button class="btn4" value="1" id = 'Line_isolator_3' onclick="Isolator3_operation(this)">Q22</button>
    <button class="btn5" value="1" id = 'Earth_switch_1' onclick="Earth_switch1_operation(this)">Q34</button>
    <button class="btn6" value="1" id = 'Earth_switch_2' onclick="Earth_switch2_operation(this)">Q36</button>
    <button class="btn7" value="1" id = 'Earth_switch_3' onclick="Earth_switch3_operation(this)">Q38</button>
    <button class="btn8" value="1" id = 'Earth_switch_4' onclick="setColor(this)">Q31</button>
    <button class="btn9" value="1" id = 'Earth_switch_5' onclick="setColor(this)">Q32</button>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src = Main_script.js></script>
</body>
</html>