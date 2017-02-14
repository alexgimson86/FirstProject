window.onload = function(){
	hideAll();
	$.ajax({
		type: "GET",
		url: "./php/getInfo.php",

		success: function(result){
			jQuery('#userInfo').append(result);
		},
		error: function(){
			//alert("error");
		}
	});
	
}
function editPerson(rowNum){
	$.ajax({
		type: "GET",
		url: "./php/editRow.php",

		success: function(result){
			jQuery('#userInfo').append(result);
		},
		error: function(){
			//alert("error");
		}
	});
}
function hideAll(){
	$('#addPersonForm').hide();
	$('#editPersonForm').hide();
	$('#deletePersonForm').hide();
}
function deleteData(){
	var rowNumber = $('#deleteOwnerId').val();
	$.ajax({
		type: "POST",
		url: "./php/deletePerson.php",
		data: {'rowNumber': rowNumber},
		success: function(result){
			jQuery('#userInfo').html('');
			jQuery('#userInfo').append(result);
		},
		error: function(){
			//alert("error");
		}
	});
}
function addData(){
	var name = jQuery("#name").val();
	var ownerId = jQuery('#ownerId').val();
	var expDate = jQuery('#expDate').val();
	var dateUpdated = jQuery('#dateUpdated').val();
	var prodCode = jQuery('#prodCode').val();
	
	
	$.ajax({
		type: "POST",
		url: "./php/addPerson.php",
		data:
		{
			'name': name,
			'ownerId': ownerId,
			'prodCode':prodCode,
			'dateUpdated':dateUpdated
		},

		success: function(result){
			jQuery('#userInfo').html('');
			jQuery('#userInfo').append(result);
			jQuery("#name").val('');
			jQuery('#ownerId').val('');
			jQuery('#prodCode').val('');
			jQuery('#dateUpdated').val('');
		},
		error: function(){
			//alert("error");
		}
	});
}
function editData(){
	var row = jQuery('#rowNumberEdit').val();
	$.ajax({
		type: "POST",
		url: "./php/editRow.php",
		data:
		{
			'row':row
		},

		success: function(result){
			jQuery('#userInfo').html('');
			jQuery('#userInfo').append(result);
			jQuery("#name").val('');
			jQuery('#ownerId').val('');
			jQuery('#prodCode').val('');
			jQuery('#dateUpdated').val('');
		},
		error: function(error){
			//alert(error);
		}
	});
}
function unhideAdd(){
	$('#addPersonForm').show();
	$('#editButton').hide();
	$('#addButton').hide();
	$('#deleteButton').hide();
	
}
function unhideEdit(){
	$('#editPersonForm').show();
	$('#editButton').hide();
	$('#addButton').hide();
	$('#deleteButton').hide();
	
}
function unhideDelete(){
	$('#deletePersonForm').show();
	$('#editButton').hide();
	$('#addButton').hide();
	$('#deleteButton').hide();
	
}