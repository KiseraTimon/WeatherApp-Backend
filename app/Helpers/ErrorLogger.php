<?php

namespace App\Helpers;

use Throwable;

class ErrorLogger
{
    public static function message(string $text): void
    {
        if ($text === 'err') {
            $msg = "\n***\n[CRITICAL ERROR]...Try again later\n***\n";
        } elseif ($text === 'x') {
            $msg = "\n***\n[SYSTEM IS CLOSING]...Goodbye\n***\n";
        } else {
            $msg = "\n***\n$text\n***\n";
        }

        echo $msg;
    }

    public static function timestamp(): string
    {
        return now()->format('d-m-Y H:i:s');
    }

    public static function extract(Throwable $e): string
    {
        $type = get_class($e);
        $msg = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();

        return "Type:\n$type\n\nError Message:\n$msg\n\nOrigin:\n$file\n\nLine:\n$line";
    }

    public static function handle(Throwable $e, string $logger = 'laravel_error_log.txt'): void
    {
        $timestamp = self::timestamp();
        $errorDetails = self::extract($e);
        $logDir = base_path('logs');

        if (!file_exists($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logPath = $logDir . DIRECTORY_SEPARATOR . $logger;

        file_put_contents($logPath,
            "***\n--------------------------------------------------\nTIME OF OCCURENCE:---\n$timestamp\n\nERROR DETAILS:---\n$errorDetails\n---\n--------------------------------------------------\n\n",
            FILE_APPEND
        );

        self::message('err');
    }
}