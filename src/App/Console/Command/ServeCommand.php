<?php

namespace App\Console\Command;

use App\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ServeCommand extends Command
{
    /**
     * @author Ronan Chilvers <ronan@thelittledot.com>
     */
    protected function configure()
    {
        $this
            ->setName('serve')
            ->setDescription('Fire up the PHP builtin web server for development')
            ->addOption(
                'host',
                'H',
                InputOption::VALUE_REQUIRED,
                'Set the host address to use',
                'localhost'
            )
            ->addOption(
                'port',
                'P',
                InputOption::VALUE_REQUIRED,
                'Set the port to use',
                '9000'
            )
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $silex    = $this->getSilexApplication();
        $basePath = $silex->getBasePath();
        $host     = $input->getOption('host');
        $port     = $input->getOption('port');
        $php      = trim(exec('/usr/bin/which php'));
        $command  = "{$php} -S {$host}:{$port} -t {$basePath} {$basePath}/web/index_dev.php";
        $output->writeLn('<info>Starting built-in web server at ' . "{$host}:{$port}</info>");
        $output->writeLn('<comment>Command : ' . $command . '</comment>');
        $process = new Process($command);
        $process->start();
        $process->wait(function($type, $buffer) {
            $template = (Process::ERR == $type) ? "<red>%s</red>" : "<comment>%s</comment>";
            echo sprintf($template, $buffer);
        });
        $output->writeln('<info>Finished</info>');
    }
}
