function toggleDb() {
	var icustomerservertype;
	icustomerservertype = $('#backupdbcloud input[name=icustomerservertype]:radio:checked').val();
	//alert(icustomerservertype);	
	if(icustomerservertype == 1){
	    $('#backupcloud').show();
		$('#backuplocal').hide();
		} else {
		$('#backuplocal').show();
		$('#backupcloud').hide();
	}
	
	$.post({
		url: '/lk/db',
		data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'icustomerservertype': icustomerservertype}
		}).done(function (data) {		
		//alert('Успешно! ' + icustomerservertype + data);		
	});
	
}

// Shorthand for $( document ).ready()
$(function() {
    toggleDb();
});