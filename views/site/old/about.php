<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;
use common\models\Members;
use app\models\Squadra;
use app\models\User;


$this->title = 'Partite';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>";var_dump($PA['F']['F']);die();

?>
<div class="site-about">
    <div class="row">
        <div class="column cleft">
            <h2>Partite - Femminili</h2>
            <div>
                <?php
                foreach ($squadre as $s) {
                    stampa($s);
                }
                ?>

            </div>
        </div>
    </div>
</div>


<?php
function stampa($p)
{
    ?>

    <div class="btn btn-default col-xs-12" style="white-space:normal;display:flex;flex-direction:column">
        <div style="flex-grow:1;display:flex;">
            <div style="flex-grow:1;">
                <img src="<?= $p['LogoRegione'] ?>" style=" max-height: 50px"/>
            </div>
            <div style=" flex-grow:4; padding-left: 5px; padding-right: 5px;margin-left: 0px;margin-right: 0px; display: flex; flex-direction: column">
                <div class="text-center row" style="flex-grow:1">
                    <div class="col-xs-5 text-right">
                        <strong><?= $p['Nome'] ?></strong>
                    </div>

                </div>
            </div>
            <?php
            foreach ((array)$p['Tiri3Shot'] as $k => $t) {

            }
            ?>
            <div>
            </div>

            <div>
                <?php
                if (User::isAdmin(Yii::$app->user)) {
                    ?>
                    <a href="ciao" style="">
                        <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>


<style>
    @media screen and (min-width: 800px) {
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
    }

    @media screen and (max-width: 800px) {
        .column {
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Clear floats after the columns */

    }

</style>
