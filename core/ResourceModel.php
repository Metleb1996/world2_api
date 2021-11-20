<?php
class ResourceModel{
    private $_url
    private $_table
    function __construct($url, $table){
        $this->_url = $url;
        $this->_table = $table;
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