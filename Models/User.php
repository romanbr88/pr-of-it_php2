<?php


namespace Models;


class User extends \Model
{

    protected const TABLE = 'users';

    public string $email;
    public string $phone;

}