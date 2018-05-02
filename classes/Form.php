
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
    public function frmGenerate($actionURI)
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        $form = "<form method='post' action='$actionURI'>";
        foreach($conf as $content) {
            $form .= "<div>";
            if (isset($content['name']) && $content['type'] != "hidden") {
                $form .= "<label for='" . $content['name'] . "'>";
                $form .= ucfirst($content['name']);
                $form .= "&nbsp;: ";
                $form .= "</label>";
            }
            $form .= "<";
            $form .= $content['tag'];
            $form .= " ";
            $form .= "type='";
            $form .= $content['type'];
            $form .= "' ";
            $form .= isset($content['name']) ? "name='" . $content['name'] . "'" : "";
            $form .= " />";
            $form .= "</div>";
        }
        $form .= "</form>";
        return $form;
    }
    public function frmCheck()
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);

        $hiddenFieldName = array_key_exists('itemHiddenField', $conf) ? $conf['itemHiddenField']['name'] : false ;

        var_dump($hiddenFieldName);



    }
}
