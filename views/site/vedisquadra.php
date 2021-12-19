<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Squadra;
use app\vendor\lesha724;

$this->title = $squadra->Nome;
$this->params['breadcrumbs'][] = $this->title;

?>
<!--
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
</div>


<?= Html::label($squadra->Descrizione) ?>
<div style="display: inline-block">
    <div style="flex-direction: row">
    </div>
    <div style="flex-direction: row">
        <img src="<?php echo $squadra['LogoRegione'] ?>">
    </div>
</div>

<?php/* echo GridView::widget([
    //PARTITE
    'dataProvider' => $partite,
    'rowOptions' => function ($model, $key, $index, $grid) {
        return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fvedipartita' . '&id="+(this.id);'];
    },
    'showHeader' => false,
    'columns' => [
        ['attribute' => 'Nome_A',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
        ['attribute' => 'Punti_A',],
        ['attribute' => 'Punti_B',],
        ['attribute' => 'Nome_B',],
    ]

]);*/
?>

<?php /*echo GridView::widget([
    //CLASSIFICA
    'dataProvider' => $squadre,
    'rowOptions' => function ($model, $key, $index, $grid) {

        return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq' . '&id="+(this.id);'];
    },
    'columns' => [
        ['attribute' => 'Nome',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
        ['attribute' => 'Punti',],
        ['attribute' => 'Puntifatti',],
        ['attribute' => 'Puntisubiti',],
    ]


]);*/
?>
<h3>Video Promo</h3>
-->
<style>

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position:absolute;
        top: 56;
        left: 0;
        width: 100%;
        height:100%;
    }

    .video-container iframe{
        padding-bottom:56;
        padding-left:15;
        padding-right:15
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-xs-12" >
            <div class="col-xs-12" style="display: flex;flex-wrap:wrap">
                <div style="height:200;margin-right:20">
                    <img src="<?= $squadra['LogoRegione'] ?>" style="height:100%;">
                </div>
                <div style="display:flex;flex-direction:column">
                    <div style="height:100%"></div>
                    <div class="site-about">
                        <h1><b><?= Html::encode($this->title) ?></b></h1>
                        <a href="<?= $squadra['UrlSito'] ?>">Vai al sito</a>
                    </div>
                    <div style="height:100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:20;display:flex;flex-wrap:wrap">

        <div class="col-xs-12  col-md-6">
            <h3><?= "Classifica Girone" ?></h3>
    <!--
            <?php /* echo GridView::widget([
            //CLASSIFICA
            'dataProvider' => $squadre,
            'summary'=>'',
            'rowOptions' => function ($model, $key, $index, $grid) {

                return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq' . '&id="+(this.id);'];
            },
            'columns' => [
                ['attribute' => 'Nome',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
                ['attribute' => 'Punti',],
                ['attribute' => 'Puntifatti',],
                ['attribute' => 'Puntisubiti',],
            ]
            ]);*/
            ?>
-->

                    
        <?php foreach($squadre as $squadrac){
            stampaSquadraClassifica($squadrac);
        } ?>
        </div>

        <div class="col-xs-12 col-md-6" style="display:flex;flex-direction:column">
            <div style="flex-grow:1"><h3>Video promo</h3></div>
            <div class="video-container" style="width:100%;height:100%;min-height:360">
                <?= $squadra['UrlVideo'] ?>
            </div>
        </div>
    </div>
    <div style="margin-top:20">
        <div class="col-xs-12">
            <h3>Partite</h3>
            <?php /*echo GridView::widget([
            //PARTITE
            'dataProvider' => $partite,
            'summary'=>'',
            'rowOptions' => function ($model, $key, $index, $grid) {
                return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fvedipartita' . '&id="+(this.id);'];
            },
            'showHeader' => false,
            'columns' => [
                ['attribute' => 'Nome_A',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
                ['attribute' => 'Punti_A',],
                ['attribute' => 'Punti_B',],
                ['attribute' => 'Nome_B',],
            ]
            ]);
            */?>
            <?php
            
            //var_dump($partite);
            foreach($partite as $key => $pr){
                stampaPartita($pr);
            } ?>

        </div>
    </div>
</div>

<?php
function stampaSquadraClassifica($squadra){
?>

    <div style="width:100%;margin-top:10">
        <a style="width:100%;"  href="index.php?r=site%2Fsq&id=<?= $squadra['Id'] ?>">
            <div class="btn btn-default" style="white-space:normal;display:flex;">

                <div style="min-width:60px">
                    <img src="<?php echo $squadra['LogoRegione'] ?>" style="height:100%;max-height:55">
                </div>
                <div style="display:flex;flex-direction:column;width:82%;margin-left:auto; margin-right:0;align-self: center;">
                    <div style="margin-top:5">
                        <strong><?= $squadra['Nome'] ?></strong>
                    </div>
                    <div style="display:flex;width:100%;margin-top:8">
                        <div class="text-left" style="width:100%">
                            Punti: <strong><?= $squadra['Punti'] ?></strong>
                        </div>
                        <div class="text-center" style="width:100%">
                            Punti fatti: <strong><?= $squadra['Puntifatti'] ?></strong>
                        </div>
                        <div class="text-right" style="width:100%">
                            Punti subiti: <strong><?= $squadra['Puntisubiti'] ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

<?php
}


function stampaPartita($p){
    
    ?>
    
    <div style="padding-top: 5px; padding-bottom: 5px;display: flex; width:100%">
        <a style="width:100%" href="<?= $p['UrlVideo'] ?? '#!' ?>">
            <div class="btn btn-default col-xs-12" style="white-space:normal;display:flex;flex-direction:column">
                <div style="display:flex;">
                    <div style="min-width:60px">
                        <img src="<?= $p['Logo_A'] ?>" style="max-height: 50px;margin-bottom:3"/>
                    </div>
                    <div style=" width:100%; padding-left: 5px; padding-right: 5px;margin-left: 0px;margin-right: 0px; display: flex; flex-direction: column">
                        <div class="text-center row" style="display:flex;height: 100%;align-items: center;">
                            <div class="col-xs-5 text-right">
                                <strong><?= $p['Nome_A'] ?></strong>
                                <br/>
                                <?= $p['Regione_A'] ?>
                            </div>
                            <div class="col-xs-2">
                                <div style="display:flex;flex-direction:column">
                                    <strong style="font-size: 16px;">
                                        <?= $p['Punti_A'] . "-" . $p['Punti_B'] ?>
                                    </strong>
                                    <?php
                                    if ($p['UrlVideo']) { ?>
                                    <span class="glyphicon glyphicon-play-circle">
                                            <?php
                                            }
                                            ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-5 text-left">
                                <strong><?= $p['Nome_B'] ?></strong>
                                <br/>
                                <?= $p['Regione_B'] ?>
                            </div>
                        </div>
                    </div>
                    <div style="min-width:60px">
                        <img src="<?= $p['Logo_B'] ?>" style="max-height: 50px"/>
                    </div>

                </div>

            </div>
        </a>
    </div>
    
    <?php
}

?>
