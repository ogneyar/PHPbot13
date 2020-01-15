<?
// Подключаем библиотеку с классом Bot
include_once 'MyBotApi/Bot.php';
// Подключаем библиотеку с глобальными переменными
include_once 'a_conect.php';
//exit('ok');
$token = $tokenInfoUsers;

// Создаем объект бота
$bot = new Bot($token);

$id_bota = strstr($token, ':', true);	

// Группа администрирования бота (Админка)
$admin_group = $admin_group_InfoUsers;

// ФЛАГ ДЛЯ ВКЛЮЧЕНИЯ РЕЖИМА ОТЛАДКИ БОТА
$OtladkaBota = 'да';

// Подключение БД
$mysqli = new mysqli($host, $username, $password, $dbname);

// проверка подключения 
if (mysqli_connect_errno()) {
	$bot->sendMess($master, 'Чёт не выходит подключиться к MySQL');	
	exit('ok');
}else { 	

	// ПОДКЛЮЧЕНИЕ ВСЕХ ОСНОВНЫХ ФУНКЦИЙ
	include 'InfoUsersBibla/Functions.php';	
	
	// ПОДКЛЮЧЕНИЕ ВСЕХ ОСНОВНЫХ ПЕРЕМЕННЫХ
	include 'InfoUsersBibla/Variables.php';
	
	//$text = str_replace ("@TesterBotoffBot", "", $text);	
	
	//$this_admin = _this_admin();
	
	if ($mess_text == "/start"||$mess_text == "s"||$mess_text == "S"||$mess_text == "с"||$mess_text == "С"||$mess_text == "c"||$mess_text == "C"||$mess_text == "Старт"||$mess_text == "старт") {
		if ($mess_chat_type=='private') {
			_start_InfoUsers_bota();  			
		}	
	}
	
	// если пришло сообщение MESSAGE подключается необходимый файл
	if ($data['message']) include_once 'InfoUsersBibla/Message.php';		
}

// закрываем подключение 
$mysqli->close();		


exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>