<?php
class RequestHandler{
    private $_resources = NULL;
    private $_data = NULL;
    private $_jsonArray = NULL;
    public function __construct(){
        $this->_resources = array();
        if($_SERVER["REQUEST_METHOD"] == 'GET'){
            $this->_data = $_GET;
        }
        else{
            $this->_data = json_decode(file_get_contents("php://input"));
        }
        $this->_jsonArray = array();
        $this->_jsonArray['_code'] = 200;
    }
    public function addResource($resource){
        $this->_resources[$resource->getUrl()] = $resource;
    }
    public function run(){
        if (array_key_exists('PATH_INFO', $_SERVER)){
            $url = $_SERVER['PATH_INFO'];
            if (array_key_exists($url, $this->_resources)){
                $res = $this->_resources[$url];
                switch($_SERVER["REQUEST_METHOD"]){
                    case "GET":
                        $res_data = $res->get($this->_data);
                        break;
                    case "POST":
                        $res_data = $res->post($this->_data);
                        break;
                    case "PATCH":
                        $res_data = $res->patch($this->_data);
                        break;
                    case "DELETE":
                        $res_data = $res->delete($this->_data);
                        break;
                }
                $this->_jsonArray['_code'] = $res_data['_code'];
                $this->_jsonArray['_data'] = $res_data['_data'];
                return $this->_jsonArray;
            }
        }
        $this->_jsonArray['_code'] = 404;
        $this->_jsonArray['_data'] = Helper::HttpStatus(404);
        return $this->_jsonArray;
    }
}
?>