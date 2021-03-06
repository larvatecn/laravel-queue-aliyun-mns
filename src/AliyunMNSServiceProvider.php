<?php

namespace Larva\Queue\AliyunMNS;

use Illuminate\Support\ServiceProvider;

class AliyunMNSServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    public function boot()
    {
        $this->registerConnector($this->app['queue']);
        $this->commands('command.queue.mns.flush');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommand();
    }

    /**
     * Register the MNS queue connector.
     *
     * @param \Illuminate\Queue\QueueManager $manager
     *
     * @return void
     */
    protected function registerConnector($manager)
    {
        $manager->addConnector('mns', function () {
            return new MNSConnector();
        });
    }

    /**
     * Register the MNS queue command.
     * @return void
     */
    private function registerCommand()
    {
        $this->app->singleton('command.queue.mns.flush', function () {
            return new MNSFlushCommand();
        });
    }
}
