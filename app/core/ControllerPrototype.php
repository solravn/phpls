<?php

abstract class ControllerPrototype
{
    // todo $params

    // $params = ['name' => 'Artem',
    //            'surname' => 'Gafurov',
    //            'age' => 14 ]

    protected function render($view,$params = null)
    {
        $viewFile = $view . '.php';

        $viewFolderName = lcfirst(str_replace('Controller', '', static::class));

        $template = $this->renderContent(ROOT_DIR . '/view/template.php');
        $content  = $this->renderContent(ROOT_DIR . "/view/$viewFolderName/" . $viewFile);

        if (!empty($params)) {
            foreach ($params as $key => $param) {
                $content = str_replace('#' . strtoupper($key) . '#', $param, $content);
            }
        }

        echo str_replace("#CONTENT#", $content, $template);
    }

    private function renderContent($file)
    {
        // todo normalno deli

        if (!file_exists($file))
        {
            throw new Exception("Pizdec $file netu!");
        }

        ob_start();
        require $file;
        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
