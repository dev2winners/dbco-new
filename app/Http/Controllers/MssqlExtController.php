<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	
	class MssqlExtController extends Controller
	{
		public static function callMssqlProcedure($procedure_name) // принимает имя процедуры - вызывает ее на удаленном сервере
		{
			$serverName = "87.118.221.5,3314";
			$connectionOptions = array(
			"database" => "dbco",
			"uid" => "messager",
			"pwd" => "messager"
			);
			
			$conn = sqlsrv_connect($serverName, $connectionOptions);
			
			// вставить проверку-оповещение о соединении
			
			$tsql = $procedure_name;
			$stmt = sqlsrv_query($conn, $tsql);
			
			// вставить проверку-оповещение об успешном вызове процедуры
		}
	}
