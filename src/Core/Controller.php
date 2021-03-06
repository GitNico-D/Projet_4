<?php

namespace App\src\Core;

use Exception;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected $loader;
    protected $twig;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $config = yaml_parse_file('../config/config.yml');
        $this->loader = new FilesystemLoader('../templates');
        $this->twig = new Environment($this->loader, array(
            "cache" => false,
            "debug" => true
        ));
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal("session", $_SESSION);
        $this->twig->addGlobal('locale', $config['APP_LOCALE']);
        $this->twig->addGlobal('charset', $config['APP_CHARSET']);
    }
    
    /**
     * render
     *
     * @param  mixed $view
     * @param  mixed $options
     * @return void
     */
    public function render($view, $options = [])
    {
        try {
            return $this->twig->render($view, $options);
        } catch (Exception $e) {
            throw new Exception("Template introuvable");
        }
    }
}
