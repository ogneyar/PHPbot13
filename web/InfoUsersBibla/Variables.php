<?
// Обрабатываем пришедшие данные
$data = $bot->init('php://input');

// Вывод на печать JSON файла пришедшего от бота, в группу тестирования
if ($OtladkaBota == 'да') $bot->sendMess($test_group, PrintArr($data)); 

$update_id = $data['update_id'];

if ($data['message']){

	$message_id = $data['message']['message_id'];

	if ($data['message']['from']){
	
		$mess_from_id = $data['message']['from']['id'];
		$mess_from_fName = $data['message']['from']['first_name'];
		$mess_from_lName = $data['message']['from']['last_name'];
		$mess_from_uName = $data['message']['from']['username'];
		$mess_from_lang = $data['message']['from']['language_code'];
	}
	
	if ($data['message']['chat']){
	
		$mess_chat_id = $data['message']['chat']['id'];
		$mess_chat_fName = $data['message']['chat']['first_name'];
		$mess_chat_lName = $data['message']['chat']['last_name'];
		$mess_chat_uName = $data['message']['chat']['username'];
		$mess_chat_title = $data['message']['chat']['title'];
		$mess_chat_type = $data['message']['chat']['type'];
		
	}
		
	$mess_date = $data['message']['date'];
		
	if ($data['message']['forward_from']) {

		$mess_fFrom_id = $data['message']['forward_from']['id'];
		$mess_fFrom_fName = $data['message']['forward_from']['first_name'];
		$mess_fFrom_lName = $data['message']['forward_from']['last_name'];
		if ($mess_fFrom_lName=="") $mess_fFrom_lName = 'отсутствует';
		$mess_fFrom_uName = $data['message']['forward_from']['username'];
		if ($mess_fFrom_uName=="") $mess_fFrom_uName = 'отсутствует';

	}

	$mess_fDate = $data['message']['forward_date'];
	
	$mess_text = $data['message']['text'];
	
}elseif ($data['edited_message']){

}elseif ($data['channel_post']) {

}elseif ($data['edited_channel_post']) {

}elseif ($data['inline_query']) {

}elseif ($data['chosen_inline_result']) {

}elseif ($data['callback_query']) {

}elseif ($data['shipping_query']) {

}elseif ($data['pre_checkout_query']) {

}elseif ($data['poll']) {

}


$RKeyMarkup = ['keyboard' => [['text' => "Новая кнопка!"]]];
//,['text' => "Вторая новая кнопка!"]

$ReplyKeyboardMarkup = [
	'keyboard' => [
		[
			[
				'text' => "Новая кнопка!",
				'request_contact' => false,
				'request_location' => false,
			],
			[
				'text' => "Вторая новая кнопка!",
				'request_contact' => false,
				'request_location' => false,
			],
		],
	],
	'resize_keyboard' => false,
	'one_time_keyboard' => false,
	'selective' => false,
];

$HideKeyboard = [
	'hide_keyboard' => true,
    'selective' => false,
];

?>