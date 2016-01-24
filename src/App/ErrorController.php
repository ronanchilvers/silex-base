<?php 

namespace App;

class ErrorController
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
    public function errorAction(Application $app, \Exception $ex, $code)
    {
        if ($app['debug']) {
            return;
        }
        $plates   = $app['plates.engine'];
        $fullCode = $code;
        foreach ($this->templates as $template) {
            $template = str_replace('{code}', $code, $template) . '.html.twig';
            $code     = substr($code, 0, -1);
            if ($plates->exists($template)) {
                break;
            }
        };

        return $app->render($template, [
            'exception' => $ex,
            'code'      => $fullCode
        ]);
    }
}
