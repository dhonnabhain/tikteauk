<?php

namespace App\Core;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class Storage
{
    private Filesystem $filesystem;

    public function __construct()
    {
        $adapter = new Local(__DIR__ . '/../../storage');
        $this->filesystem = new Filesystem($this->adapter);
    }

    public function write(string $content, string $path = '')
    {
        $this->filesystem->write($path, $content);
    }
}
