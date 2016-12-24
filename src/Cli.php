<?php

namespace Soushi;

class Cli
{
    function run(array $argv)
    {
        $subcommand = "usage";
        $args = [];

        if (count($argv) > 1) {
            $subcommand = $argv[1];
            $args = array_slice($argv, 2);
        }

        switch ($subcommand) {
            case 'init':
                $this->init($args);
                break;
            case 'server':
                $this->server($args);
                break;
            case 'build':
                $this->build($args);
                break;
            case 'gh-pages':
                $this->ghPages($args);
                break;
            default:
                $this->usage($argv[0]);
                break;
        }
    }

    private function usage(string $command)
    {
        echo "usage: {$command} [subcommand]\n";
        exit(1);
    }

    private function init(array $args)
    {
        $command = new \Soushi\Command\Init($args[0] ?? ".");
        $command->execute();
    }

    private function server(array $args)
    {
        $hostport = $args[0] ?? "127.0.0.1:8000";
        $docroot  = $args[1] ?? "public";

        pcntl_exec("/usr/bin/env", ["php", "-S", $hostport, "-t", $docroot]);
    }

    private function build(array $args)
    {
        $command = new \Soushi\Command\Build($args[0] ?? "build");
        $command->execute();
    }

    private function ghPages(array $args)
    {
        $command = new \Soushi\Command\Ghpages($args[0] ?? "build");
        $command->execute();
    }
}
