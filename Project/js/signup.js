$(".sgtwo").click(function () {

	$(".drivercontentsg").hide("slow");
	$(".ownercontentsg").hide("slow");
	$(".schoolcontentsg").show("slow");


});

$(".sgone").click(function () {
	function isValidEmail(email) {
		var emailRegExp = /^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/gi;
		return (emailRegExp.test(email));
	}

	function isValidNRC(nrc) {
		var nrcRegExp = /^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/gi;
		return (nrcRegExp.test(nrc));
	}

	function isValidPhone(tel) {
		var telRegExp = /^[0-9]{2}[0-9]{9,13}$/gi;
		return (telRegExp.test(tel));
	}

	var sgkhname = $("#sgkhname");
	var sgkhemail = $("#sgkhemail");
	var sgkhnrc = $("#sgkhnrc");
	var sgkhaddress = $("#sgkhaddress");
	var sgkhtelephone = $("#sgkhtelephone");
	sgkhname.css("border", "1px solid gray");
	sgkhemail.css("border", "1px solid gray");
	sgkhnrc.css("border", "1px solid gray");
	sgkhtelephone.css("border", "1px solid gray");
	var flag=1;
	if (sgkhname.val() == 0 || sgkhemail.val() == 0 || sgkhnrc.val() == 0 || sgkhtelephone.val() == 0) {
		if (sgkhname.val() == 0) {
			sgkhname.css("border", "1px solid red");
		}
		if (sgkhemail.val() == 0) {
			sgkhemail.css("border", "1px solid red");
		}
		if (sgkhnrc.val() == 0) {
			sgkhnrc.css("border", "1px solid red");
		}
		if (sgkhtelephone.val() == 0) {
			sgkhtelephone.css("border", "1px solid red");
		}
		flag=0;
	}
	if (!isValidEmail(sgkhemail.val())) {
		sgkhemail.css("border", "1px solid red");
		flag=0;
	}
	if (!isValidNRC(sgkhnrc.val())) {
		sgkhnrc.css("border", "1px solid red");
		flag=0;
	}
	if (!isValidPhone(sgkhtelephone.val())) {
		sgkhtelephone.css("border", "1px solid red");
		flag=0;
	}


	if(flag) {
		sgkhname.css("border", "1px solid gray");
		sgkhemail.css("border", "1px solid gray");
		sgkhnrc.css("border", "1px solid gray");
		sgkhtelephone.css("border", "1px solid gray");
		$(".drivercontentsg").show();
		$(".ownercontentsg").hide();
		$(".schoolcontentsg").hide();
	}
});

// $(".sgthree").click(function(e){

// e.preventDefault();

// });


$(".backto").click(function () {

	$(".drivercontentsg").hide();
	$(".ownercontentsg").show();
	$(".schoolcontentsg").hide();

});


$(".crosssg").click(function () {
	$(".containersg").hide("slow");
});

$(".nodrive").click(function () {
	$(".showyesno").hide();
	$(".hiddenform").slideDown();
});

$(".yesdrive").click(function () {
	$(".showyesno").hide();
	$(".hiddenform").slideDown();
});








