<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;


class ErController extends Controller
{
   public $enableCsrfValidation = false;
   public function actionIndex()
    {
        return $this->render('index');
    }
   
}