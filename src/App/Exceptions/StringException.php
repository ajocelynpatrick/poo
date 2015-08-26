<?php

namespace App\Exceptions;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class AvailableException.
 */
class StringException extends \Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
        // create a log channel
        $log = new Logger('[String Exception]');
        $log->pushHandler(new StreamHandler('logs/app.log', Logger::WARNING));
        $log->addWarning("Un produit n'a pas une description correcte");
    }

    public function __toString()
    {
        return "Erreur de chaine de caractères: ".$this->message;
    }

}
