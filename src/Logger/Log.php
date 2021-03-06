<?php

namespace App\Logger;

use App\Controllers\AppointmentController;


class Log
{

    public function __construct(string $action = '', string $message = '', int $id = null)
    {
        $this->time = date("Y-m-d H:i:s");
        $this->action = $action;
        $this->message = $message;
        $this->id = $id;
    }

    public function logInFile(): void
    {
        $data = [

            "time" => $this->time,
            "action" => $this->action,
            "message" => $this->message,
            "id" => $this->id,


        ];


        $json_string = json_encode($data, JSON_PRETTY_PRINT);
        $fileLog = fopen("src/Logger/Log.json", "a");
        fwrite($fileLog, $json_string."\n");
        fclose($fileLog);
    }
}
