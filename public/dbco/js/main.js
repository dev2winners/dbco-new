function toggleDb() {
	var icustomerservertype;
	icustomerservertype = $('#backupdbcloud input[name=icustomerservertype]:radio:checked').val();	
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
		console.log( 'icustomerservertype: '+icustomerservertype+' data: '+data );
	});
	
}

function changeBackupPeriod() {
	
	var icustomerbackup;
	icustomerbackup = $('#icustomerbackup').val();
	//console.log( 'icustomerbackup: '+icustomerbackup);
	
	$.post({
		url: '/lk/db',
		data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'icustomerbackup': icustomerbackup}
		}).done(function (data) {		
		console.log( 'icustomerbackup: '+icustomerbackup+' data: '+data );
	});
	
}
	
// Shorthand for $( document ).ready()
$(function() {
    toggleDb();
});

$('#cloudDb').on('click', toggleDb);
$('#localDb').on('click', toggleDb);
$('#icustomerbackup').on('change', changeBackupPeriod);