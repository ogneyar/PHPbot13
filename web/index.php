<?php
include_once 'Bot.php';

// токен из heroku config
$token = getenv("TOKEN");

// Мастер это Я
$master = '351009636';

// Создаем объект бота
$bot = new Bot($token);

// Обрабатываем пришедшие данные
$arr = $bot->init('php://input');

$chat_id = $arr['message']['chat']['id'];
        
// проверяем если пришло сообщение
if ($data['message']['text']) {
    // отправка сообщения в ответ
    $bot->call('sendMessage', ['chat_id' => $chat_id, 'text' => "Приветствую! Как дела?"]);         
} else {
    // если пришло что-то другое
    $bot->call('sendMessage', ['chat_id' => $chat_id, 'text' => "Чего это такое?"]);
}

exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>
