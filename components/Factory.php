<?php

class Factory
{
    /**
     * @var array
     */
    protected $_robots;

    /**
     * Adds new robot type.
     * 
     * @param RobotInterface $robot
     */
    public function addType(RobotInterface $robot) 
    {
        $this->_robots[get_class($robot)] = $robot;
    }

    /**
     * Returns current robots list.
     * 
     * @return array
     */
    public function getTypesList()
    {
        return $this->_robots;
    }

    /**
     * @param $name
     * @param $arguments
     * @return array
     * @throws UnknownTypeException
     * @throws InvalidArgumentException
     */
    public function __call($name, $arguments)
    {
        $type = str_replace('create', '', $name);
        
        if (empty($this->_robots[$type])) {
            throw new UnknownTypeException();
        }

        if (count($arguments) < 1) {
            throw new InvalidArgumentException();
        }

        $count = intval(array_shift($arguments));

        $res = [];

        for ($i = 0; $i < $count; $i++)
            $res[] = $this->_robots[$type];

        return $res;
    }
}