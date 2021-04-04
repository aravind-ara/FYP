<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
    <link rel="stylesheet" href="Home_page_style.css">
</head>
<body>
    <div class = 'header'>
        <h2>HUMAN MACHINE INTERFACE</h2>
    </div>
    <div class="topnav">
        <a href="./Home_page.php">HOME</a>
        <a href="./Work_Station.php">WORKSTATION</a>
        <a href="./Events.php" >EVENTS</a>
        <a href="./logout.php" style="float:right">LOGOUT</a>
    </div>
    <!-- <div class="left">left</div>
    <div class="right">right</div> -->
    <div class = "center">
          <!-- <h2 style="text-align: center; " id = 'h2'>About</h2> -->
          <div class = 'content'> 
            <h1 style="text-align: center; color:black;margin-top:1.1em">FYP</h1><br>
            <p style = "margin-bottom:1em; text-indent: 50px; color:black;margin-top: 0em">
                We built a simple web page to demonstrate the operation of SCADA with fewer applications.
                Our web page mainly focuses on ENGINEERING WORKSTATION where operations on SWITCHYARD EQUIPMENT like a circuit breaker, isolator, etc.
                are performed.<br>
                The operation of switchgears can be performed in two modes:
                <ul style = "padding-left: 15%; margin-top: -1%; list-style-position: inside; color:black;">
                    <li>Local Mode</li>
                    <li>Remote Mode</li>
                </ul> 
                <h3 style = "color:black">Local Mode:</h3>
                <p style = "text-indent: 50px;">
                    Switchgear components can be operated manually in this mode using workers.
                    Automation and monitoring of switchgear and protection equipments can be achived in remote mode.<br>
                </p>
                <br>
                <h3 style = "color:black">Remote Mode:</h3>
                <p style = "text-indent: 50px;">               
                    Switchgear components can be operated remotely using SCADA (Supervisory control and data acquisition). 
                    Automation and monitoring of switchgear and protection equipments can be achived in remote mode.<br>
                </p>
                <br>
                <h3 style = "color:black">SWITCHGEAR:</h3>
                <ol style = "padding-left: 2%; margin-top: 1%; list-style-position: inside; color:black">
                    <li>Circuit braker</li>
                    <p style = "text-indent: 50px;">
                        A circuit breaker is an automatically operated electrical switch designed to protect an electrical circuit from damage caused by excess current from an overload or short circuit. 
                        Its basic function is to interrupt current flow after a fault is detected.
                    </p>
                    <li>Isolator </li>
                    <p style = "text-indent: 50px;">
                        The isolator is a mechanical switch that isolates a part of the circuit from the system when required. Isolators are used to open a circuit under no load. Its main purpose is to isolate one portion of the circuit from the 
                        other and is not intended to be opened while current is flowing in the line.
                    </p>
                    <li>EarthSwitch </li>
                    <p style = "text-indent: 50px;">
                        The function of earth or disconnector switch is to discharge the capacitive voltage that stored in generator side or long transmission line conductors in the isolated system just after opening the CB (Circuit Breaker) and Isolator. 
                        Means when isolator opens the circuit then earth-switch closes & vice-versa
                    </p>
                </ol> 
                <br>
                <p style = "color:black">
                    Every switchgear component has its interlocks and by which the operations can be performed on them. Interlocks for them are,
                </p>
                    <ol style = "padding-left: 2%; margin-top: 1%; list-style-position: inside; color: black">
                    <li>Circuit braker</li>
                    <p style = "text-indent: 50px;">
                    If an open command is given in OWS then the SCADA checks for the following conditions to operate.
                        <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                            <li> CB open request given.</li>
                            <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                            <li> CB is in the closed position.</li>
                        </ul>
                    Here all three conditions are fed into AND gate and hence only if all the three conditions are satisfied, 
                    CB will open, or else no operation will take place

                    If the close command is given then the system checks for the following conditions to be satisfied:
                        <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                            <li> CB spring charged. </li>
                            <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                            <li> No fault in the line. </li>
                        </ul>
                    Here all three conditions are fed into AND gate,(before that the 2nd condition is fed into NOT gate which means there should be no fault in the line)
                    and hence only if all the three conditions are satisfied, CB will close or else no operation will take place
                    </p>
                    <li>Isolator </li>
                    <p style = "text-indent: 50px;">
                    The isolator is a mechanical switch that isolates a part of the circuit from the system when required. Isolators are used to open a circuit under no load. Its main purpose is to isolate one portion of the circuit from the 
                    other and is not intended to be opened while current is flowing in the line.

                    If the open command is given in OWS then the SCADA checks for the following conditions to operate.
                    <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                        <li> CB open position. </li>
                        <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                        <li> Earth switch is in the open position </li>
                    </ul>
                    Here all three conditions are fed into AND gate and hence only if all the three conditions are satisfied, the isolator will open, or else no operation will take place.
                    
                    If the CLOSE command is given in OWS then the SCADA checks for the following conditions to operate.
                    <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                        <li> CB open position. </li>
                        <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                        <li> Earth switch is in the open position </li>
                    </ul>  
                    Here all three conditions are fed into AND gate and hence only if all the three conditions are satisfied, the isolator will close, or else no operation will take place.
                    </p>
                    <li>EarthSwitch </li>
                    <p style = "text-indent: 50px;">
                    The function of earth or disconnector switch is to discharge the capacitive voltage that stored in generator side or long transmission line conductors in the isolated system just after opening the CB (Circuit Breaker) and Isolator. 
                    Means when isolator opens the circuit then earth-switch closes & vice-versa.

                    If the open command is given in OWS then the SCADA checks for the following conditions to operate.
                    <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                        <li> CB open position. </li>
                        <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                        <li> Isolator is in the open position </li>
                    </ul>
                    Here all three conditions are fed into AND gate and hence only if all the three conditions are satisfied, the EarthSwitch will open, or else no operation will take place.
                    
                    If the CLOSE command is given in OWS then the SCADA checks for the following conditions to operate.
                    <ul style = "padding-left: 10%; margin-top: 1%; list-style-position: inside;">
                        <li> CB open position. </li>
                        <li> SF6 level 2 (i.e., 5.5kg/cm^2) not reached.</li>
                        <li> Isolator is in the open position </li>
                    </ul>  
                    Here all three conditions are fed into AND gate and hence only if all the three conditions are satisfied, the EarthSwitch will close, or else no operation will take place.
                    </p>
                </ol> 
                <br>
                <h4  style = "text-indent: 30px; color:black;">
                    we have made a simple web design to illustrate the working of SCADA with lesser application and with all the above interlocks mentioned.
                </h4>  
            </p>  
        </div>
    </div>        
    
</body>
</html>