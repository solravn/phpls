<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class ControllerPrototype
{
    // todo $params

    protected function render($view, $params = [])
    {
        $viewFile = $view . '.php';
        $template = $this->renderContent(APP_DIR . '/view/template.php', $params);
        $content  = $this->renderContent($this->getControllerViewPath() . $viewFile, $params);

        echo str_replace("#CONTENT#", $content, $template);
    }

    protected function renderTwig($view, $params = [])
    {
        $loader = new FilesystemLoader($this->getControllerViewPath());
        $twig   = new Environment($loader);

        echo $twig->render($view . '.twig', $params);
    }

    protected function getControllerViewPath()
    {
        $viewFolderName = lcfirst(str_replace('Controller', '', static::class));

        return APP_DIR . "/view/$viewFolderName/";
    }

    private function renderContent($file, $params)
    {
        // todo normalno deli

        if (!file_exists($file))
        {
            throw new Exception("Pizec $file netu!");
        }

        extract($params);

        ob_start();
        require $file;
        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
