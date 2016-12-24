<?php

namespace Soushi\Command;

class Ghpages implements \Soushi\Command
{
    use Base;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);
    }

    // ref. http://motemen.hatenablog.com/entry/2014/01/24/GitHub_pages_%E3%81%AB_push_%E3%81%99%E3%82%8B%E3%82%B7%E3%82%A7%E3%83%AB%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%97%E3%83%88
    function execute()
    {
        $remote = system("git config remote.origin.url");
        $rev    = system("git rev-parse HEAD | git name-rev --stdin");

        chdir($this->dstDir);
        $cdup = system("git rev-parse --show-cdup");
        if (!empty($cdup)) {
            system("git init");
            system("git remote add --fetch origin {$remote}");
        }

        if (system("git rev-parse --verify origin/gh-pages > /dev/null 2>&1")) {
            system("git checkout gh-pages");
        } else {
            system("git checkout --orphan gh-pages");
        }

        system("git add .");
        system("git commit -m 'pages built at {$rev} -e'");
        system("git push origin gh-pages");
    }
}
