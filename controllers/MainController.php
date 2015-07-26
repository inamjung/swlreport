<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;


class MainController extends Controller
{
    public function actionIndex(){
        
        return $this->render('index');
    }
    
}