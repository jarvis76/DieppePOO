<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 26/04/2018
 * Time: 16:55
 */

namespace Tools;


class Querie
{
    private $dsn = "mysql:dbname=esaywedding;host=localhost;charset=utf8";
    private $user = "christopher";
    private $password = "talen";
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch (PDOException $e) {
            Log::logWrite($e->getMessage());
        }
    }
    public function selectMethod($sql)
    {
    }
}
