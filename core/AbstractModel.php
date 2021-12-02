<?php
abstract class AbstractModel{
    protected $_url;
    protected $_table;
    protected $_db;
    protected $_data;
    public function __construct($idb, $url, $table = NULL){
        $this->_db = $idb;
        $this->_url = $url;
        $this->_data = array();
        if ($table != NULL){
            $this->_table = $table;
        }
        else{
            $this->_table = get_called_class();
        }
    }
    public function getUrl(){
        return $this->_url;
    }
    public function getTable(){
        return $this->_table;
    }
    abstract protected function get($in_data);
    abstract protected function post($in_data);
    abstract protected function patch($in_data);
    abstract protected function delete($in_data);
}
?>