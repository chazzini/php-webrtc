<?php

/**
 * get the base Path
 *
 * @param  string $path
 * @return string
 */
function basePath(string $path): string
{
    return __DIR__ . '/../' . $path;
}

function inspect($value)
{
    var_dump($value);
}