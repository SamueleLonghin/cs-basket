<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;
use common\models\Members;
use app\models\Squadra;


$this->title = 'Classifica';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class=" col-md-6 col-md-offset-3">
            <h2>Femminili</h2>
            <?php


            foreach ($query['F'] as $girone => $dato) {
                ?>
                <h4>
                    <?= $girone ?>
                </h4>
                <?php
                echo GridView::widget([
                    'dataProvider' => $dato,
                    'summary' => '',
                    'rowOptions' => function ($model, $key, $index, $grid) {

                        return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq' . '&id="+(this.id);'];
                    },
                    'options' => ['style' => 'cursor: pointer;'],
                    'columns' => [
                        ['attribute' => 'Nome',],
                        ['attribute' => 'Punti',],
                        ['attribute' => 'Puntifatti',],
                        ['attribute' => 'Puntisubiti',],
                    ]
                ]);
            }
            ?>
            <h2>Maschili</h2>
            <?php
            foreach ($query['M'] as $girone => $dato) {
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
            }
            ?>
        </div>
    </div>
    <style>
        @media screen and (min-width: 800px) {
            .column {
                float: left;
                width: 30%;
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


    <!--return ['Id' => $model['Id'], 'onclick' => 'js:document.location.href="index.php?r=site%2Fsq'.'&id="+(this.id);'];-->