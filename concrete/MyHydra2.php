<?php

class MyHydra2 implements RobotInterface
{
    /**
     * @var float
     */
    protected $_width;

    /**
     * @var float
     */
    protected $_height;

    /**
     * @var float
     */
    protected $_speed;

    /**
     * MyHydra1 constructor.
     */
    public function __construct($with = 0, $height = 0, $speed = 0)
    {
        if ($with < 0 || $height < 0 || $speed < 0) {
            throw new NegativeValueException('Robot must have only positive attributes.');
        }

        $this->_width = $with;
        $this->_height = $height;
        $this->_speed = $speed;
    }

    /**
     * Returns robot width.
     *
     * @return mixed
     */
    public function getWeight()
    {
        return $this->_width;
    }

    /**
     * Returns robot height.
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Returns robot speed.
     *
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->_speed;
    }
}
