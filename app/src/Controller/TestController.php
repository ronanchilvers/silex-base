<?php

namespace App\Controller;

use App\Controller;

class TestController extends Controller
{
    /**
     * Test index action
     *
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function testAction()
    {
        return $this->render('test/index');
    }

    /**
     * For testing errors
     *
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function errorAction()
    {
        throw new \Exception('Test Exception');
    }
}
