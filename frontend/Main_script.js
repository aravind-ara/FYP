const SF6_pressure_level = 6.3;
const CB_status = document.getElementById('Circuit_breaker');
const Isolator1_status = document.getElementById('Line_isolator_1');
const Isolator2_status = document.getElementById('Line_isolator_2');
const Isolator3_status = document.getElementById('Line_isolator_3');
const ES1_status =  document.getElementById('Earth_switch_1');
const ES2_status =  document.getElementById('Earth_switch_2');
const ES3_status =  document.getElementById('Earth_switch_3');
const No_fault = true
const CB_spring = true
var tabButtons=document.querySelectorAll(".rightcolumn .buttonContainer button");
var tabPanels=document.querySelectorAll(".rightcolumn  .tabPanel");
var activate_button =  document.querySelectorAll('.rightcolumn  .tabPanel button');
var mode = false;

function CB_operation(property){ 
    // CB open commands
    if (property.value == 0) {
        // circuit breaker open request is assigned
        if (SF6_pressure_level > 5.5) {     
            var ct = initset();
            ON(property);
            CB_display(true);
            passValue(property,ct);
        }
         else{
            alert('SF6 pressure pressure level is below 5.5');
        }
    }
    // CB close commands
    else{           
        //circuit breaker close request is assigned
        if(mode){
            if (Isolator1_status.value == 0 && (Isolator2_status.value == 0 || Isolator3_status.value == 0) && SF6_pressure_level > 5.5 && No_fault && CB_spring && CB_status.value == 1) {
                var ct = initset();
                OFF(property);  
                CB_display(false);
                passValue(property,ct);
            } 
            else {
                alert('cannot close CB');    
            }
        }
        else{
            alert('Bay in local mode')
        }
    }
}

function Isolator1_operation(property) {
    // Isolator open commands
    if (mode) {
        if (property.value == 0) {
            // Isolator open request is assigned
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && ES1_status.value == 1 && ES2_status.value == 1 && ES3_status.value == 1) {
                var ct = initset();
                ON(property);
                Isolator1_display(true);
                passValue(property,ct);
            } 
            else {
                alert('cannot open Isolator');
            }
        } 
        else {
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && ES1_status.value == 1 && ES2_status.value == 1 && ES3_status.value == 1) {
                var ct = initset();
                OFF(property);
                Isolator1_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close Isolator");    
            }    
        }        
    }
    else {
        alert('Bay in local mode')
    }
}

function Isolator2_operation(property) {
    // Isolator open commands
    if (mode) {
        if (property.value == 0) {
            // Isolator open request is assigned
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator3_status.value == 1 && ES1_status.value == 1 && ES2_status.value == 1) {
                var ct = initset();
                ON(property);
                Isolator2_display(true);
                passValue(property,ct);
            } 
            else {
                alert('cannot open Isolator');
            }
        } 
        else {
            if (ES1_status.value == 1 && SF6_pressure_level > 5.5 && CB_status.value == 1) {
                var ct = initset();
                OFF(property);
                Isolator2_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close Isolator");    
            }    
        }        
    }
    else {
        alert('Bay in local mode')
    }

}

function Isolator3_operation(property) {
    // Isolator open commands
    if (mode) {
        if (property.value == 0) {
            // Isolator open request is assigned
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator2_status.value == 1 && ES1_status.value == 1 && ES2_status.value == 1) {
                var ct = initset();
                ON(property);
                Isolator3_display(true);
                passValue(property,ct);
            } 
            else {
                alert('cannot open Isolator');
            }
        } 
        else {
            if (ES2_status.value == 1 && SF6_pressure_level > 5.5 && CB_status.value == 1) {
                var ct = initset();
                OFF(property);
                Isolator3_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close Isolator");    
            }    
        }        
    }
    else {
        alert('Bay in local mode')
    }

}

function Earth_switch1_operation(property) {
    if (mode) {
        if(property.value == 1){
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator1_status.value == 1 && Isolator2_status.value == 1 && Isolator3_status.value == 1) {
                var ct = initset();
                OFF(property);
                Es1_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close earthswitch"); 
            }
        }
        else{
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator1_status.value == 1 && Isolator2_status.value == 1 && Isolator3_status.value == 1) {
                var ct = initset();
                ON(property);
                Es1_display(true);
                passValue(property,ct);
            } 
            else{
                alert("cannot open earthswitch");
            }
        }        
    } else {
        alert('Bay in local mode')
    }

}

function Earth_switch2_operation(property) {
    if (mode) {
        if(property.value == 1){
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator1_status.value == 1 && Isolator2_status.value == 1 && Isolator3_status.value == 1) {
                var ct = initset();
                OFF(property);
                Es2_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close earthswitch"); 
            }
        }
        else{
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator1_status.value == 1 && Isolator2_status.value == 1 && Isolator3_status.value == 1) {
                var ct = initset();
                ON(property);
                Es2_display(true);
                passValue(property,ct);
            } 
            else{
                alert("cannot open earthswitch");
            }
        }       
    } else {
        alert('Bay in local mode')
    }

}

function Earth_switch3_operation(property) {
    if (mode) {
        if(property.value == 1){
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator2_status.value == 1) {
                var ct = initset();
                OFF(property);
                Es3_display(false);
                passValue(property,ct);
            } 
            else {
                alert("cannot close earthswitch"); 
            }
        }
        else{
            if (CB_status.value == 1 && SF6_pressure_level > 5.5 && Isolator2_status.value == 1) {
                var ct = initset();
                ON(property);
                Es3_display(true);
                passValue(property,ct);
            } 
            else{
                alert("cannot open earthswitch");
            }
        }        
    } 
    else {
        alert('Bay in local mode')
    }

}

function ON(property) {
    property.style.backgroundColor = "green"
    property.value = 1; 
}

function OFF(property) {
    property.style.backgroundColor = "red"
    property.value = 0;
}

function CB_display(state) {
    var CB_show = document.getElementById("CB_status");
    if (state) {
        CB_show.style.backgroundColor = "green";
    } else {
        CB_show.style.backgroundColor = "red";
    }
}

function Isolator1_display(state) {
    var Iso1_show = document.getElementById("Isolator1_status");
    if (state) {
        Iso1_show.style.backgroundColor = "green";
    } else {
        Iso1_show.style.backgroundColor = "red";
    }
}

function Isolator2_display(state) {
    var Iso2_show = document.getElementById("Isolator2_status");
    if (state) {
        Iso2_show.style.backgroundColor = "green";
    } else {
        Iso2_show.style.backgroundColor = "red";
    }
}

function Isolator3_display(state) {
    var Iso3_show = document.getElementById("Isolator3_status");
    if (state) {
        Iso3_show.style.backgroundColor = "green";
    } else {
        Iso3_show.style.backgroundColor = "red";
    }
}

function Es1_display(state) {
    var Es1_show = document.getElementById("Earth_switch_1_status");
    if (state) {
        Es1_show.style.backgroundColor = "green";
    } else {
        Es1_show.style.backgroundColor = "red";
    }
}

function Es2_display(state) {
    var Es2_show = document.getElementById("Earth_switch_2_status");
    if (state) {
        Es2_show.style.backgroundColor = "green";
    } else {
        Es2_show.style.backgroundColor = "red";
    }
}

function Es3_display(state) {
    var Es3_show = document.getElementById("Earth_switch_3_status");
    if (state) {
        Es3_show.style.backgroundColor = "green";
    } else {
        Es3_show.style.backgroundColor = "red";
    }
}

function setColor(property) {
    var val = property.value;
    if (val == 0) {
        property.style.backgroundColor = "green"
        property.value = 1;        
    }
    else {
        property.style.backgroundColor = "red"
        property.value = 0;
    }
    // console.log(document.getElementsByClassName('btn').item('CircuitBreaker'));
}

function showPanel(panelIndex,colorCode) {
    tabButtons.forEach(function(node){
        node.style.backgroundColor="";
        node.style.color="";
    });
    tabButtons[panelIndex].style.backgroundColor='#c6d1c6';
    tabButtons[panelIndex].style.color="white";
    tabPanels.forEach(function(node){
        node.style.display="none";
    });
    tabPanels[panelIndex].style.display="block";
    tabPanels[panelIndex].style.backgroundColor=colorCode;
}

function activate(property) {
    if (activate_button.item(0) == property) {
        if (property.value == 0) {
            ON(property);
            OFF(activate_button.item(1));
            mode = true;
        }
        else {
            OFF(property);
            ON(activate_button.item(1));
            mode = false;
        }
    }
    if (activate_button.item(1) == property) {
        if (property.value == 0) {
            ON(property);
            OFF(activate_button.item(0));
            mode = false;
        }
        else {
            OFF(property);
            ON(activate_button.item(0));
            mode = true;
        }
    }
}

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
    var CT = "";
    values = [];
    var ids = [ "hour", "minutes", "seconds", "period","daynum","month",  "year" ];
    for(var i = 0; i < ids.length; i++){
        values[i] = document.getElementById(ids[i]).firstChild.nodeValue;
    }
    CT = values[0]+':'+values[1]+':'+values[2]+'_'+values[4]+'/'+values[5]+'/'+values[6];
    return CT;
}

function passValue(property,CT) {
    // var msql = require('mysql');
    var status = '' ;
    if (property.value == 1) {
        status = 'open';
    } else {
        status = 'close';
    }
    var origin = property.id+"-bay1",
        name = property.id;
    // localStorage.setItem('CT',CT);
    // localStorage.setItem('origin',origin);
    // localStorage.setItem('name', name);
    // localStorage.setItem('status',status);
    createCookie(CT,origin,name,status,1);;
    // var event = {};
    //     event.ct = CT;
    //     event.origin = origin;
    //     event.name = name;
    //     event.status = status;
    // const fs = require('fs');
    // // Write data in 'Output.txt' . 
    // fs.writeFile('Output.txt', event, (err) => { 
        
    //     // In case of a error throw err. 
    //     if (err) throw err; 
    // })


    // jQuery(document).ready(function($){
    //     var event = {};
    //     event.ct = CT;
    //     event.origin = origin;
    //     event.name = name;
    //     event.status = status;
    //     console.log(event);
    //     $.ajax({
    //       url: 'status.php',
    //       method: "post",
    //       data: event,
    //       success: function(data){
    //         console.log("Happy")
    //       }
    //     });
  
    // });
} 

// Function to create the cookie 
function createCookie(ct, origin,name,status, days) { 
    var expires; 
    var value = ct +" "+ origin+" "+name+" "+status;
    if (days) { 
        var date = new Date();
        console.log(date.setTime(date.getTime() + (30* 1000)));
        date.setTime(date.getTime() + (1* 1000)); 
        // date.setTime(date.getTime() + (30 * 1000)); expires after 30 second
        // date.setTime(date.getTime() + (60 * 1000)); expires after 1 minute
        //date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); expires after 24 hours 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
    
    document.cookie = escape(name) + "=" +  
        escape(value) + expires + "; path=/"; 
} 


