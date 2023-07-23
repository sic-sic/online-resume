<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

require_once 'src/Helpers/strings.php';

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {

    $redirect_uri = htmlspecialchars($_SERVER['REQUEST_URI']);
    $path = "src/Routes" . $redirect_uri;

    if (endsWith($path, ".php"))
        require $path;
    else if(file_exists($path.".php"))
        require $path.".php";
    else if (is_dir($path))
        require $path."/index.php";
    else
        throw new Exception("Unknwon url");

} else {
    echo $twig->render('index.html.twig');
}