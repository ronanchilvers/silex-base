<?php

namespace App\Console;

use App\Application;
use Symfony\Component\Console\Command\Command as ConsoleCommand;

class Command extends ConsoleCommand
{
    /**
     * Get the silex application
     *
     * @return App\Application
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function getSilexApplication()
    {
        return $this->getApplication()->getSilexApplication();
    }
}
