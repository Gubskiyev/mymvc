<?php

class ControllerIndex extends Controller {
    public $title;

    public function actionIndex() {
        $this->title = 'Главная страница'.Config::SITENAME;

        $this->view->generate($this->title,'index_view.php','template.php');
    }
}
