<?php

namespace App\Controller;

use App\Controller;

class ErrorController extends Controller
{
    /**
     * Array of error template filenames
     *
     * @var string[]
     */
    protected $templates = [
        'error/{code}',
        'error/{code}X',
        'error/{code}XX',
        'error/default',
    ];

    /**
     * Test index action
     *
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    public function errorAction(\Exception $ex, $code)
    {
        if ($this->app()['debug']) {
            return;
        }
        // $engine   = $this->app()['twig'];
        // $loader   = $app['twig.loader.filesystem'];
        // $fullCode = $code;
        // $templates = [];
        // foreach ($this->templates as $template) {
        //     $template    = str_replace('{code}', $code, $template) . '.html.twig';
        //     $templates[] = $template;
        //     $code        = substr($code, 0, -1);
        // };

        return $this->render('error/default', [
            'exception' => $ex,
            'code'      => $code
        ]);
    }
}
