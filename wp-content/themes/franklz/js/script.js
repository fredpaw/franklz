jQuery(document).ready(function($){
    $("#footer_show").click(function(){
        $("#footer_hide_link").show(1000);
		$(this).hide();
		$("#footer_hide").show();
    });
	$("#footer_hide").click(function(){
        $("#footer_hide_link").hide(1000);
		$(this).hide();
		$("#footer_show").show();
    });
});