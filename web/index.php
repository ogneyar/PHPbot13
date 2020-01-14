<?php
// Подключаем библиотеку с классом Bot
include_once 'Bot.php';
// Подключаем библиотеку с глобальными переменными
include_once 'Conect.php';

// Создаем объект бота
$bot = new Bot($token);

// Обрабатываем пришедшие данные
$data = $bot->init('php://input');

$chat_id = $data['message']['chat']['id'];
        
// проверяем если пришло сообщение
if ($data['message']['text']) {
    // отправка сообщения в ответ
    $bot->call('sendMessage', ['chat_id' => $chat_id, 'text' => "Приветствую! Как дела?"]);  

$bot->call('sendMessage', [
   'chat_id' => $chat_id,
   'text' => "[a cho?](tg://user?id=1038937592)",
   'parse_mode' => 'markdown'
]);

       
} else {
    // если пришло что-то другое
    $bot->call('sendMessage', ['chat_id' => $chat_id, 'text' => "Чего это такое?"]);
}

exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>
