// служебная функция //
setInterval(get_status_solutions,5000);
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

$(document).on('click','#maincontent input:checkbox', function(event){
	
	event.preventDefault();
	var thisSwitchId = $(this).attr('id');
	var thisSwitchName = $(this).attr('name');
	var that = this;
	var	id_solution=+$(this).attr('solid');
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
		solution_in_load.push(id_solution)
		$('#sol_id_'+id_solution).html('<div class="spinner-border" role="status">\n' +
			'                        <span class="sr-only">Loading...</span>\n' +
			'                    </div>');
	})
	.fail(function(data, textStatus, xhr) {
		console.log( 'Сервер вернул ошибку data: '+data + '  textStatus: ' + textStatus + '   xhr: ' + xhr + '   '); //
		if('Forbidden' == xhr){
			window.location.href = '/login';
		}
	});
	
});


function get_status_solutions() {
console.log(solution_in_load);
$.ajax({
	method:'POST',
		url: "/getstatussolitions",
		data: {data:solution_in_load},
		success: function(data) {
			f = JSON.parse(data);
			console.log(f);
			for (key in f) {
				if(f[key]==='10'){
					$('#sol_id_'+key).html('<div class="spinner-border color_blue" role="status">\n' +
						'                        <span class="sr-only">Loading...</span>\n' +
						'                    </div>');
				}
				if(f[key]==='01'){
					$('#sol_id_'+key).html('<div class="spinner-border color_not_blue" role="status">\n' +
						'                        <span class="sr-only">Loading...</span>\n' +
						'                    </div>');
				}
				if(f[key]==='1'){
					$('#sol_id_'+key).html(`<div class="custom-control custom-switch">
                    <input type="checkbox" solid="`+key+`" class="custom-control-input" id="checkbox-switch-`+key+`"
                           name="checkbox-switch-`+key+`" checked
                        >
                    <label class="custom-control-label" for="checkbox-switch-`+key+`"></label>
                </div> `);
				}
				if(f[key]==='0'){
					$('#sol_id_'+key).html(`<div class="custom-control custom-switch">
                    <input type="checkbox" solid="`+key+`" class="custom-control-input" id="checkbox-switch-`+key+`"
                           name="checkbox-switch-`+key+`"
                        >
                    <label class="custom-control-label" for="checkbox-switch-`+key+`"></label>
                </div> `);
				}
			}
		}
	});
}
$(document).on('click','.star_cabinet',function () {
solid_1=$(this).data('solid');	$.ajax({
		method:'POST',
		url: "/setsolutionstate",
		data: {rating:$(this).data('rating'),solid:$(this).data('solid')},
		success: function(data) {
$('#rating_fild_'+solid_1).html(data);
		}
	});
});

$(document).on('click','.icustomerlegal',function () {
	 val=$(this).val();

	 if(val==0){
$('.fo_fl').show();
$('.fo_ul').hide();
	 }
	if(val==1){
		$('.fo_fl').hide();
		$('.fo_ul').show();
	}
});
$.fn.datepicker.defaults.format = "dd-mm-yyyy";
$('#dcustomerbirthday').datepicker({
	format :"yyyy-mm-dd"
});