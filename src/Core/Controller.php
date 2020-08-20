<?php

namespace App\src\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use Exception;

abstract class Controller
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $config = yaml_parse_file('../config/config.yml');
        $this->loader = new FileSystemLoader('../templates');
        $this->twig = new Environment($this->loader, array(
            "cache" => false,
            "debug" => true
        ));
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal("session", $_SESSION);
        $this->twig->addGlobal('locale', $config['APP_LOCALE']);
        $this->twig->addGlobal('charset', $config['APP_CHARSET']);
    }

    public function render($view, $options = [])
    {
        try {
            return $this->twig->render($view, $options);
        } catch (Exception $e) {
            throw new Exception("Template introuvable");
        }
    }
}
