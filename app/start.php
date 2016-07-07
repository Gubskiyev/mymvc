<?php
error_reporting(1);
require_once 'core/model.php';
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/router.php';
require_once 'core/config.php';
require_once 'core/db.php';
Router::run();