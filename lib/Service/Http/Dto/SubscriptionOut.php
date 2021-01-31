<?php
namespace OCA\Sendent\Service\Http\Dto;

use DateTime;
use OCA\Sendent\Db\License;
use JsonSerializable;

class SubscriptionOut implements JsonSerializable {

    protected $key;
    protected $amountusers;
    protected $amountusersmax;
    protected $level;
    protected $expirationdate;
    protected $grantinterval;
    protected $email;

    public function __construct() {

    }

    public function jsonSerialize() {
        return [
            'Key' => $this->key,
            'AmountUsers' => $this->amountusers,
            'AmountUsersMax' => $this->amountusersmax,
            'Level' => $this->level,
            'ExpirationDate' => $this->expirationdate,
            'GrantInterval' => $this->grantinterval,
            'Email' => $this->email
        ];
    }
}

?>