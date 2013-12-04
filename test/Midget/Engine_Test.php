<?php
require_once 'Midget/Engine.php';

class Midget_Engine_Test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->engine = new Midget_Engine();
    }

    public function tearDown()
    {
        // your code here
    }

    /**
     * @covers Midget_Engine::compile
     */
    public function testCompile()
    {
    	$this->assertInstanceOf('Midget_Template', $this->engine->compile(''));
    }
    
}