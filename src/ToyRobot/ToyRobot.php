<?php

namespace ToyRobot;

class ToyRobot{
    // Initializing the variables
    private $x;
    private $y;
    private $facing;
    private $tableSize = 5;
    private const DIRECTIONS = ['NORTH', 'EAST', 'SOUTH', 'WEST'];
    # Square tabletop, dimensions validating.
    # Prevented from falling to destruction.
    private function isValidPosition($x, $y) {
        return ($x >= 0 && $x < $this->tableSize && $y >= 0 && $y < $this->tableSize);
    }

    # Place the bot on table with x,y coordinates and direction facing 
    # Commands PLACE X,Y,F
    public function place($x, $y, $facing) {
        //check if the bot placing
        if ($this->isValidPosition($x, $y)) {
            $this->x = $x;
            $this->y = $y;
            $this->facing = $facing;
        }
    }

    # Movement of a bot
    public function move() {
        $newX = $this->x;
        $newY = $this->y;

        switch ($this->facing) {
            case 'NORTH':
                $newY++;
                break;
            case 'SOUTH':
                $newY--;
                break;
            case 'EAST':
                $newX++;
                break;
            case 'WEST':
                $newX--;
                break;
        }
        // Validating the position of the bot after the update
        if ($this->isValidPosition($newX, $newY)) {
            $this->x = $newX;
            $this->y = $newY;
        }
    }

    public function left() {
        $this->turn('LEFT');
    }

    public function right() {
        $this->turn('RIGHT');
    }

    # Bot current location or updated location
    public function report() {
        return "OutPut: {$this->x}, {$this->y}, {$this->facing}";
    }

    # Bot turning left, right
    private function turn($direction) {
        

        $currentIdx = array_search($this->facing, self::DIRECTIONS);

        if ($direction === 'LEFT') {
            $newIdx = ($currentIdx + 3) % 4; // Rotate 90 degrees left
        } else {
            $newIdx = ($currentIdx + 1) % 4; // Rotate 90 degrees right
        }

        $this->facing = self::DIRECTIONS[$newIdx];
    }

    public function commandParsing($instructions){

        $commands = preg_split("/\r\n|\n|\r/", $instructions);
        foreach($commands as $command){
            if(!empty(trim($command))){
                $cmd = strtoupper($command);
                switch ($cmd) {
                    case str_contains($cmd, 'PLACE') == true:
                        $statement = explode(" ", $cmd);
                        $arg = explode(",", $statement[1]);
                        $this->place($arg[0],$arg[1], $arg[2]);
                        break;
                    case 'LEFT':
                        $this->left();
                        break;
                    case 'RIGHT':
                        $this->right();
                        break;
                    case 'MOVE':
                        $this->move();
                        break;
                    case 'REPORT':
                        return $this->report();
                        break;
                }
            }
        }
    }
}
