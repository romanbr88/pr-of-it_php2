<?php

namespace App;

class Logger
{
    protected string $logfile;
    protected array $data = [];

    public function __construct()
    {
        $this->logfile = Config::instance()->data['logfile'];
    }

    public function append(string $date, string $source, string $message)
    {
        $this->data[] = new LogItem($date, $source, $message);
        return $this;
    }

    public function save()
    {
        if (!empty($this->data)) {
            foreach ($this->data as $datum) {
                file_put_contents($this->logfile, $datum->getLog(), FILE_APPEND);
            }
        }
    }
}