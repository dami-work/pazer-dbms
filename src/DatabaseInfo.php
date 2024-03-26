<?php declare(strict_types=1);
namespace PazerDBMS;
class DatabaseInfo {
    protected $_info;
    public function __construct() { return $this->reset(); }
    public function reset() : self { $this->_info = array(); return $this; }
    protected function _get(string $name, $value = null) { if($value!==null) { $this->_info[$name] = $value; return $this; } else return $this->_info[$name]; }
    public function hostname(string $value = null) { return $this->_get(__FUNCTION__,$value); }
    public function username(string $value = null) { return $this->_get(__FUNCTION__,$value); }
    public function password(string $value = null) { return $this->_get(__FUNCTION__,$value); }
    public function database(string $value = null) { return $this->_get(__FUNCTION__,$value); }
    public function port(int $value = null) { return $this->_get(__FUNCTION__,$value); }
    public function charset(string $value = null) { return $this->_get(__FUNCTION__,$value); }
}
