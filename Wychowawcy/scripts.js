$(document).ready(function(){
    $("[href]").removeClass("active");
    $("button.btn-students-show").click(function(){
         $(".tab-pane").removeClass("active show");
        $("#inf_student").addClass("active show");
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
  xmlhttp.open("GET","test.php",true);
  xmlhttp.send();
});
