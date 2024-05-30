<?php

namespace app\controllers;

use app\models\Randomnums;
use yii\rest\ActiveController;
use yii\web\HttpException;

class RandomnumController extends ActiveController
{
    public $modelClass = 'app\models\Randomnums';

    public function actionGenerate(){
        $model = new Randomnums();
        $model -> num = random_int(0,999);
        $model -> save();
        return $model;
    }

    public function actionRetrieve($id){
        if (!is_numeric($id)){
            throw new HttpException(400 ,'ID not numeric');
        }
        $num = Randomnums :: findOne($id);
        if ($num === NULL){
            throw new HttpException(404 ,'ID not found');
        }
        return $num ;
    }

}