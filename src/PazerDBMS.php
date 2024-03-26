<?php declare(strict_types=1);
namespace PazerDBMS;
class PazerDBMS {
    protected $_server;
    public function __construct() { return $this->reset(); }
    public function reset() : self { $this->_server = array(); return $this; }
    public function add(string $name, string $hostname, string $username, string $password, string $database, int $port = 3306, string $charset = "utf8mb4") : self {
        $info = new DatabaseInfo(); $info->hostname($hostname)->username($username)->password($password)->database($database)->port($port ?? 3306)->charset($charset ?? "utf8mb4");
        $this->_server[$name] = $info; return $this;
    }
    public function get(string $name) : ?DatabaseClient { if(!isset($this->_server[$name])) { return null; } return new DatabaseClient($this->_server[$name]); }
}
