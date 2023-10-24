<?php
require_once 'autoload.php';

use PHPUnit\Framework\TestCase;
use ToyRobot\ToyRobot;

class ToyRobotTest extends TestCase {

    public function testPlace() {
        $robot = new ToyRobot();
        $robot->place(0, 0, 'NORTH');
        $this->assertEquals("OutPut: 0, 0, NORTH", $robot->report());
    }

    public function testMove() {
        $robot = new ToyRobot();
        $robot->place(0, 0, 'NORTH');
        $robot->move();
        $this->assertEquals("OutPut: 0, 1, NORTH", $robot->report());
    }

    public function testLeft() {
        $robot = new ToyRobot();
        $robot->place(0, 0, 'NORTH');
        $robot->left();
        $this->assertEquals("OutPut: 0, 0, WEST", $robot->report());
    }

    public function testRight() {
        $robot = new ToyRobot();
        $robot->place(0, 0, 'NORTH');
        $robot->right();
        $this->assertEquals("OutPut: 0, 0, EAST", $robot->report());
    }

    public function testInvalidPlacement() {
        $robot = new ToyRobot();
        $robot->place(10, 10, 'NORTH');
        $this->assertEquals("OutPut: , , ", $robot->report());
    }

}