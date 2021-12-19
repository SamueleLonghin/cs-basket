<?php

/* @var $this yii\web\View */

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use common\models\Members;
use app\models\Squadra;


$this->title = 'Squadre';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>"; var_dump($squadre);die();
?>
<?php $cont = 0; ?>
<div class="site-about">
    <div class="row">

        <?php foreach ($squadre as $key => $regione) {
            stampa($key,$regione);
        } ?>


        <!--
        <div class="column split ">
            <h3>Maschili</h3>
            
        </div>
        <div class="column split ">
            <h3>Femminili</h3>
            <?php foreach ($squadre as $key => $regione) { ?>
                <a class="linkSquadra" href="index.php?r=site%2Fsq&id=<?php echo $regione['F']['Id'] ?>">
                    <div class="divSquadra">
                        <img src="<?php echo $regione['F']['LogoRegione'] ?>" style="max-width: 60px">
                        <?= Html::tag('h3', $regione['F']['Nome']) ?>
                        <?= Html::tag('h4', $key) ?>
                    </div>
                </a>
                <div>
                    <?php
                    if (User::isAdmin(Yii::$app->user)) {
                        ?>
                        <a href="index.php?r=site%2Finseriscisquadra&id=<?php echo $regione['F']['Id'] ?>" style="">
                            <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
        -->
    </div>
</div>



<?php
/*
function stampa($nome,$valore)
{
  //echo "<pre>";
//    var_dump($nome);
    //var_dump($valore);die();
    ?>
    <div class="container-fluid" style="padding-top: 5px; padding-bottom: 5px;display: flex;">
        <a class="linkSquadra" href="index.php?r=site%2Fsq&id=<?= $valore['M']['Id'] ?>">
            <div>
                <img src="<?= $valore['M']['LogoRegione'] ?>" style="max-width: 60px">
                <?= Html::tag('h3', $valore['M']['Nome']) ?>
                <?= Html::tag('h4', $nome) ?>
            </div>
        </a>
        <div>
            <?php
            if (User::isAdmin(Yii::$app->user)) {
                ?>
                <a href="index.php?r=site%2Finseriscisquadra&id=<?= $valore['M']['Id'] ?>" style="">
                    <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                </a>
                <a href="index.php?r=site%2Finserisci3shot&id=<?= $valore['M']['Id'] ?>" style="">
                    <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                </a>
                <a href="index.php?r=site%2Finseriscitorneo&id=<?= $valore['M']['Id'] ?>" style="">
                    <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
<?php }
*/

function stampa($nome,$valore)
{
  //echo "<pre>";
//    var_dump($nome);
    //var_dump($valore);die();
    ?>
    <div class="col-xs-12" style="padding-top:10px;padding-bottom:20px;">



        <div class="col-xs-12 col-md-6 text-center" style="padding-top:5px;padding-bottom:5px">

            <?php if(isset($valore['F']["Nome"]))
            {
            ?>

                <a style="width:100%"  href="index.php?r=site%2Fsq&id=<?= $valore['F']['Id'] ?>">
                    <div class="btn btn-default" style="white-space:normal;display:flex;">

                        <div style="max-height:100px;min-width:100px">
                            <img src="<?php echo $valore['F']['LogoRegione'] ?>" style="height:100%;max-height:100">
                        </div>

                        <div class="container-fluid" style="display:flex;flex-direction:column">
                            <div style="flex-grow:1;width:100%"></div>
                            <div>
                                <?= $nome ?><br/>
                                <h4><strong><?= $valore['F']['Nome'] ?></strong></h4>
                            </div>
                            <div style="flex-grow:1;width:100%"></div>
                        </div>
                    </div>
                </a>

                <?php
                if (User::isAdmin(Yii::$app->user)) {
                    ?>
                    <a href="index.php?r=site%2Finseriscisquadra&id=<?= $valore['F']['Id'] ?>" style="">
                        <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                    </a>
                    <a href="index.php?r=site%2Finserisci3shot&id=<?= $valore['F']['Id'] ?>" style="">
                        <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                    </a>
                    <a href="index.php?r=site%2Finseriscitorneo&id=<?= $valore['F']['Id'] ?>" style="">
                        <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                    </a>
                    <?php
                }

                ?>
            <?php

            }else{
                ?>

                <div class="col-xs-12" style="margin-top:40">
                    <div><?= $nome ?> non ha una rappresentativa femminile.</div>
                </div>
                <?php
            }?>
        </div>




        <div class="col-xs-12 col-md-6 text-center" style="padding-top:5px;padding-bottom:5px">

            <?php if(isset($valore['M']["Nome"]))
            {
            ?>

                <a style="width:100%"  href="index.php?r=site%2Fsq&id=<?= $valore['M']['Id'] ?>">
                    <div class="btn btn-default" style="white-space:normal;display:flex;">

                        <div style="max-height:100px;min-width:100px">
                            <img src="<?php echo $valore['M']['LogoRegione'] ?>" style="height:100%;max-height:100">
                        </div>

                        <div class="container-fluid" style="display:flex;flex-direction:column">
                            <div style="flex-grow:1;width:100%"></div>
                            <div>
                                <?= $nome ?><br/>
                                <h4><strong><?= $valore['M']['Nome'] ?></strong></h4>
                            </div>
                            <div style="flex-grow:1;width:100%"></div>
                        </div>
                    </div>
                </a>

                <?php
                    if (User::isAdmin(Yii::$app->user)) {
                        ?>
                        <a href="index.php?r=site%2Finseriscisquadra&id=<?= $valore['M']['Id'] ?>" style="">
                            <span class="glyphicon glyphicon-edit" style="font-size: x-large"></span>
                        </a>
                        <a href="index.php?r=site%2Finserisci3shot&id=<?= $valore['M']['Id'] ?>" style="">
                            <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                        </a>
                        <a href="index.php?r=site%2Finseriscitorneo&id=<?= $valore['M']['Id'] ?>" style="">
                            <span class="glyphicon glyphicon-asterisk" style="font-size: x-large"></span>
                        </a>
                        <?php
                    }
            }else{
                ?>

                <div class="col-xs-12" style="margin-top:40">
                    <div><?= $nome ?> non ha una rappresentativa maschile.</div>
                </div>
                <?php
            }?>
        </div>



    </div>
<?php }


?>


<style>
    @media screen and (min-width: 800px) {
        @media screen and (min-width: 800px) {
            .column {
                float: left;
                width: 50%;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        }
    }

    /*
        @media screen and (max-width: 800px) {
            .column {
                padding-left: 10px;
                padding-right: 10px;
            }
        }

    /*
        .mas {
            background-color: #0b93d5;
        }

        .fem {
            background-color: pink;
        }

        .split {
            width: 50%;
        }

        .left {
            left: 0;
        }

        .right {
            right: 0;
        }*/
    .divSquadra {
        padding-left: 5%;
        display: inline-block;
    }

    .linkSquadra:link {
        color: black;
    }

    .linkSquadra:visited {
        color: black;
    }

    .linkSquadra:hover {
        color: black;
    }

    .linkSquadra:active {
        color: black;
    }

    @media screen and (min-width: 800px) {
        .divSquadra {
            padding-right: 10%;
        }
    }
</style>