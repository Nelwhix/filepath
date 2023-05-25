<?php

use Nelwhix\Filepath\Filepath;

it('returns the base of a path', function (string $path, string $base) {
    expect(Filepath::Base($path))->toBe($base);
})->with([
    ["/foo/bar/baz.js", "baz.js"],
    ["/foo/bar/baz", "baz"],
    ["dev.txt", "dev.txt"],
    ["../todo.txt", "todo.txt"],
    ["..", ".."],
    [".", "."],
    ["/", "/"],
    ["", "."],
]);
