<?php

use app\models\User;



?>

    <div class="site-about">
        <div class="row">
            <div class="column cleft">
                <div>
                    <?php
                    $finaliF = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isF3'")->bindValue(':isM', 0)->queryAll();
                    if (is_array($finaliF) && count($finaliF) > 0) {
                        ?>
                        <div>
                            <h3>
                                Finali Femminili
                            </h3>
                            <?php
                            foreach ($finaliF as $a => $p) {
                                ?>
                                <?= stampa($p) ?>
                                <?php
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="column cleft">
                <div>
                    <?php
                    $finaliM = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isF3'")->bindValue(':isM', 1)->queryAll();
                    if (is_array($finaliM) && count($finaliM) > 0) {
                        ?>
                        <div>
                            <h3>
                                Finali Maschili
                            </h3>
                            <?php
                            foreach ($finaliM as $a => $p) {
                                ?>
                                <?= stampa($p) ?>
                                <?php
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="site-about">
        <div class="row">
            <div class="column cleft">
                <div>
                    <?php
                    $finaliFT = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isFT'")->bindValue(':isM', 0)->queryAll();
                    if (is_array($finaliFT) && count($finaliFT) > 0) {
                        ?>
                        <div>
                            <h3>
                                Finali Femminili
                            </h3>
                            <?php
                            foreach ($finaliFT as $a => $p) {
                                ?>
                                <?= stampa($p) ?>
                                <?php
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="column cleft">
                <div>
                    <?php
                    $finaliMT = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isFT'")->bindValue(':isM', 1)->queryAll();
                    if (is_array($finaliMT) && count($finaliMT) > 0) {
                        ?>
                        <div>
                            <h3>
                                Finali Maschili
                            </h3>
                            <?php
                            foreach ($finaliMT as $a => $p) {
                                ?>
                                <?= stampa($p) ?>
                                <?php
                            } ?>
                        </div>
                    <?php } ?>
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