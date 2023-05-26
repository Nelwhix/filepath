<?php

namespace Nelwhix\Filepath;

class FileInfo
{
    public function __construct(public readonly string $file, public readonly string $dir) {}
}