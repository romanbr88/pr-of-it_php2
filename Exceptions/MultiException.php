<?php

namespace Exceptions;

class MultiException extends \Exception implements \Countable
{
    protected array $errors = [];

    public function addError(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function count()
    {
        return count($this->errors);
    }
}