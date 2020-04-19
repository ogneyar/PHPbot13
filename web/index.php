<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->async(true);
$MadelineProto->loop(function () use ($MadelineProto) {
    yield $MadelineProto->start();

    $me = yield $MadelineProto->getSelf();

    $MadelineProto->logger($me);

    if (!$me['bot']) {
        yield $MadelineProto->messages->sendMessage(['peer' => '@Tester_Botoff', 'message' => "Hi!\nThanks for creating MadelineProto! <3"]);
        yield $MadelineProto->channels->joinChannel(['channel' => '@Prizm_market']);

        try {
            yield $MadelineProto->messages->importChatInvite(['hash' => 'https://t.me/joinchat/Pezt-E4wHBQHmczZIi5Syg']);
        } catch (\danog\MadelineProto\RPCErrorException $e) {
            $MadelineProto->logger($e);
        }

        yield $MadelineProto->messages->sendMessage(['peer' => 'https://t.me/joinchat/Pezt-E4wHBQHmczZIi5Syg', 'message' => 'Testing MadelineProto!']);
    }
    yield $MadelineProto->echo('OK, done!');
});