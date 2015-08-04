<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'HOSxP Report รพ.ศรีวิไล จ.บึงกาฬ',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    
                    
//                ['label' => 'Home', 'url' => ['/site/index']],
//                ['label' => 'About', 'url' => ['/site/about']],
//                ['label' => 'Contact', 'url' => ['/site/contact']],
//                ['label' => 'Menu Panel', 'url' => ['/menupanal/index']],
//                [
//                   'label' => 'Dropdown',
//                   'items' => [
//                        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                        '<li class="divider"></li>',
//                        '<li class="dropdown-header"> <i class="glyphicon glyphicon-cog"></i> ตั้งค่า</li>',
//                        ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
//                    ],
//                ],
                    
                    
                   ['label' => 'REPORT-HOSxP', 'url' => ['main/index'], 'visible' => !Yii::$app->user->isGuest],
                    
                    Yii::$app->user->isGuest ?
                    
                    ['label' => '', 'url' => ['#']] :
                  
                    ['label' => 'STOKE&MI', 'items'=>[
                        ['label' => 'รายชื่อผู้ป่วยในทะเบียน', 'url' => ['pctpatient/index']],
                        ['label' => 'ลงทะเบียนรายใหม่ ', 'url' => ['pctpatient/create']],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header"><i class="glyphicon glyphicon-cog"></i> การตั้งค่า</li>',
                        ['label' => 'ตั้งค่าหมู่บ้าน', 'url' => ['pctmooban/index']],
                        ['label' => 'ตั้งค่ายา', 'url' => ['pctdrug/index']],        
                        //['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
                      
                         ]],
                    Yii::$app->user->isGuest ?
                    
                    ['label' => '', 'url' => ['#']] :
                  
                    ['label' => 'คืนข้อมูล รพ.สต.', 'items'=>[
                        ['label' => 'คืนข้อมูลผู้ป่วยนอก', 'url' => ['rpst/opd']],
                        ['label' => 'คืนข้อมูลผู้ป่วยใน ', 'url' => ['rpst/ipd']],
                        ['label' => 'คืนข้อมูลผู้ป่วยRefer ', 'url' => ['rpst/refer']],
                                
                        //['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
                      
                         ]],
                    
                    Yii::$app->user->isGuest ?
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                    ['label' => 'ผู้ใช้งาน(' . Yii::$app->user->identity->username . ')', 'items'=>[
//                    ['label' => 'Profile', 'url' => ['/user/settings/profile']],
//                    ['label' => 'ผู้ใช้งาน', 'url' => ['/user/settings/account']],
                    ['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
                      
                         ]],
                    
                                ],
                            ]
                    
                    );
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; BY IT <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
