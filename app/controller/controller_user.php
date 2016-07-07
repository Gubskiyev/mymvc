<?php
class ControllerUser extends  Controller {
    public $title;

    public function actionIndex() {
        header('Location: /user/login');
    }

    public function actionLogin() {
        $this->title = 'Авторизация'.Config::SITENAME;

        if($_POST['login']) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if($login == 'admin' && $pass == 'admin') {
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['pass'] = $pass;
                header('Location: /index');
            } else {
                header('Location: /user/login');
            }
        }

        $this->view->generate($this->title,'login_view.php','template.php');
    }

    public function actionLogout() {
        session_start();
        session_destroy();
        header('Location: /user/login');
    }
}