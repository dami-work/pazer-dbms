<?php declare(strict_types=1);
namespace PazerDBMS;
use mysqli;
class DatabaseClient {
    protected $_info;
    protected $_client;
    public function __construct(DatabaseInfo $info) { $this->_info = $info; $this->_client = null; return $this; }
    public function connect() : self {
        $this->_client = new mysqli($this->_info->hostname(), $this->_info->username(), $this->_info->password(), $this->_info->database(), $this->_info->port());
        if($this->_client->connect_error) { return $this->close(); } $this->_client->set_charset($this->_info->charset()); return $this;
    }
    public function close() : self { if($this->_client !== null) { $this->_client->close(); } $this->_client = null; return $this; }
    public function client() : ?mysqli { if($this->_client === null) { return null; } return $this->_client; }
}
