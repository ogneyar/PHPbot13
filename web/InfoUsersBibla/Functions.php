<?

// функция старта бота ИНФОРМАЦИЯ О ПОЛЬЗОВАТЕЛЯХ
function _start_InfoUsers_bota() {		

	global $bot, $mess_chat_id, $mess_from_fName, $HideKeyboard, $ReplyKeyboardMarkup, $RKeyMarkup, $InlineKeyboardMarkup;
	
	$bot->sendMess($mess_chat_id, "Добро пожаловать, *".$mess_from_fName."*!", markdown, json_encode($InlineKeyboardMarkup));	
	
}

// функция вывода на печать массива
function PrintArr($mass, $i=0) {
	
	global $flag;
		
	$flag .= "\t\t\t\t";			
		
	foreach($mass as $key[$i] => $value[$i]) {				
		if (is_array($value[$i])) {
				$_this .= $flag . $key[$i] . " : \n";
				$_this .= PrintArr($value[$i], ++$i);
		}else $_this .= $flag . $key[$i] . " : " . $value[$i] . "\n";
	}
	$str = $flag;
	$flag = substr($str, 0, -4);
	return $_this;
}

?>