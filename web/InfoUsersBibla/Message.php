<?

// проверяем если пришло сообщение
if ($mess_text) {

	if ($data['message']['forward_from']) {	
		
		$reply = "Информация о пользователе:\n".
			"id: [".$mess_fFrom_id."](tg://user?id=".$mess_fFrom_id.")/n".
			"first_name: ".$mess_fFrom_fName."\n".
			"last_name: ".$mess_fFrom_lName."\n".
			"username: ".$mess_fFrom_uName;
		
		$bot->sendMess($mess_chat_id, $reply, markdown);	
		
	}else {

		// отправка сообщения в ответ
		$bot->sendMess($mess_chat_id, "Перешлите мне чьё либо сообщение, ".
			"я выдам информацию о лице, его написавшем");  

	}	
       
}else {

    // если пришло что-то другое
    $bot->call('sendMessage', ['chat_id' => $mess_chat_id, 'text' => "Чего это такое?"]);
}


?>