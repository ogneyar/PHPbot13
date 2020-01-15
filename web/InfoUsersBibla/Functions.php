<?

// функция старта бота ИНФОРМАЦИЯ О ПОЛЬЗОВАТЕЛЯХ
function _start_InfoUsers_bota() {		

	global $bot, $mess_chat_id, $mess_from_fName, $HideKeyboard;
	
	$bot->sendMess($mess_chat_id, "Добро пожаловать, *".$mess_from_fName."*!", markdown, $HideKeyboard);	
	
}

?>