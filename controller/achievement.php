<?php
class Achievement {
    private $achievementNo;
    private $game;
    private $achievement;
    private $console;
    private $dateAchieved;

    public function __construct($gameT, $achievementT, $consoleT, $dateAchievedT, $gameIdT = null) {
        $this->game = $gameT;
        $this->achievement = $achievementT;
        $this->console = $consoleT;
        $this->dateAchieved = $dateAchievedT;
        $this->gameId = $gameIdT;
    }
    //gets
    public function getAchievementNo() { return $this->achievementNo; }
    public function getGame() { return $this->game; }
    public function getAchievement() { return $this->achievement; }
    public function getConsole() { return $this->console; }
    public function getDateAchieved() { return $this->dateAchieved; }
    //sets
    public function setAchievementNo($temp) {$this->achievementNo = $temp;}
    public function setGame($temp) {$this->game = $temp;}
    public function setAchievement($temp) {$this->achievement = $temp;}
    public function setConsole($temp) {$this->console = $temp;}
    public function setDateAchieved($temp) {$this->dateAchieved = $temp;}
}