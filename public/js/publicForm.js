// form validation
	// RegExp email
	function validateEmail(email) {
		const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	  }
function validateFormPublic() {
	let name 		= $('#param_hoten').val();
	let dateBorn 	= $('#dob').val();
	let mail 		= $('#mail').val();
	let phoneNumber = $('#sdt').val();
	let school 		= $('#truong').val();
	let faculty 	= $('#khoa').val();
	let className 	= $('#lop').val();
	let studentCode = $('#masv').val();
	let img			= $('#image').val();
	let subject		= $('#mon').val();
	let error 		= $('.error');
	let check = true;

	if (name == null || name.trim() == "") {
		error[0].innerHTML = "<span>Họ và tên không được bỏ trống</span>";
		$('#param_hoten').focus();
		check = false; // cancel submission
	}else{
		error[0].innerHTML = "";
	}
	if (dateBorn == null || dateBorn.trim() == "") {
		error[1].innerHTML = "<span>Ngày sinh không được bỏ trống</span>";
		$('#dob').focus();
		check = false; // cancel submission
	}else{
		error[1].innerHTML = "";
	}
	if (mail == null || mail.trim() == "") {
		error[2].innerHTML = "<span>Email không được để trống</span>";
		$('#mail').focus();
		check = false; // cancel submission
	}else{
		error[2].innerHTML = "";
		if(!validateEmail(mail)){
			error[2].innerHTML = "<span>Định dạng email không đúng</span>";
			$('#mail').focus();
			check = false;
		}
	}
	if (phoneNumber == null || phoneNumber.trim() == "") {
		error[3].innerHTML = "<span>Số điện thoại không được để trống</span>";
		$('#sdt').focus();
		check = false; // cancel submission
	}else{
		let phoneLength = parseInt(phoneNumber.length);
		if(phoneLength == 10){
			error[3].innerHTML = "";
		}else{
			error[3].innerHTML = "<span>Số điện thoại không nhỏ hoặc lớn hơn 10 số</span>";
			$('#sdt').focus();
			check = false;
		}	
	}
	if (school == null || school.trim() == "") {
		error[4].innerHTML = "<span>Tên trường không được để trống</span>";
		$('#truong').focus();
		check = false; // cancel submission
	}else{
		error[4].innerHTML = "";
	}
	if (faculty == null || faculty.trim() == "") {
		error[5].innerHTML = "<span>Tên khoa không được để trống</span>";
		$('#khoa').focus();
		check = false; // cancel submission
	}else{
		error[5].innerHTML = "";
	}
	if (className == null || className.trim() == "") {
		error[6].innerHTML = "<span>Tên lớp không được để trống</span>";
		$('#lop').focus();
		check = false; // cancel submission
	}else{
		error[6].innerHTML = "";
	}
	if (studentCode == null || studentCode.trim() == "") {
		error[7].innerHTML = "<span>Mã sinh viên không được để trống</span>";
		$('#masv').focus();
		check = false; // cancel submission
	}else{
		error[7].innerHTML = "";
	}
	if (img == null || img.trim() == "") {
		error[8].innerHTML = "<span>Ảnh mình chứng không được để trống</span>";
		$('#image').focus();
		check = false; // cancel submission
	}else{
		error[8].innerHTML = "";
	}
	if (subject == null || subject.trim() == "") {
		error[9].innerHTML = "<span>Chọn môn dự thi</span>";
		$('#mon').focus();
		check = false; // cancel submission
	}else{
		error[9].innerHTML = "";
	}

	if(check){
		$("form").submit(); // allow submit
	}else {
		return false;
	}
}

function validateFormAccount() {
	let name 		= $('#param_hoten').val();
	let dateBorn 	= $('#dob').val();
	let mail 		= $('#mail').val();
	let phoneNumber = $('#sdt').val();
	let faculty 	= $('#khoa').val();
	let className 	= $('#lop').val();
	let studentCode = $('#masv').val();
	let subject		= $('#mon').val();
	let error 		= $('.error');
	let check = true;

	if (name == null || name.trim() == "") {
		error[0].innerHTML = "<span>Họ và tên không được bỏ trống</span>";
		$('#param_hoten').focus();
		check = false; // cancel submission
	}else{
		error[0].innerHTML = "";
	}
	if (dateBorn == null || dateBorn.trim() == "") {
		error[1].innerHTML = "<span>Ngày sinh không được bỏ trống</span>";
		$('#dob').focus();
		check = false; // cancel submission
	}else{		
		error[1].innerHTML = "";
	}
	if (mail == null || mail.trim() == "") {
		error[2].innerHTML = "<span>Email không được để trống</span>";
		$('#mail').focus();
		check = false; // cancel submission
	}else{
		// if(!validateEmail(mail)){
		// 	error[2].innerHTML = "<span>định dạng email không đúng</span>";
		// 	$('#mail').focus();
		// 	check = false;
		// }
		// error[2].innerHTML = "";
		error[2].innerHTML = "";
		if(!validateEmail(mail)){
			error[2].innerHTML = "<span>Định dạng email không đúng</span>";
			$('#mail').focus();
			check = false;
		}
	}
	if (phoneNumber == null || phoneNumber.trim() == "") {
		error[3].innerHTML = "<span>Số điện thoại không được để trống</span>";
		$('#sdt').focus();
		check = false; // cancel submission
	}else{
		let phoneLength = parseInt(phoneNumber.length);
		if(phoneLength == 10){
			error[3].innerHTML = "";
		}else{
			error[3].innerHTML = "<span>Số điện thoại không nhỏ hoặc lớn hơn 10 số</span>";
			$('#sdt').focus();
			check = false;
		}	
	}
	// if (school == null || school.trim() == "") {
	// 	error[4].innerHTML = "<span>tên trường không được để trống</span>";
	// 	$('#truong').focus();
	// 	check = false; // cancel submission
	// }else{
	// 	error[4].innerHTML = "";
	// }
	if (faculty == null || faculty.trim() == "") {
		error[4].innerHTML = "<span>Tên khoa không được để trống</span>";
		$('#khoa').focus();
		check = false; // cancel submission
	}else{
		error[4].innerHTML = "";
	}
	if (className == null || className.trim() == "") {
		error[5].innerHTML = "<span>Tên lớp không được để trống</span>";
		$('#lop').focus();
		check = false; // cancel submission
	}else{
		error[5].innerHTML = "";
	}
	if (studentCode == null || studentCode.trim() == "") {
		error[6].innerHTML = "<span>Mã sinh viên không được để trống</span>";
		$('#masv').focus();
		check = false; // cancel submission
	}else{
		error[6].innerHTML = "";
	}
	if (subject == null || subject.trim() == "") {
		error[7].innerHTML = "<span>Chọn môn dự thi</span>";
		$('#mon').focus();
		check = false; // cancel submission
	}else{
		error[7].innerHTML = "";
	}

	if(check){
		$("form").submit(); // allow submit
	}else {
		return false;
	}
}

