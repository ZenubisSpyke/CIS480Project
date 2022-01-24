<?php
class Game {
    private $gameId;
    private $gameTitle;
    private $xbox;
    private $pS;
    private $steam;
    private $achievementTable;

    public function __construct($gameTitleT, $xboxT, $pST, $steamT, $achievementTableT, $gameIdT = null) {
        $this->gameTitle = $gameTitleT;
        $this->xbox = $xboxT;
        $this->pS = $pST;
        $this->steam = $steamT;
        $this->achievementTable = $achievementTableT;
        $this->gameId = $gameIdT;
    }
    //gets
    public function getGameId() { return $this->gameId; }
    public function getGameTitle() { return $this->gameTitle; }
    public function getXbox() { return $this->xbox; }
    public function getPS() { return $this->pS; }
    public function getSteam() { return $this->steam; }
    public function getAchievementTable() { return $this->achievementTable; }
    //sets
    public function setGameId($temp) {$this->gameId = $temp;}
    public function setGameTitle($temp) {$this->gameTitle = $temp;}
    public function setXbox($temp) {$this->xbox = $temp;}
    public function setPS($temp) {$this->pS = $temp;}
    public function setSteam($temp) {$this->steam = $temp;}
    public function setAchievementTable($temp) {$this->achievementTable = $temp;}
}