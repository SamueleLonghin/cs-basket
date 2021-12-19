<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Squadra;
use app\models\Partita;
use yii\YouTube;

$this->title = $partita->Squadra_A->Nome." - ".$partita->Squadra_B->Nome;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= !Yii::$app->user->isGuest ? Html::a('Inserisci Risultato',['/site/inseriscipartita','id' =>$partita->Id],['class' => 'btn btn-primary']) :""?>
</div>
<style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px; height: 0; overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<div class="video-container">
    <?php echo $partita->UrlVideo?>
</div>