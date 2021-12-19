<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
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
            <div class="">
                <?php
                if (is_array($PA['F']['F']) && count($PA['F']['F']) > 0) {
                    ?>
                    <div>
                        <h3>
                            FINALI
                        </h3>
                        <?php
                        foreach ($PA['F']['F'] as $a => $p) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        }
                        ?>
                    </div>
                <?php }
                if (is_array($PA['F']['S']) && count($PA['F']['S']) > 0) {
                    ?>
                    <div>
                        <h3>
                            SEMIFINALI
                        </h3>
                        <?php
                        foreach ($PA['F']['S'] as $a => $p) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        } ?>
                    </div>
                <?php }
                $i = 0;
                foreach ($PA['F']['G'] as $girone) {
                    if (!is_null($girone) && count($girone) > 0 && is_array($girone)) { ?>
                        <h3>
                            <?= array_keys($PA['F']['G'])[$i] ?>
                        </h3>
                        <?php
                    }
                    foreach ($girone as $a => $p) {
                        if (!is_null($p) && count($p) > 0 && is_array($p)) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        }
                    }
                    $i++;
                }
                ?>
            </div>
            <div>


            </div>
        </div>
        <div class="column cleft">
            <h2>Partite - Maschili</h2>
            <div class="">
                <?php
                if (is_array($PA['M']['F']) && count($PA['M']['F']) > 0) {
                    ?>
                    <div>
                        <h3>
                            FINALI
                        </h3>
                        <?php
                        foreach ($PA['M']['F'] as $a => $p) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        }
                        ?>
                    </div>
                <?php }


                if (is_array($PA['M']['S']) && count($PA['M']['S']) > 0) {
                    ?>
                    <div>
                        <h3>
                            SEMIFINALI
                        </h3>
                        <?php
                        foreach ($PA['M']['S'] as $a => $p) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        } ?>
                    </div>
                <?php }

                $i = 0;
                foreach ($PA['M']['G'] as $girone) {
                    if (!is_null($girone) && count($girone) > 0 && is_array($girone)) { ?>
                        <h3>
                            <?= array_keys($PA['M']['G'])[$i] ?>
                        </h3>
                        <?php
                    }
                    foreach ($girone as $a => $p) {
                        if (!is_null($p) && count($p) > 0 && is_array($p)) {
                            ?>
                            <?= stampa($p) ?>
                            <?php
                        }
                    }
                    $i++;
                }
                ?>
            </div>


        </div>
    </div>
</div>

<?php
function stampa($p)
{
//        var_dump($p);die();
    ?>
    <div class="container-fluid" id="<?= $p['Id'] ?>"
         style="padding-top: 5px; padding-bottom: 5px;padding-right: 0px; padding-left: 0px;display: flex;">
        <a class="col-xs-12" style=";padding-right: 0px; padding-left: 0px;" href="<?= $p['UrlVideo'] ?? '#' ?>">
            <div class="btn btn-default col-xs-12" style="white-space:normal;display:flex;flex-direction:column">
                <div style="display:flex;">
                    <div>
                        <img src="<?= $p['Logo_A'] ?>" style="max-height: 50;margin-bottom:3"/>
                    </div>
                    <div style=" width:100%; padding-left: 5px; padding-right: 5px;margin-left: 0px;margin-right: 0px; display: flex; flex-direction: column">
                        <div class="text-center row">
                            <div class="col-xs-5 text-right">
                                <strong><?= $p['Nome_A'] ?></strong>
                                <br/>
                                <?= $p['Regione_A'] ?>
                            </div>
                            <div class="col-xs-2">
                                <div style="display:flex;flex-direction:column">
                                    <strong style="font-size: 16;">
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
                    <div>
                        <img src="<?= $p['Logo_B'] ?>" style="max-height: 50;margin-bottom:3"/>
                    </div>

                </div>

                <div style="display: flex;">
                    <div class="<?= $p["isM"] ? "bg-info" : "bg-danger" ?>"
                         style="flex-grow:1;display:flex;padding-top: 5px;">
                        <div class="text-right" style="width:50%;padding-right: 5px">
                            <strong><?= $p['Campo'] ?></strong>
                        </div>
                        <div class="text-left" style="width:50%;padding-left: 5px">
                            <strong><?= date("d M Y - H:i", strtotime($p['Ora'])) ?></strong>
                        </div>

                    </div>

                </div>
            </div>
        </a>
        <div>
            <?php
            if (User::isAdmin(Yii::$app->user)) {
                ?>
                <a href="index.php?r=site%2Finseriscipartita&id= <?= $p['Id'] ?>" style="">
                    <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                </a>
                <?php
            }
            ?>
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
