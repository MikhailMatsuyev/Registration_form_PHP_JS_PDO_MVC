<?php

include Q_PATH.'/application/core/controller.php';
include Q_PATH.'/application/core/model.php';
include Q_PATH.'/application/core/view.php';
include Q_PATH.'/application/core/route.php';
include Q_PATH.'/application/lib/path.php';
include Q_PATH.'/application/lib/config.php';
include Q_PATH.'/application/lib/db.php';

//запускается application/core/route.php
$router = new Router();
$router->run();
