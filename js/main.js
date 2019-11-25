$(function(){
	// User Registration
	$("#regsubmit").click(function(){
		var name     = $("#name").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var email    = $("#email").val();
		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;

		$.ajax({
			type:"POST",
			url:"check/userRegister.php",
			data: dataString,
			success:function(data){
				$("#state").html(data);
			}
		});
		return false;
	});

	// User Login
	$("#logsubmit").click(function(){
		var email      = $("#email").val();
		var password   = $("#password").val();
		var dataString = 'email='+email+'&password='+password;


		$.ajax({
			type:"POST",
			url:"check/userLogin.php",
			data: dataString,
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").fadeIn(data);
					setTimeout(function(){
						$(".empty").fadeOut();
					}, 4000);
				} else if ($.trim(data) == "disable") {
					$(".disable").fadeIn(data);
					setTimeout(function(){
						$(".disable").fadeOut();
					}, 4000);
				} else if ($.trim(data) == "error") {
					$(".error").show(data);
					setTimeout(function(){
						$(".error").fadeOut();
					}, 4000);
				} else {
					window.location = "exam.php";
				}
			}
		});
		return false;
	});

/*	// Profile Update
	$("#profilesubmit").click(function(){

		var name       = $("#name").val();
		var username   = $("#username").val();
		var email      = $("#email").val();
		var dataString = 'name='+name+'&username='+username+'&email='+email;


		$.ajax({
			type:"POST",
			url:"profileUp.php",
			data: dataString,

			success:function(data){
				if ($.trim(data) == "empty") {

					$(".empty").fadeIn();

				} else if ($.trim(data) == "invalide") {

					$(".invalide").fadeIn();

				} else if ($.trim(data) == "chkmail") {

					$(".chkmail").fadeIn();

				} else if ($.trim(data) == "success") {

					$(".success").fadeIn();

				} else if ($.trim(data) == "error") {

					$(".error").fadeIn();
				}
			}
		});
		return false;
	});
*/


});
		
		

