<?php

class UnionRobot implements UnionRobotInterface
{
    /**
     * @var array
     */
    protected $_robots;
    /**
     * @var float
     */
    protected $_weight;

    /**
     * @var float
     */
    protected $_height;

    /**
     * @var float
     */
    protected $_speed;

    /**
     * UnionRobot constructor.
     */
    public function __construct()
    {
        $this->_robots = [];
        $this->_weight = 0;
        $this->_height = 0;
        $this->_speed = 0;
    }

    /**
     * @param $robot
     * @return mixed
     */
    public function addRobot($robot)
    {
        if (is_array($robot)) {
            foreach ($robot as $item) {
                if ($item instanceof RobotInterface) {
                    $this->importRobot($item);
                } else {
                    throw new InvalidArgumentException();
                }
            }
        } else {
            if ($robot instanceof RobotInterface) {
                $this->importRobot($robot);
            } else {
                throw new InvalidArgumentException();
            }
        }
    }

    /**
     * Returns robot width.
     *
     * @return mixed
     */
    public function getWeight()
    {
        return $this->_weight;
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

    /**
     * Adds robot to union.
     * 
     * @param RobotInterface $robot
     */
    protected function importRobot(RobotInterface $robot) {
        $this->_weight += $robot->getWeight();
        $this->_height += $robot->getHeight();

        if (count($this->_robots) == 0)
            $this->_speed = $robot->getSpeed();
        else
            $this->_speed = min($this->_speed, $robot->getSpeed());

        $this->_robots[] = $robot;
    }
}