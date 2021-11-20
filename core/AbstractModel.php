<?php
abstract class AbstractModel{
    private $_url;
    private $_table;
    function __construct($url, $table = NULL){
        $this->_url = $url;
        if ($table != NULL){
            $this->_table = $table;
        }
        else{
            $this->_table = get_called_class();
        }
    }
    function getUrl(){
        return $this->_url;
    }
    function getTable(){
        return $this->_table;
    }
    abstract protected function get($in_data);
    abstract protected function post($in_data);
    abstract protected function patch($in_data);
    abstract protected function delete($in_data);
}
?>