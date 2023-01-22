$.noConflict();

jQuery(document).ready(function ($) {

	"use strict";

	[].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
		new SelectFx(el);
	});

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function (event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function (event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function (event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });




	// set car start
	$(".content").each(function () {

		$('.removecar').click(function () {

			$(".setcarcov").hide();

		});


		$(".editcar").click(function () {
			$(".carinfocontent").hide();
			$(".editcarinfocontent").show("slow");
		});


		$(".backbut").click(function () {
			$(".carinfocontent").show("slow");
			$(".editcarinfocontent").hide();
		});




	});

	// set car end

	// add car start

	$(".addbut").click(function () {
		$(".setcarcov").hide();
		$(".removebut").hide();
		$(".editbut").hide();
		$(".add").slideDown("slow");
		$(".originview").hide();
		// $("#cifsubmit").click(function () {
		// 	function isValidCarno(carno) {
		// 		var carnoRegExp = /^[0-9 a-z A-Z]{2}\-[0-9]{4}$/gi;
		// 		return (carnoRegExp.test(carno));
		// 	}

		// 	function isValidSeats(seats) {
		// 		var seatsRegExp = /^[0-9]+$/gi;
		// 		return (seatsRegExp.test(seats));
		// 	}

		// 	var model = $("#cifmodel");
		// 	var type = $("#ciftype");
		// 	var carno = $("#cifcarno");
		// 	var seats = $("#cifseats");
		// 	var color = $("#cifcolor");
		// 	model.css("border", "1px solid gray");
		// 	carno.css("border", "1px solid gray");
		// 	seats.css("border", "1px solid gray");
		// 	var flag = 1;
		// 	if (model.val() == 0 || carno.val() == 0 || seats.val() == 0) {
		// 		if (model.val() == 0) {
		// 			model.css("border", "1px solid red");
		// 		}
		// 		if (carno.val() == 0) {
		// 			carno.css("border", "1px solid red");
		// 		}
		// 		if (seats.val() == 0) {
		// 			seats.css("border", "1px solid red");
		// 		}
		// 		flag = 0;
		// 	}

		// 	if (!isValidCarno(carno.val())) {
		// 		carno.css("border", "1px solid red");
		// 		flag = 0;
		// 	}
		// 	if (!isValidSeats(seats.val())) {
		// 		seats.css("border", "1px solid red");
		// 		flag = 0;
		// 	}



		// 	if (flag) {
		// 		var modelval = model.val();
		// 		var typeval = type.val();
		// 		var carnoval = carno.val();
		// 		var seatsval = seats.val();
		// 		var colorval = color.val();
		// 		model.css("border", "1px solid gray");
		// 		carno.css("border", "1px solid gray");
		// 		seats.css("border", "1px solid gray");
		// 		location.href = "addcar.php?model=" + modelval + "&type=" + typeval + "&carno=" + carnoval + "&seats=" + seatsval + "&color=" + colorval;
		// 	}
		// 	else {
		// 		location.href = "#";
		// 	}
		// });
		// e.preventDefault();
	});

	$(".backbut").click(function () {
		$(".setcarcov").show();
		$(".add").hide();
		$(".editbut").show();
		$(".removebut").show();
		$('.remth').hide();
		$('.editth').hide();
		$('.editstuinfodel').hide();
		$('.editstuinfoedit').hide();
		$('.hidecardel').hide();
		$('.hidecaredit').hide();
		e.preventDefault();
	});

	// add car end


	// nextpg	
	$(".next").click(function () {
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

		function isValidCarno(carno) {
			var carnoRegExp = /^[0-9 a-z A-Z]{2}\-[0-9]{4}$/gi;
			return (carnoRegExp.test(carno));
		}
		var cifdname = $("#cifdname");
		var cifdemail = $("#cifdemail");
		var cifdnrc = $("#cifdnrc");
		var cifdphone = $("#cifdphone");
		var cifcar = $('#cifcar');
		var cifcarval = cifcar.find(":selected").text();
		cifdname.css("border", "1px solid lightgray");
		cifdemail.css("border", "1px solid lightgray");
		cifdnrc.css("border", "1px solid lightgray");
		cifdphone.css("border", "1px solid lightgray");
		cifcar.css("border", "1px solid lightgray");
		var flag = 1;
		if (cifdname.val() == 0 || cifdemail.val() == 0 || cifdnrc.val() == 0 || cifdphone.val() == 0 || cifcar.val() == 0) {


			if (cifdname.val() == 0) {
				cifdname.css("border", "1px solid red");
			}
			if (cifdemail.val() == 0) {
				cifdemail.css("border", "1px solid red");
			}
			if (cifdnrc.val() == 0) {
				cifdnrc.css("border", "1px solid red");
			}
			if (cifdphone.val() == 0) {
				cifdphone.css("border", "1px solid red");
			}
			if (cifcar.val() == 0) {
				cifcar.css("border", "1px solid red");
			}

			flag = 0;
		}

		if (!isValidCarno(cifcar.val())) {
			cifcar.css("border", "1px solid red");
		}
		if (!isValidEmail(cifdemail.val())) {
			cifdemail.css("border", "1px solid red");
			flag = 0;
		}
		if (!isValidNRC(cifdnrc.val())) {
			cifdnrc.css("border", "1px solid red");
			flag = 0;
		}
		if (!isValidPhone(cifdphone.val())) {
			cifdphone.css("border", "1px solid red");
			flag = 0;
		}


		if (flag) {
			cifcar.css("border", "1px solid lightgray");
			cifdname.css("border", "1px solid lightgray");
			cifdemail.css("border", "1px solid lightgray");
			cifdnrc.css("border", "1px solid lightgray");
			cifdphone.css("border", "1px solid lightgray");
			$(".orshow").hide();
			$(".orhide").show("slow");
			$(".backbut").hide();
			$(".backtoback").show("slow");
			$(".next").hide();
			$(".submit").show();
		}



	});

	$(".backtoback").click(function () {
		$(".orshow").show("slow");
		$(".orhide").hide();
		$(".backbut").show("slow");
		$(".backtoback").hide();
		$(".next").show();
		$(".submit").hide();
	});



});




