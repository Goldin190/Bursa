var name,nd_name,school,adres,m_name,f_name,f_ndname,m_ndname,alergens = Array(),m_tel,f_tel,s_tel;
$(document).ready(function () {

    ajax_write();

    var a = 0;

    $("[href]").removeClass("active");
    
    $("button.btn-students-edit").click(function(){
        $(".tab-pane").removeClass("active show");
        $("#edit-student").addClass("active show");
    });
    
    $("button.btn-students").click(function(){
        $(".tab-pane").removeClass("active show");
        $("#inf_student").addClass("active show");
    });
    
    
});

function fill_student(id){
    ajax_start();
    ajax_load("#collapse_in_table");
    console.log(id);
    ajax_send("php/get_stud.php?id="+id);
    assign();
}
function add_student(){
    $(".tab-pane").removeClass("active show");
    $("#edit-student").addClass("active show");
}
function assign(){
    $("span #name").innerHTML = name;
    $("span #nd_name").innerHTML = nd_name;
    $("span #school").innerHTML = school;
    $("span #adres").innerHTML = adres;
    $("span #mother_name").innerHTML = m_name;
    $("span #father_name").innerHTML = f_name;
    $("span #mother_nd_name").innerHTML = m_ndname;
    $("span #father_nd_name").innerHTML = f_ndname;
    /*for(let lol of alergens){
        $("ul .alergens").append(lol);    
    }*/
    $("span #student_tel").innerHTML = s_tel;
    $("span #mother_tel").innerHTML = m_tel;
    $("span #father_tel").innerHTML = f_tel;
}

function next_sibling(){
    var id = $("tbody").children().last().attr("id");
    id = parseInt(id);
    if(!id){
        id = 0;
    }
    id = id+1;
    $("#sib").append('<tr id="'+id+'"><td><label for="name_nd_name" class="sr-only">Mother_info</label><input type="text" readonly class="form-control-plaintext text-primary" id="parents" value="Dane rodzeństwa"></td><td><input type="text" class="form-control"id="imie'+id+'" name="imie'+id+'" placeholder="Imie"></td><td><input type="text" class="form-control" name="nazwisko'+id+'" placeholder="Nazwisko"></td><td><input type="number" class="form-control" name="wiek'+id+'" placeholder="Wiek"></td><td><input type="text" class="form-control" name="job'+id+'" placeholder="Praca/zajęcie"></td><td><select class="form-control" name="plec'+id+'"><option value="brat">brat</option><option value="siostra">siostra</option></select></td></tr>')
}
function last_sibling(){
    $("tbody").children().last().remove();
}

function student_show(id){
    $(".tab-pane").removeClass("active show");
    $("#inf-student").addClass("active show");
    fill_student(id);
}

function room_count_show(){
    var option = $("#grupa").val();
    $("#room option").remove();
    var room = $("#room");
    switch(option){
        case "a1":{
            for(var i = 1;i<51;i++){
            room.append('<option>'+i+'</option>');    
            }
            break;
            }
        case "b1":{
            for(var i = 51;i<101;i++){
            room.append('<option>'+i+'</option>');    
            }
            break;
        }
        case "c1":{
            for(var i = 101;i<151;i++){
            room.append('<option>'+i+'</option>');    
            }
            break;
        }    
    }
}
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
$("button.btn-students-edit").click(function () {
        $(".tab-pane").removeClass("active show");
        $("#edit-student").addClass("active show");
    });
$("[href]").removeClass("active");
    $("button.btn-students").click(function(){
         $(".tab-pane").removeClass("active show");
        $("#inf_student").addClass("active show");
    });
    $("button.btn-students-edit").click(function(){
        $(".tab-pane").removeClass("active show");
        $("#edit-student").addClass("active show");
    });


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