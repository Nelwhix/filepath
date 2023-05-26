<?php

use Nelwhix\Filepath\Filepath;

it('returns the base of a path', function (string $path, string $base) {
    expect(Filepath::base($path))->toBe($base);
})->with([
    ["/foo/bar/baz.js", "baz.js"],
    ["/foo/bar/baz", "baz"],
    ["/foo/bar/baz/", "baz/"],
    ["dev.txt", "dev.txt"],
    ["../todo.txt", "todo.txt"],
    ["..", ".."],
    [".", "."],
    ["/", "/"],
    ["", "."],
]);

it('returns the path\'s directory', function (string $path, string $dir) {
    expect(Filepath::dir($path))->toBe($dir);
})->with([
    ["/foo/bar/baz.js", "/foo/bar"],
    ["/foo/bar/baz", "/foo/bar"],
    ["/foo/bar/baz/", "/foo/bar/baz"],
//    ["/dirty//path///", "/dirty/path"],
    ["dev.txt", "."],
    ["../todo.txt", ".."],
    ["..", ".."],
    [".", "."],
    ["/", "/"],
    ["", "."],
]);

it('returns the file extension from the path', function (string $path, string $ext) {
    expect(Filepath::ext($path))->toBe($ext);
})->with([
  ["index", ""],
    ["index.js", ".js"],
    ["main.test.js", ".js"]
]);

it('cleans filepaths', function ($dirtyPath, $cleanPath) {
    expect(Filepath::clean($dirtyPath))->toBe($cleanPath);
})->with([
    ["home/user7", "home/user7"],
    ["home//user7", "home/user7"],
    ["home/user7/.", "home/user7"],
    ["/../home/user7", "/home/user7"],
    ["", "."]
]);