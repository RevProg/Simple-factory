<?php

interface RobotInterface
{
    /**
     * Returns robot width.
     *
     * @return mixed
     */
    public function getWidth();

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