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

// работаем с чекбоксами-переключателями для солюшенов

$('#maincontent input:checkbox').on('click', function(event){
	
	event.preventDefault();
	var thisSwitchId = $(this).attr('id');
	var thisSwitchName = $(this).attr('name');
	var that = this;
	
	console.log( $(this).attr('id') );
	console.log( $(this).attr('solid') );
	console.log( 'Состояние свитча: '+$(this).is(':checked') ); //работает
	
	$.post({
		url: '/togglesolutionajax',
		data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'isolutionid': $(this).attr('solid')}
		}).done(function (data) {		
		console.log( ' data: '+data );
		console.log( 'this id: '+thisSwitchId );
		console.log( 'this name: '+thisSwitchName );
		console.log( 'Состояние свитча после аякса: '+$(that).is(':checked') ); //
		
		var serverData = JSON.parse(data);
		console.log( 'serverData: '+serverData.state ); //
		
		let chkd;
		chkd = (11 == serverData.state) ? true : false;
		$(that).prop('checked', chkd);
		
	});
	
});