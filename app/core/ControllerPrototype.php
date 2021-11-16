<?php

abstract class ControllerPrototype
{
    // todo $params

    protected function render($view, $params)
    {
        $viewFile = $view . '.php';

        $viewFolderName = lcfirst(str_replace('Controller', '', static::class));

        $template = $this->renderContent(ROOT_DIR . '/view/template.php');
        $content  = $this->renderContent(ROOT_DIR . "/view/$viewFolderName/" . $viewFile);

        echo str_replace("#CONTENT#", $content, $template);
    }

    private function renderContent($file)
    {
        // todo normalno deli

        if (!file_exists($file))
        {
            throw new Exception("Pizec $file netu!");
        }

        ob_start();
        require $file;
        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
