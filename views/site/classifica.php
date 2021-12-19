<?php
    
    /* @var $this yii\web\View */
    
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\data\ActiveDataProvider;
    use yii\widgets\ListView;
    use common\models\Members;
    use app\models\Squadra;
    
    
    $this->title = 'Classifica';
    $this->params['breadcrumbs'][] = $this->title;
    
    ?>
<div class="site-about">
<h1><?= Html::encode($this->title) ?></h1>
<?php
    
    // var_dump($query);die();
    ?>
<div class="row">
<div class="column cleft">
<h2>Femminili</h2>
<?php
    
    
    foreach ($query['F'] as $girone => $dato) {
        if (false) {
            echo GridView::widget([
                                  'dataProvider' => $dato,
                                  'summary' => '',
                                  'rowOptions' => function ($model, $key, $index, $grid) {
                                  
                                  return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq' . '&id="+(this.id);'];
                                  },
                                  'options' => ['style' => 'cursor: pointer;'],
                                  'columns' => [
                                  ['attribute' => 'Nome',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
                                  ['attribute' => 'Punti',],
                                  ['attribute' => 'Puntifatti',],
                                  ['attribute' => 'Puntisubiti',],
                                  ]
                                  ]);
        } else {
            echo stampaGirone($girone,$dato);
        }
    }
    ?>
</div>
<div class="column cright">
<h2>Maschili</h2>
<?php
    foreach ($query['M'] as $girone => $dato) {
        if (false) {
            echo GridView::widget([
                                  'dataProvider' => $dato,
                                  'summary' => '',
                                  'rowOptions' => function ($model, $key, $index, $grid) {
                                  
                                  return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq' . '&id="+(this.id);'];
                                  },
                                  'options' => ['style' => 'cursor: pointer;'],
                                  'columns' => [
                                  ['attribute' => 'Nome',],//'format' => 'raw','value'=>function ($data) {return Html::a('(this.Sq_A)','index.php?r=site%2Fsq'.'&id="+(this.IdSq_A);');}, ],
                                  ['attribute' => 'Punti',],
                                  ['attribute' => 'Puntifatti',],
                                  ['attribute' => 'Puntisubiti',],
                                  ]
                                  ]);
        } else {
            echo stampaGirone($girone,$dato);
        }
    }
    ?>
</div>
</div>

</div>
<?php
    
    function stampaGirone($girone,$squadre)
    {
if (!is_null($squadre) && is_array($squadre) && count($squadre) > 0) { ?>
    <h3><?= $girone ?? "Giorne A" ?></h3>
    <?php foreach ($squadre as $squadrac) {
        stampaSquadraClassifica($squadrac);
    }
}

}
function stampaSquadraClassifica($squadra)
{
    ?>
    
    <div style="width:100%;margin-top:10">
    <a style="width:100%;" href="index.php?r=site%2Fsq&id=<?= $squadra['Id'] ?>">
    <div class="btn btn-default" style="white-space:normal;display:flex;">
    
    <div style="min-width:60px;align-self:center">
    <img src="<?php echo $squadra['LogoRegione'] ?>" style="height:100%;max-height:55">
    </div>
    <div style="display:flex;flex-direction:column;width:82%;margin-left:auto; margin-right:0;align-self: center;">
    <div style="margin-top:5">
    <strong><?= $squadra['Nome'] ?></strong><br/>
    <?= $squadra['Regione'] ?>
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

?>
<style>
@media screen and (min-width: 800px) {
    .column {
        float: left;
    width: 50%;
    }
    
    .cleft {
        padding-right: 5px;
    }
    
    .cright {
        padding-left: 5px;
    }
    
    /* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}
}

@media screen and (max-width: 800px) {
    .column {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    /* Clear floats after the columns */
    
}
</style>
