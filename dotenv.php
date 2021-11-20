<?php
class DotEnv{
    private $dotenvfilename = '.env';
    public function __construct($dotenv = NULL){
        if ($dotenv != NULL){
            $this->dotenvfilename = $dotenv;
        }
    }
    public function load(){
        $dotenvfile = fopen($this->dotenvfilename, "r") or die("Unable to open $this->dotenvfilename file!");
        while(!feof($dotenvfile)){
            $s = fgets($dotenvfile);
            $s = explode("=", $s, 2);
            $key = trim($s[0]);
            if(!(substr($key, 0, 1)==="#")){
                $val = trim($s[1]);
                $GLOBALS[$key] = $val;
            }
        }
        fclose($dotenvfile);
    }
}
?>