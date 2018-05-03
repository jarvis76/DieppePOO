
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
    public function frmGenerate(string $actionURI)
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
        $hiddenFieldName = array_key_exists('itemHiddenField', $conf) ? $conf['itemHiddenField']['name'] : false;
        if (isset($_POST[$hiddenFieldName])) {
            $errors = array();
            foreach($conf as $content) {
                if (isset($content['name']) && $content['name'] != "hiddenField") {
                    $value = $content['name'];
                    $$value = isset($_POST[$value])  ? $_POST[$value] : "" ;
                    if ($$value == "") array_push($errors, "Merci de saisir votre $value");
                }
            }
            if (count($errors) > 0) {
                $message = "<ul>";
                foreach ($errors as $msg) {
                    $message .= "<li>";
                    $message .= $msg;
                    $message .= "</li>";
                }
                $message .= "</ul>";
                echo $message;
            }
            else {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $adminPassword = hash ('sha256', $_POST['$mdp']);

                $sql = "INSERT INTO t_admin (ADMFIRSTNAME, ADMNAME, ADMMAIL, ADMPASSWORD)
                        VALUES ('$nom', '$prenom', '$mail', '$adminPassword')";

               $test = new Query();
               if($test->insertMethod($sql))
                   echo "ok";
               else
                   echo "NOK";
            }
        }
        else {
            return false;
        }
    }
}
