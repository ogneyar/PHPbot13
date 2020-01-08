<?php 
// определяем кодировку
header('Content-type: text/html; charset=utf-8');

include_once '../vendor/autoload.php';

// токен из heroku config
$token = getenv("TOKEN_NEWTESTBOT");

// Мастер это Я
$master='351009636';

// Создаем объект бота
$bot = new Bot();

// Обрабатываем пришедшие данные
$bot->init('php://input');

/**
 * Class Bot
 */
class Bot
{
    // $token - созданный токен для нашего бота от @BotFather
    private $botToken = $token;
    // адрес для запросов к API Telegram
    private $apiUrl = "https://api.telegram.org/bot";

    public function init($data_php)
    {
        // создаем массив из пришедших данных от API Telegram
        $data = $this->getData($data_php);
        // id чата отправителя
        $chat_id = $data['message']['chat']['id'];
        
        // проверяем если пришло сообщение
        if ($data['message']['text']) {
        	// отправка сообщения в ответ
       		$this->sendMessage($chat_id, "Приветствую! Как дела?");         
        } else {
            	// если пришло что-то другое
                $this->sendMessage($chat_id, "Что это?");            
        }
    }

    // функция отправки текстового сообщения
    private function sendMessage($chat_id, $text)
    {
        $this->call([
            'chat_id' => $chat_id,
            'text' => $text,
        ], "sendMessage");
    }


    /**
     * Парсим что приходит преобразуем в массив
     * @param $data
     * @return mixed
     */
    private function getData($data)
    {
        return json_decode(file_get_contents($data), TRUE);
    }

    /** Отправляем запрос в Телеграмм
     * @param $data
     * @param string $type
     * @return mixed
     */
    private function call($data, $type)
    {
        $result = null;

        if (is_array($data)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->apiUrl . $this->botToken . '/' . $type);
            curl_setopt($ch, CURLOPT_POST, count($data));
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
        }
        return $result;
    }
}


exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>
