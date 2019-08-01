<?php
namespace Library\Task;

interface TaskInterface
{
    public function exec($job = null, $params = null);
}