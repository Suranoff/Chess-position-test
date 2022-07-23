<?php

namespace App;

class ChessController
{
    /**
     * @param $params
     * @return void
     * @throws \Exception
     */
    public function actionPosition($params)
    {
        $position = PositionModel::getById($params[1]);

        // простой рендер view шаблонов
        include 'views/index.php';
    }
}