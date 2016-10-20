$(function() {

	$("#dt").hide();

	$("#ref_numf2").hide();

	$("#vsearch").click(function(e) {	
		verify(0);
	});
	$("#ref_numf").keypress(function(e) {
		var key = e.which;
		if(key==13) {
			verify(1);
		}
	});
	$("#ref_numf2").keypress(function(e) {
		var key = e.which;
		if(key==13) {
			verify(2);
		}
	});

	$(document).ajaxStart(function() {
		paceOptions = {
			elements: true,
			ajax: true,
			restartOnRequestAfter: true,
			restartOnPushState: true
		}
	}).stop(function() {
	});

	$("#refresh").click(function() {
		location.reload();
	});

    //$("#e").ladda('bind');

    Ladda.bind('#vsearch', {timeout:2000});

    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });

});

function verify(estatus) {
	var id;
	if(estatus==2) {
		id = $("#ref_numf2").val();
	} else {
		id = $("#ref_numf").val();
	}
	if(id=="") {
		swal("veriPort", "Please scan a slip to continue", "error");
	} else {
		if(id.charAt(0)=="D") {
			id = id.substr(15);
		} else {
			id = id - 100;
		}
		console.log(id);
		var token = $("#_token").val();
		var formData = {
			'_token'	: 	token,
			'id'		: 	id
		};
		$.post('/verify', formData, function(data,xhr,status) {
			console.log(data);
			if(data=="fake") {
				swal("veriPort", "Illegal Entry! No Data Found.", "error");
			} else {
				console.log(data);
				var user = data['user'];
				var contact = data['contacts'];
				var institute = data['institute'];
				var institute2 = data['institute2'];
				var quals = data['quals'];
				quals = quals[0];
				var relexp = data['relexp'];
				var refs = data['refs'];
				refs = refs[0];
				var docs = data['docs'];
				var image = user['image'];
				var jobcat = user['jobcat'];

				//document.getElementById('usr').innerHTML="{{asset('upload')}}/"+image;
				$("#usr").attr("src", "upload/"+image);
				console.log($("#usr").src);

				$("#name").text(user['f_name'] + " " + user['l_name']);		$("#idate").text(institute2['istart_date'] + " - " + institute2['iend_date']);
				/*$("#address").text(user['']);	*/							$("#prof_name").text(quals['name']);
				$("#phone").text(user['phone_num']);						$("#pos").text(quals['position']);
				$("#email").text(user['email']);							$("#rname").text(refs['name']);
				$("#ref_num").text(user['ref_num']);						$("#org").text(refs['organization']);
				$("#f_name").text(user['f_name']);							$("#rpos").text(refs['position']);
				$("#l_name").text(user['l_name']);							$("#remail").text(refs['email']);
				$("#maiden_name").text(user['maiden_name']);				$("#rphone").text(refs['phone']);
				$("#m_name").text(user['m_name']);							$("#pregion").text(user['region']);
				$("#sex").text(user['sex']);								$("#pcenter").text(user['center']);
				$("#status").text(user['marital_status']);					$("#aregion").text(user['altregion']);
				$("#dob").text(user['dob']);								$("#acenter").text(user['altcenter']);
				$("#street").text(contact['street']);						$("#course").text(institute2['course']);
				$("#city").text(contact['city']);							$("#degree").text(institute2['degree']);
				$("#lga").text(contact['lga']);								$("#country").text(institute2['ccountry']);
				$("#state").text(contact['state']);									
				$("#ostate").text(contact['state_origin']);									
				$("#sname").text(institute2['sname']);									
				$("#sdate").text(institute2['sstart_date'] + " - " + institute2['send_date']);									
				$("#iname").text(institute2['iname']);									
				//swal("veriPort", "Access Granted, Welcome: " + user['f_name'] + " " + user['l_name'], "success");
				$("#dt").fadeIn(1000);
				$("#ref_numf2").fadeIn(500);
				$("#bTitle").hide();
			}
		});

		e.preventDefault();
	}
}