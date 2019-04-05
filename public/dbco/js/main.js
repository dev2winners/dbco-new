// служебная функция //

function dump(obj, obj_name) {
	var result = ""
	for (var i in obj)
    result += obj_name + "." + i + " = " + obj[i] + "\n";
	return result
}

//\\ служебная функция \\

function toggleDb() { // для /lk/db
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

$('#cloudDb').on('click', toggleDb); // для /lk/db
$('#localDb').on('click', toggleDb); // для /lk/db
$('#icustomerbackup').on('change', changeBackupPeriod); // для /lk/db

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
	})
	.done(function (data, textStatus, xhr) {		
		console.log( 'Сервер вернул сакцесс)) data: '+data + '  textStatus: ' + textStatus + '   xhr: ' + xhr + '   ');
		console.log( 'this id: '+thisSwitchId );
		console.log( 'this name: '+thisSwitchName );
		console.log( 'Состояние свитча после аякса: '+$(that).is(':checked') ); //
		
		var serverData = JSON.parse(data);
		console.log( 'serverData: '+serverData.state ); //
		
		let chkd;
		chkd = (11 == serverData.state) ? true : false;
		$(that).prop('checked', chkd);
		
	})
	.fail(function(data, textStatus, xhr) {
		console.log( 'Сервер вернул ошибку data: '+data + '  textStatus: ' + textStatus + '   xhr: ' + xhr + '   '); //
		if('Forbidden' == xhr){
			window.location.href = '/login';
		}
	});
	
});