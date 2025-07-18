<?php

interface ILogger
{
    public function log($message);
}

class FileLogger implements ILogger
{
    public function log($message)
    {
        echo sprintf("Log '%s' to the file<br>", $message);
    }
}

class DBLogger implements ILogger
{
    public function log($message)
    {
        echo sprintf("Log '%s' to the database<br>", $message);
    }
}

$fileLogger = new FileLogger();
$fileLogger->log("This is a file log message.");

$dbLogger = new DBLogger();
$dbLogger->log("This is a database log message.");

?>
