<?php
// db/author.php
namespace OCA\sendent\db;

use OCP\AppFramework\Db\Entity;
use JsonSerializable;
class settingkey extends Entity implements JsonSerializable {

    protected $key;
    protected $name;
    protected $valuetype;
    protected $templateid;

    public function __construct() {
        // add types in constructor
        
    }
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'templateid' => $this->templateid,
            'valuetype' => $this->valuetype
        ];
    }
}