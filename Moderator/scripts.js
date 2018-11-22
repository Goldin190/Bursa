$(document).ready(function () {

    ajax_write();

    var a = 0;
    $("#groups").on("change", select_room_update(a));

    $("[href]").removeClass("active");
    $("button.btn-students").click(function () {
        $(".tab-pane").removeClass("active show");
        $("#inf_student").addClass("active show");
    });
    $("button.btn-students-edit").click(function () {
        $(".tab-pane").removeClass("active show");
        $("#edit-student").addClass("active show");
    });

});

function ajax_load(element) {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $(element).html(this.responseText);
        }
    }
}

function ajax_start() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
}
//"select_user.php"

function ajax_send(plik) {
    xmlhttp.open("GET", plik, true);
    xmlhttp.send();
}

function ajax_write() {
    ajax_start();
    ajax_load("#kek");
    ajax_send("php/select_user.php");

    ajax_start();
    ajax_load("#students_table");
    ajax_send("php/select_students.php");

    ajax_start();
    ajax_load("#groups_table");
    ajax_send("php/select_groups.php");

    ajax_start();
    ajax_load("#grupa");
    ajax_send("php/groups_to_select.php");
}

function select_room_update(a) {
    console.log(a++);
}
/*

if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    $("#kek").html(this.responseText);
     
    }
  }
  xmlhttp.open("GET","get_id.php",true);
  xmlhttp.send();


if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    $("#kek").html(this.responseText);
     
    }
  }
  xmlhttp.open("GET","select_user.php?id=",true);
  xmlhttp.send();

for(el of $(".info").children){
            for(che of el.children){
                che.replaceWith("<input type='text' placeholder="che.innerHTML">");
            }
        }
        $elements.each(function()
       $("button.btn-students-approve").click(function(){
        $("button.btn-students-approve").replaceWith("<button class='btn btn-success float-right btn-students-edit'>Edytuj</button>");
    }); 
*/
