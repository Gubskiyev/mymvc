<?php
class ControllerNews extends Controller {

    public $title;

    public function __construct() {
        $this->view = new View();
        $this->model = new ModelNews();
    }

    public function actionIndex() {
        $this->title = 'Все новости'.Config::SITENAME;
        $data = $this->model->getAllNews();

        $this->view->generate($this->title,'news_view.php','template.php',$data);
    }

    public function actionView($id) {
        $this->title = 'Новость № '.$id;
        $data = $this->model->getNewsByID($id);
        var_dump($data);die;
        $this->view->generate($this->title,'news_view.php','template.php',$data);
    }
}