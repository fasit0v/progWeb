<?php

class Repository
{
    protected mysqli $con;

    public function __construct()
    {
        $this->con = new mysqli("localhost", "root", "", "progweb");
    }
}