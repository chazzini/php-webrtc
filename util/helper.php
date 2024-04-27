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

/**
 * inspect a value
 *
 * @param  mixed $value
 * @return void
 */
function inspect(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}
/**
 * inspect a value
 *
 * @param  mixed $value
 * @return void
 */
function inspectAndDie(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}


/**
 * load html view 
 *
 * @param  string $file
 * @return void
 */
function loadView($file, $param = [])
{
    $viewPath = basePath('App/Views/' . $file . '.view.php');
    if (file_exists($viewPath))
    {
        extract($param);
        require $viewPath;
    } else
    {
        echo "{$file} not found";
    }

}