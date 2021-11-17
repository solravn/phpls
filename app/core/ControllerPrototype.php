<?php

abstract class ControllerPrototype
{
    // todo $params

    // $params = ['name' => 'Artem',
    //            'surname' => 'Gafurov',
    //            'age' => 14 ]

    protected function render($view,$params = [])
    {
        $viewFile = $view . '.php';

        $viewFolderName = lcfirst(str_replace('Controller', '', static::class));

        $template = $this->renderContent(ROOT_DIR . '/view/template.php', $params);
        $content  = $this->renderContent(ROOT_DIR . "/view/$viewFolderName/" . $viewFile, $params);

//        if (!empty($params)) {
//            foreach ($params as $key => $param) {
//                $content = str_replace('#' . strtoupper($key) . '#', $param, $content);
//            }
//        }

        echo str_replace("#CONTENT#", $content, $template);
    }

    private function renderContent($file, $params)
    {
        // todo normalno deli

        if (!file_exists($file))
        {
            throw new Exception("Pizdec $file netu!");
        }

//        extract($params);

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require $file;
        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
