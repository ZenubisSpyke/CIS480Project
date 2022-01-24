<?php
class User {
    private $userId;
    private $profileName;
    private $passwordHash;
    private $email;

    public function __construct($profileNameT, $passwordHashT, $emailT, $userIdT = null) {
        $this->profileName = $profileNameT;
        $this->passwordHash = $passwordHashT;
        $this->email = $emailT;
        $this->userId = $userIdT;
    }
    //gets
    public function getUserId() { return $this->userId; }
    public function getProfileName() { return $this->profileName; }
    public function getPasswordHash() { return $this->passwordHash; }
    public function getEmail() { return $this->email; }
    //sets
    public function setUserId($temp) {$this->userId = $temp;}
    public function setProfileName($temp) {$this->profileName = $temp;}
    public function setPasswordHash($temp) {$this->passwordHash = $temp;}
    public function setEmail($temp) {$this->email = $temp;}
}