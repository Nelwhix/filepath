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
a url like this

## Usage
- Join Method:
Using the static 'join' method the code for the example earlier will
look like this:
```php
    $url = \Nelwhix\Filepath\Filepath::Join(__DIR__, 'src', 'routes.php');
    $routes = include($url);
```

