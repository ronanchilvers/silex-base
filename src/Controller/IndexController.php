<?php

namespace App\Controller;

use App\Controller;
use DDesrosiers\SilexAnnotations\Annotations as SLX;

/**
 * @SLX\Controller
 * @author Ronan Chilvers <ronan@d3r.com>
 */
class IndexController extends Controller
{
    /**
     * Index action
     *
     * @SLX\Route(
     *   @SLX\Request(method="GET", uri="/"),
     *   @SLX\Bind(routeName="home")
     * )
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function indexAction()
    {
        return $this->render('index/index');
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
