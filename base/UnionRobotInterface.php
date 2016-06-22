<?php

interface UnionRobotInterface extends RobotInterface
{
    /**
     * Adds new robot or robots if param is array.
     *
     * @param $robots
     * @return mixed
     */
    public function addRobot($robots);
}