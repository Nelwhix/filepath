# Filepath
A simple class with some static methods for manipulating file paths properly
regardless of system architecture

## Motivation
I was working on a legacy PHP project where there was all sort of code like 
this:
```php 
    $routes = include(__DIR_ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'routes.php');
```

I then remembered that golang's filepath package would fluently join
a url like this. So this is a port of the methods in golang's path/filepath
package

## Installation
```bash
    composer require nelwhix/filepath
```

## Usage
- Join Method:
Using the static 'join' method the code for the example earlier will
look like this:
```php
    $url = \Nelwhix\Filepath\Filepath::join(__DIR__, 'src', 'routes.php');
    $routes = include($url);
```

- Base method:
The base method returns the last part of any filepath passed to it. Like 
this:

```php
    \Nelwhix\Filepath\Filepath::base("/foo/bar/baz.js");
    // this will return "baz.js"
```

- Abs method:
The abs method returns the absolute path to the filepath given:

```php
    \Nelwhix\Filepath\Filepath::abs("Filepath.php");
    // this returns "\C:\Users\USER PC\Documents\Open Source contributions\filepath\src\Filepath.php"
```

- Dir method:
The dir method returns the directory in a path:

```php
    \Nelwhix\Filepath\Filepath::dir("/foo/bar/baz.js")
    // returns "/foo/bar"
```

- clean method:
The clean method removes double and trailing slashes from a filepath e.g.

```php
    \Nelwhix\Filepath\Filepath::clean("//dirty///path////");
    // this returns /dirty/path
```

- ext method:
The ext method returns the extension of the file in the filepath.
if a directory is passed it returns an empty string.

```php
    \Nelwhix\Filepath\Filepath::ext("/src/routes.php");
    // returns ".php"
```

- split method:
The split method returns an object that contains the directory
and file from the filepath

```php
    $split = \Nelwhix\Filepath\Filepath::split("./Documents/side-projects/filepath/composer.json");
    $split->dir; // ./Documents/side-projects/filepath
    $split->file; // composer.json
```

- walk method:
The walk method takes a directory and a callback function to run
on each file in the directory.

```php
    Filepath::walk("C:\Users\USER PC\Documents\\300L books", function (\DirectoryIterator $param) {
        if($param->isDot()) return;
        echo $param->getFilename() . "\n";
    });
```

- glob method:
The glob method returns all the files in a directory that match a pattern.
To return all the files ending in ".php":

```php
    Nelwhix\Filepath\Filepath::glob(".php", "side-projects/src");
    // returns an array containing the files matching the pattern
```

