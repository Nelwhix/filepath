<?php declare(strict_types=1);

namespace Nelwhix\Filepath;

require __DIR__ . '/../vendor/autoload.php';

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

        return rtrim(substr($path, 0, $lastIndex), "/");
    }

    public static function clean(string $dirtyPath): string {
        if ($dirtyPath === "") return ".";
        $dirtyPath = preg_replace("/\./", "", $dirtyPath);

        return rtrim(preg_replace('#/+#', '/', $dirtyPath), "/");
    }

    public static function ext(string $path): string {
        $base = Filepath::base($path);
        $lIndex = strrpos($base, ".");

        if (!$lIndex) {
            return "";
        }

        return substr($base, $lIndex);
    }

    public static function split(string $path): FileInfo {
        return new FileInfo(Filepath::base($path), Filepath::dir($path));
    }

    public static function walk(string $root, callable $callback): void {
        $iterator = new \DirectoryIterator($root);

        foreach ($iterator as $i) {
            $callback($i);
        }
    }

    public static function glob(string $pattern, string $root): array {
        $matches = [];
        Filepath::walk($root, function (\DirectoryIterator $i) use ($pattern, &$matches) {
            if (fnmatch($pattern, $i->getFilename())) {
                $matches[] = $i->getFilename();
            }
        });

        return $matches;
    }
}

var_dump(Filepath::dir("../todo.txt"));
