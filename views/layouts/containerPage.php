<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140460922-1"></script>
<script>
    //function gtag(){dataLayer.push(arguments);}
  //  gtag('js', new Date());

    //gtag('config', 'UA-140460922-1');

    window.onscroll = function() {myFunction()};



    function myFunction() {
        var header = document.getElementsByClassName("navebarra");
        var sticky = header.offsetHeight;
        if (window.pageYOffset > 51) {
            header.classList.add("navbar-fixed-top");
        } else {
            header.classList.remove("navbar-fixed-top");
        }
    }
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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php
?>
<?php $this->beginBody();
echo Nav::widget([
    'items' => [
        'brandLabel' => '<a href="http://www.miur.gov.it/" target="_blank"><img src="http://sportescuola.gov.it/wp-content/uploads/2017/10/logo-miur-1.png"></a>',
        'brandLabel2' => '<img width="200"  src="http://www.sportescuola.gov.it/wp-content/uploads/2017/10/Logo-Miur_sito-internet-1024x576-1-1024x576-445x250.png">',
        'brandLabel3' => '<img  align="right" src="http://www.sportescuola.gov.it/wp-content/uploads/2017/09/logo_campionati2-e1506457310806.png">',
    ],
    'options' => ['class' =>' top-containter', 'display' => 'flex', 'flex-direction' => 'row', 'flex-wrap' => 'wrap', ' width' => '33%'], // set this to nav-tab to get tab-styled navigation
]);?>

<div class="wrap">



    <?php

    //echo
   //NAVBARS
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
            'id'=>'navebarra',
        'class' => 'navbar-fixed-top navebarra navbar-inverse ',//navbar-fixed-top
        //'class' => 'navbar navbar-expand-sm bg-dark navbar-dark sticky-top',//navbar-fixed-top
    ],
]);

NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?php
        ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; csbaskettv <?= date('Y') ?></p>

        <p class="pull-right">Powered by <a rel="nofollow" href="https://www.barsanti.edu.it/" hreflang="it" target="_blank">Barsanti</a> and <a rel="nofollow" href="https://www.istitutorosselli.net/" hreflang="it" target="_blank">Rosselli</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>