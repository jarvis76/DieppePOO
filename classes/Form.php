<?php
class Form
{
    public $path;
    public $file;
    public function __construct($p, $f)
    {
        $this->path = $p;
        $this->file = $f;
    }
    public function frmGenerate()
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        echo "<pre>";
        print_r($conf);
        echo "</pre>";
    }
    public function frmCheck()
    {
    }
}
