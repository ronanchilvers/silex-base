<?php 

namespace App;

class TestController
{
    /**
     * Test index action
     *
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function testAction(Application $app)
    {
        return $app->render('test');
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
