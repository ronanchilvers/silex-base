<?php

namespace App\Console;

use App\Application as AppApplication;
use Symfony\Component\Console\Application as ConsoleApplication;

class Application extends ConsoleApplication
{
    /**
     * Class constructor
     *
     * @param  App\Application $app The silex application object
     * @param  string $name
     * @param  string $version
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function __construct(AppApplication $app, $name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        parent::__construct($name, $version);
        $this->app = $app;
    }

    /**
     * Get the application object
     *
     * @return App\Application
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function getSilexApplication()
    {
        return $this->app;
    }
}
