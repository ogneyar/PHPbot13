<?

// функция старта бота ИНФОРМАЦИЯ О ПОЛЬЗОВАТЕЛЯХ
function _start_InfoUsers_bota() {		

	global $mess_from_fName, $bot, $mess_chat_id;
	
	$bot->sendMess($mess_chat_id, "Добро пожаловать, *".$mess_from_fName."*", markdown);	
	
}

?>