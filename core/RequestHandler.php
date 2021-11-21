<?php
class RequestHandler{
    private $_resources = NULL;
    private $_data = NULL;
    private $_jsonArray = NULL;
    public function __construct(){
        $this->_resources = array();
        $this->_data = json_decode(file_get_contents("php://input"));
        $this->_jsonArray = array();
        $this->_jsonArray['_code'] = 200;
    }
    public function addResource($resource){
        $this->_resources[$resource->getUrl()] = $resource;
    }
    public function run(){
        $url = $_SERVER['PATH_INFO'];
        $res = $this->_resources[$url];
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                
                break;
            case "POST":
                
                break;
            case "PATCH":
                
                break;
            case "DELETE":
                
                break;
        }
    }
}
?>