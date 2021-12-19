<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140460922-1"
        xmlns="http://www.w3.org/1999/html"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-140460922-1');
</script>

<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php
?>
<?php $this->beginBody() ?>
<!--<div class="wrap">-->
<?php

echo
Nav::widget([
    'items' => [
        'brandLabel' => '<a href="http://www.miur.gov.it/" target="_blank"><img src="./img/miur.png" class="image-left"></a>',
        'brandLabel2' => '<a href="http://www.sportescuola.gov.it" target="_blank"><img src="./img/studentisport.png" class="image-center"></a>',
        'brandLabel3' => '<a href="http://www.sportescuola.gov.it/area-amministrativa/" target="_blank"><img align="right" src="./img/campionatistudenteschi.png" class="image-right"></a>',
    ],
    'options' => ['class' => ' top-containter visible-md visible-lg', 'display' => 'flex', 'flex-direction' => 'row', 'flex-wrap' => 'wrap', ' width' => '33%'],
]);


NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'style' => 'background-color: "#e0a72c"',
        'background-color' => '#0f9fcf',
        'class' => 'navbar-inverse navbar-fixed-top',
        'style' => "position: sticky; top: 0;",
    ],
]);


echo
Nav::widget([
    'options' => [

        'class' => 'navbar-nav navbar-right',
        'background-color' => 'fff',
        'style' => "position: sticky; top: 0;",
    ],
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Regolamento', 'url' => ['/site/regole']],
        ['label' => 'Squadre', 'url' => ['/site/squadre']],
        ['label' => 'Classifica', 'url' => ['/site/classifica']],
        ['label' => 'Partite', 'url' => ['/site/partite']],
       ['label' => '3 Points Shoot Out', 'url' => ['/site/shot3']],
        ['label' => 'Run & Gun', 'url' => ['/site/torneo']],
        ['label' => 'Credits', 'url' => ['/site/credits']],

        User::isAdmin(Yii::$app->user) ? ['label' => 'Inserisci Partita', 'url' => ['/site/inseriscipartita']] : "",
        User::isAdmin(Yii::$app->user) ? ['label' => 'Inserisci Squadra', 'url' => ['/site/inseriscisquadra']] : "",

        Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' => ['/site/login'], 'margin' => 0]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['margin-block-end' => 0, 'style' => " .margin-bottom: 0px; margin-bottom: 0px;margin-bottom: 0px;"])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'margin' => 0]
            )
            . Html::endForm()
            . '</li>'
        ),

    ],
]);
NavBar::end();
?>
<div class="container home">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php
    ?>
    <?= $content ?>
</div>


<?php $this->endBody() ?>
</body>

<footer class="footer">
<div class="social-items">
<div class="social-item youtube">
<a href="https://www.youtube.com/channel/UCuHbx4bTopAzrOmjWPm_wbQ" target="_new">
<img src="https://www.myfiji.com/wp-content/uploads/sites/20/2019/03/white-youtube-play-button-png.png"></a>
</div>
<div class="social-item">
<a href="https://www.instagram.com/csbaskettv/" target="_new">
<img src="http://www.guernseynetball.gg/wp-content/uploads/2019/01/white-instagram-logo.png"></a>
</div>
</div>

    <a href="https://csbaskettv.tk/index.php?r=site%2Fcredits" style="text-decoration: none !important;">
        <h1>Creato da</h1><div class="creators">


            <div class="creator right">
                <img src="img/logorosselli.jpg">
            </div>

            <div class="creator left">
                <img src="img/logobarsanti.png">
            </div>
        </div>
    </a>
</footer>
</html>
<?php $this->endPage() ?>
