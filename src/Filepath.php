<?php declare(strict_types=1);

namespace Nelwhix\Filepath;

class Filepath {
    public static function join(string ...$elements): string {
        $formattedPath = "";
        foreach ($elements as $element) {
            $formattedPath = $formattedPath . DIRECTORY_SEPARATOR . $element;
        }

        return $formattedPath;
    }

    public static function base(string $path): string {
        if (strlen($path) === 0) return ".";
        $lastIndex = strrpos($path, "/");

        if ($lastIndex === strlen($path) - 1) {
            $lastIndex = strrpos(substr($path, 0, $lastIndex), "/");
        }

        if (!$lastIndex) {
            return $path;
        }

       return substr($path, $lastIndex + 1);
    }

    public static function abs(string $path): string {
        return Filepath::join(__DIR__, $path);
    }

    public static function dir(string $path): string {
        if (strlen($path) === 0) return ".";
        if ($path === "..") return "..";
        $lastIndex = strrpos($path, "/");

        if ($lastIndex === false) {
            return ".";
        }

        if ($lastIndex === 0) {
            return "/";
        }

        return rtrim(substr(Filepath::clean($path), 0, $lastIndex), "/");
    }

    public static function clean(string $dirtyPath): string {
        return preg_replace('#/+#', '/', $dirtyPath);
    }

    public static function ext(string $path): string {
        $base = Filepath::base($path);
        $lIndex = strrpos($base, ".");

        return substr($base, $lIndex);
    }
}

var_dump(Filepath::dir("/foo/bar/baz.js"));


