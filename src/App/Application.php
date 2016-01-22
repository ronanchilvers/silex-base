<?php

namespace App;

use Rych\Silex\Application\PlatesTrait;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{
    use PlatesTrait;

    /**
     * Get the base path of the application
     *
     * @return string
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function getBasePath()
    {
        return realpath(__DIR__ . '/../..');
    }
}
