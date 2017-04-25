<?php

namespace App\Controller;

use App\Controller;
use DDesrosiers\SilexAnnotations\Annotations as SLX;

/**
 * @SLX\Controller
 * @author Ronan Chilvers <ronan@d3r.com>
 */
class TestController extends Controller
{
    /**
     * Test index action
     *
     * @SLX\Request(method="GET", uri="/")
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function testAction()
    {
        $db = $this->app()['spot2.locator'];
        // @TODO Remove var_dump
        var_dump($db); exit();
        return $this->render('test/index');
    }

    /**
     * For testing errors
     *
     * @SLX\Request(method="GET", uri="/test-error")
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function errorAction()
    {
        throw new \Exception('Test Exception');
    }
}
