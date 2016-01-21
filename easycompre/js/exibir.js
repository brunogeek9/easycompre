
$(document).ready(function(){
    $("#entrar").click(function(){
        $("#login").toggle("slide");
    });

    $("#cadastrar").click(function(){
    	$("#login").hide();
   	    $("#cadastro").show();
	});

    $("#conectese").click(function(){
		$("#cadastro").hide();
		$("#login").show();
	});

    $("#fec").click(function(){
        $("#cadastro").hide();
        $("#login").hide();
    });
    
	
});


