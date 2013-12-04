<?php
/**
 * Midget Engine
 * 
 * @category Midget
 * @package  Midget
 * @author   Olle Bröms <olle.broms@ewebbyran.se>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://midget.io/
 */

require_once 'Midget/Parser.php';

/**
 * Midget_Engine
 *
 * @category Midget
 * @package  Midget
 * @author   Olle Bröms <olle.broms@ewebbyran.se>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://midget.io/
 */
class Midget_Engine
{
    /**
     * @var  Midget_Parser A parser
     */
    protected $parser;

    /**
     * The constructor
     * 
     * @param array $config optional A configuration
     */
    public function __construct(array $config = array())
    {
        $this->setConfig($config);
    }

    /**
     * Configure the engine
     * 
     * @param array $config A configuration
     * 
     * @return Midget_Engine
     */
    public function setConfig(array $config)
    {
        foreach ($config as $property => $value) {
            $method = 'set' . ucfirst($property);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this;
    }

    /**
     * Compiles the string to an Midget_Template instance
     * 
     * @param string $text The template text
     * 
     * @return Midget_Template
     */
    public function compile($text)
    {
        return $this->getParser()->parse($text);
    }

    /**
     * Return the a Midget_Parser instance 
     * 
     * @return Midget_Parser
     */
    public function getParser()
    {
        if ($this->parser === null) {
            $this->setParser(new Midget_Parser());
        }

        return $this->parser;
    }

    /**
     * Set a parser
     * 
     * @param Midget_Parser $parser A midget parser
     * 
     * @return Midget_Engine
     */
    public function setParser(Midget_Parser $parser)
    {
        $this->parser = $parser;

        return $this;
    }
}