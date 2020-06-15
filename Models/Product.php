<?php


namespace Models;


class Product extends \Model
{

    protected const TABLE = 'products';

    public string $title;
    public int $price;

}