$(document).ready(function(){
    $("[href]").removeClass("active");
    $("button.btn-students-show").click(function(){
         $(".tab-pane").removeClass("active show");
        $("#inf_student").addClass("active show");
    });
});