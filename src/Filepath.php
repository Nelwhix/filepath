<?php declare(strict_types=1);

namespace Nelwhix\Filepath;

class Filepath {
    public static function Join(string ...$elements): string {
        $formattedPath = "";
        foreach ($elements as $element) {
            $formattedPath = $formattedPath . DIRECTORY_SEPARATOR . $element;
        }

        return $formattedPath;
    }

    public static function Base(string $path): string {
        if (strlen($path) === 0) return ".";
        $lastIndex = strrpos($path, "/");

//        if ($lastIndex === strlen($path) - 1) {
//            $lastIndex = strrpos(substr($path, 0, $lastIndex), "/");
//        }

        if (!$lastIndex) {
            return $path;
        }

       return substr($path, $lastIndex + 1);
    }
}

var_dump(Filepath::Base("/foo/bar/baz/"));



