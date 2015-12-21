
$(document).ready(function(){
    $("#entrar").click(function(){
        $("#login").toggle("slide");
    });

    $("#cadastrar").click(function(){
    	$("#login").hide();
   	    $("#cadastro").show();
	});
});


