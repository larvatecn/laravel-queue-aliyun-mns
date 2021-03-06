<?php

namespace Larva\Queue\AliyunMNS;

use AliyunMNS\Client;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Queue\Connectors\ConnectorInterface;
use Illuminate\Support\Arr;

/**
 * Class MNSConnector
 * @package Larva\Queue\AliyunMNS
 */
class MNSConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param array $config
     *
     * @return Queue
     */
    public function connect(array $config)
    {
        return new MNSQueue($this->getAdaptor($config), $config['queue'], Arr::get($config, 'wait_seconds'));
    }

    /**
     * @param array $config
     *
     * @return mixed
     */
    protected function getEndpoint(array $config)
    {
        return str_replace('(s)', 's', $config['endpoint']);
    }

    /**
     * @param array $config
     *
     * @return Client
     */
    protected function getClient(array $config)
    {
        return new Client($this->getEndpoint($config), $config['access_id'], $config['access_key'], $config['security_token']);
    }

    /**
     * @param array $config
     *
     * @return MNSAdapter
     */
    protected function getAdaptor(array $config)
    {
        return new MNSAdapter($this->getClient($config));
    }
}
