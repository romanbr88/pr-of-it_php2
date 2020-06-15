<?php


namespace Models;


class User extends \Model
{

    protected const TABLE = 'users';

    public string $emails;
    public string $phone;

}