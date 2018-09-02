<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">

            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img src="/web/markup/assets/images/logo.png" alt=""></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="i_con"> 
                    <ul class="nav navbar-nav text-uppercase">
                       <?php if(Yii::$app->user->isGuest):?>
                           <li><a href="<?= Url::toRoute(['auth/login'])?>">Вход</a></li>
                       <?php else: ?>
                           <?= Html::beginForm(['/auth/logout'], 'post')
                           . Html::submitButton(
                               'Logout (' . Yii::$app->user->identity->name . ')',
                               ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                           )
                           . Html::endForm() ?>
                       <?php endif;?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<?php echo $content; ?>

<!--footer start-->
<footer class="footer-widget-section">
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2018 News Blog
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
