<?php

namespace Library\Task\Queue\Connectors;

interface ConnectorInterface
{
    public function connect(array $config);
}
