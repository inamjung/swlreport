<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;


class MainController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=> ['index'],
                'ruleConfig'=>[
                    'class'=>AccessRule::className()
                ],
                'rules'=>[
                    [
                        'actions'=>['index'],
                        'allow'=> true,
                        'roles'=>[
                           // User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN

                        ]
                    ],                                     
                ]
            ]
        ];
    }
    public function actionIndex(){
        
        return $this->render('index');
    }
    
}