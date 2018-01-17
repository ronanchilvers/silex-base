<?php

namespace App;

use App\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

abstract class Controller
{
    /**
     * The application object
     *
     * @var App\Application
     */
    private $app;

    /**
     * Class constructor
     *
     * @param  App\Application $app
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Get the application object
     *
     * @return App\Application
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function app()
    {
        return $this->app;
    }

    /**
     * Get the session object
     *
     * @return Symfony\Component\HttpFoundation\Session\SessionInterface
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function session()
    {
        return $this->app()['session'];
    }

    /**
     * Render a template
     *
     * @param  string $view
     * @param  array $params
     * @param  Symfony\Component\HttpFoundation\Response
     * @return Symfony\Component\HttpFoundation\Response
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        if ('.html.twig' != substr($view, -10)) {
            $view .= '.html.twig';
        }

        return $this->app()->render($view, $parameters, $response);
    }

    /**
     * Render a JSON response
     *
     * @param $data
     * @return Symfony\Component\HttpFoundation\JsonResponse
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function json($data)
    {
        return new JsonResponse(
            $data
        );
    }

    /**
     * Redirect to a named route
     *
     * @param string $routeName
     * @param int $status
     * @return Symfony\Component\HttpFoundation\RedirectResponse
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function redirectToRoute($routeName, $parameters = [], $status = 302)
    {
        $generator = $this->app()['url_generator'];
        try {
            $url = $generator->generate(
                $routeName,
                $parameters
            );
        } catch (RouteNotFoundException $ex) {
            $url = $routeName;
        }

        return $this->redirect($url, $status);
    }

    /**
     * Redirect to the previous page
     *
     * @param string $defaultRouteName
     * @return Symfony\Component\HttpFoundation\RedirectResponse
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function redirectToPrevious(
        Request $request,
        $defaultRouteName,
        $parameters = []
    ) {
        $referer = $request->headers->get('referer');
        if (empty($referer)) {
            return $this->redirectToRoute(
                $defaultRouteName,
                $parameters,
                302
            );
        }

        return $this->redirect(
            $referer,
            302
        );
    }

    /**
     * Redirect to a url
     *
     * @param  string $url
     * @param  int $status
     * @return Symfony\Component\HttpFoundation\RedirectResponse
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function redirect($url, $status = 302)
    {
        return $this->app()->redirect($url, $status);
    }

    /**
     * Set a flash message
     *
     * @param string $type
     * @param string $message
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function flash($type, $message)
    {
        $this->app()['session']->getFlashBag()->add(
            $type,
            $message
        );
    }
}
