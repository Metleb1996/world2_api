<?php
require_once('AbstractModel.php');
class UserModel extends AbstractModel{
    public function get($in_data){
        try {
            $stmt = $this->_db->prepare("SELECT NICK, NAME, SURNAME FROM "..$this->_table." WHERE PASSWORD = $in_data['password'] AND EMAIL = $in_data['email']");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->_data['_code'] = 200;
            $this->_data['_data'] = $result;
        } catch (PDOException $e) {
            $this->_data['_code'] = 500;
            $this->_data['_data'] = $e->getMessage();
        }
        return $this->_data;
    }
    public function post($in_data){
        try {
            $this->_db->exec("INSERT INTO ".$this->_table." (NICK, NAME, SURNAME, EMAIL, PASSWORD, LASTLOGIN, REGISTERED, VERIFIED, P_PICTURE) VALUES ($in_data['nick'], $in_data['name'], $in_data['surname'], $in_data['email'], $in_data['password'], $in_data['lastlogin'], $in_data['registered'], $in_data['verified'], $in_data['p_picture'])");
            $this->_data['_code'] = 201;
            $this->_data['_data'] = "New User created.";
        } catch (PDOException $e) {
            $this->_data['_code'] = 500;
            $this->_data['_data'] = $e->getMessage();
        }
        return $this->_data;
    }
    public function patch($in_data){
        try {
            $this->_db->exec("UPDATE ".$this->_table." SET NICK=$in_data['nick'], NAME=$in_data['name'], SURNAME=$in_data['surname'], EMAIL=$in_data['email'], PASSWORD=$in_data['password'], VERIFIED=$in_data['verified'], P_PICTURE=$in_data['p_picture']");
            $this->_data['_code'] = 201;
            $this->_data['_data'] = "User updated.";
        } catch (PDOException $e) {
            $this->_data['_code'] = 500;
            $this->_data['_data'] = $e->getMessage();
        }
        return $this->_data;
    }
    public function delete($in_data){
        try {
            $this->_db->exec("DELETE FROM ".$this->_table." WHERE  WHERE PASSWORD = $in_data['password'] AND EMAIL = $in_data['email']");
            $this->_data['_code'] = 200;
            $this->_data['_data'] = "User deleted.";
        } catch (PDOException $e) {
            $this->_data['_code'] = 500;
            $this->_data['_data'] = $e->getMessage();
        }
    }
}
?>