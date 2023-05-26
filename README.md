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


