<?php

namespace App;

class LogItem
{
    protected string $date;
    protected string $source;
    protected string $message;

    public function __construct(string $date, string $source, string $message)
    {
        $this->date = $date;
        $this->source = $source;
        $this->message = $message;
    }

    public function getLog()
    {
        return $this->date . ' | ' . $this->source . ' | ' . $this->message . PHP_EOL;
    }
}