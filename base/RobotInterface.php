<?php

interface RobotInterface
{
    /**
     * Returns robot weight.
     *
     * @return mixed
     */
    public function getWeight();

    /**
     * Returns robot height.
     * 
     * @return mixed
     */
    public function getHeight();

    /**
     * Returns robot speed.
     * 
     * @return mixed
     */
    public function getSpeed();
}
