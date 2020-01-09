<?php
echo "<center><h1>Начало: в принципе отличное, а то и превосходное!</h1></center>";

// определяем кодировку
//header('Content-type: text/html; charset=utf-8');

//include_once '../vendor/autoload.php';
include_once 'Bot.php';

// токен из heroku config
$token = getenv("TOKEN_NEWTESTBOT");

// Мастер это Я
$master = '351009636';

// Создаем объект бота
$bot = new \Bot($token);

// Обрабатываем пришедшие данные
$bot->init('php://input');

$bot->call('sendMessage', ['chat_id' => $master, 'text' => 'Крутебл']);

exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>
