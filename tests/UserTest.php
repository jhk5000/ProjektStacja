<?php

use PHPUnit\Framework\TestCase;
class UserTest extends TestCase {

    public function testGreetings()
    {
        $greetings = 'Hello World';
        $this->assertEquals('Hello World', $greetings);
    }

}