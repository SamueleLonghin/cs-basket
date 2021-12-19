<?php

use app\models\User;


?>


<a href="img/torneo.pdf" target="_new"> Leggi la documentazione</a>


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
                            <?= stampaPartita($p) ?>
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
                            <?= stampaPartita($p) ?>
                            <?php
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<h2>Femminili</h2>
<?php
usort($squadre['F'],"cmp");
foreach ($squadre['F'] as $s) {
    if (is_array($s['TiriTorneo'])&&count($s['TiriTorneo'])>1) {
        stampa($s);
    }
}
?>
<h2>Maschili</h2>


<?php
usort($squadre['M'],"cmp");
foreach ($squadre['M'] as $s) {
    if (is_array($s['TiriTorneo'])&&count($s['TiriTorneo'])>1) {
        stampa($s);
    }}
?>

<style>

    .contenitore-coso-palle {
        margin-bottom: 20px;
    }

    @media (max-width: 991px) {
        .contenitore-coso-palle {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 991px) {
        .contenitore-minuti-punti {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    }

    @media (min-width: 992px) {
        .contenitore-minuti-punti {
            display: flex;
            flex-direction: column;
        }
    }

</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php


function cmp($a, $b) {
    return $b['PuntiTorneo'] - $a['PuntiTorneo'];
}


function stampa($p)
{
    ?>

    <div class="col-xs-12 contenitore-coso-palle" style="display:flex;flex-wrap:wrap;min-height:100px">
        <div class="col-xs-12 col-md-4" style="align-self:center">
            <h3 style="margin-bottom:0;margin-top:0"><strong><?= $p['Nome'] ?></strong></h3>
            <div class="contenitore-minuti-punti" style="align-self:center">
                <div><strong><?= $p['Regione'] ?></strong></div>
                <div><?= $p['Nome_Torneo'] ?></div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6"
             style="align-self:center;display:flex;margin-top:5px;margin-bottom:5px;flex-wrap:wrap">
            <?php
            foreach ((array)$p['TiriTorneo'] as $k => $t) {
                ?>
                <div style="min-width:30px;width:8%; padding:1px">


                    <img class="palla"
                         style="border-radius: 50%; background-color:<?= $t == "-1" ? "hls(0,0%,100%)" : ("hsl(" . (120 * ((5 - (int)$t) / 4)) . ", 100%, 50%)") ?>;<?= $p["BonusTorneo"] ? "box-shadow: 4px 0px 15px 5px yellow;" : "" ?> width:100%"
                         data-toggle="tooltip"
                         title="<?= $t != "-1" ? ($t == "1" ? ($t . " punto") : ((int)$t . " punti")) : "N/D" ?>"
                         src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEyLjAwMDcgNTEyIiB3aWR0aD0iNTEycHgiPjxwYXRoIGQ9Im00MzYuMTYwMTU2IDQzNi4xMTcxODhjNDguNTU4NTk0LTQ4LjU1ODU5NCA3NS40OTIxODgtMTEyLjkzNzUgNzUuODM1OTM4LTE4MS4yODEyNS4zNDc2NTYtNjguNDAyMzQ0LTI1Ljk3NjU2My0xMzIuNTgyMDMyLTc0LjExNzE4OC0xODAuNzE4NzUgMCAwIDAgMCAwLS4wMDM5MDctNDcuODMyMDMxLTQ3LjgyNDIxOS0xMTEuNS03NC4xMTMyODEtMTc5LjQxMDE1Ni03NC4xMTMyODEtLjQ0MTQwNiAwLS44ODI4MTIgMC0xLjMyODEyNS4wMDM5MDYyNS02OC4zNTE1NjMuMzQzNzQ5NzUtMTMyLjczNDM3NSAyNy4yNzczNDM3NS0xODEuMjk2ODc1IDc1LjgzMjAzMTc1LTQ4LjU2MjUgNDguNTU4NTkzLTc1LjQ5NjA5NCAxMTIuOTM3NS03NS44Mzk4NDM3NSAxODEuMjgxMjUtLjM0Mzc1MDI1IDY4LjM5ODQzNyAyNS45NzY1NjI3NSAxMzIuNTgyMDMxIDc0LjExNzE4Nzc1IDE4MC43MTg3NSA0Ny44MzIwMzEgNDcuODI0MjE4IDExMS41IDc0LjExMzI4MSAxNzkuNDEwMTU2IDc0LjExMzI4MS40NDE0MDYgMCAuODgyODEyIDAgMS4zMjgxMjUtLjAwMzkwNy4wODU5MzcgMCAuMTc1NzgxLS4wMDM5MDYuMjYxNzE5LS4wMDM5MDYuMzkwNjI1LjAzMTI1Ljc4MTI1LjA1ODU5NCAxLjE3NTc4MS4wNTg1OTQuMjg5MDYzIDAgLjU3ODEyNS0uMDA3ODEyLjg3MTA5NC0uMDIzNDM4LjI1MzkwNi0uMDE1NjI0LjUtLjA1NDY4Ny43NS0uMDgyMDMxIDY3LjIxMDkzNy0xLjEyMTA5MyAxMzAuNDAyMzQzLTI3Ljk0OTIxOSAxNzguMjM4MjgxLTc1Ljc3NzM0M2guMDAzOTA2Yy0uMDAzOTA2IDAtLjAwMzkwNiAwIDAgMHptLTQwNS4yNDIxODctMTU3LjIzMDQ2OWM2MC4wMzkwNjItMi4zNDM3NSAxMTYuNTc4MTI1LTI1LjI1NzgxMyAxNjEuNDUzMTI1LTY1LjMyMDMxM2w0Mi40MTQwNjIgNDIuNDEwMTU2LTE0OS42OTUzMTIgMTQ5LjY3OTY4OGMtMzEuMTc5Njg4LTM1LjU5Mzc1LTQ5Ljk1NzAzMi03OS41OTc2NTYtNTQuMTcxODc1LTEyNi43Njk1MzF6bTU1Ljg4MjgxMi0xNzAuODgyODEzIDg0LjMxNjQwNyA4NC4zMDg1OTRjLTM5LjM1NTQ2OSAzNC42MTcxODgtODguNjQ4NDM4IDU0LjQ0MTQwNi0xNDAuOTAyMzQ0IDU2LjU4MjAzMSAyLjE1NjI1LTUyLjI4NTE1NiAyMS45ODA0NjgtMTAxLjU1MDc4MSA1Ni41ODU5MzctMTQwLjg5MDYyNXptMzkzLjQ3NjU2MyAxMTcuNTA3ODEzYy02MC40ODQzNzUgNC40NDE0MDYtMTE3LjAwMzkwNiAyOS44NTE1NjItMTYwLjkyOTY4OCA3Mi41OTM3NWwtNDIuMTMyODEyLTQyLjEyODkwNyAxNDkuNjk1MzEyLTE0OS42Nzk2ODdjMjkuNTExNzE5IDMzLjY4MzU5NCA0Ny45MDYyNSA3NC45MDYyNSA1My4zNjcxODggMTE5LjIxNDg0NHptLTIyNC4yNzczNDQgOS4yNS00Mi40MTAxNTYtNDIuNDA2MjVjMjAuNDUzMTI1LTIyLjkwMjM0NCAzNi40NzY1NjItNDguODc4OTA3IDQ3LjY5NTMxMi03Ny40MjE4NzUgMTAuNjEzMjgyLTI3LjAwMzkwNiAxNi41MTE3MTktNTUuMTk1MzEzIDE3LjYzMjgxMy04NC4wMTE3MTkgNDcuMTcxODc1IDQuMjE0ODQ0IDkxLjE4MzU5MyAyMi45ODgyODEgMTI2Ljc3NzM0MyA1NC4xNjAxNTZ6bS0yMi42MzY3MTktMTMwLjgwMDc4MWMtOS43MDMxMjUgMjQuNjgzNTkzLTIzLjQ4NDM3NSA0Ny4yMDMxMjQtNDEuMDMxMjUgNjcuMTQwNjI0bC04NC4zMTY0MDYtODQuMzA4NTkzYzM5LjMzOTg0NC0zNC42MDU0NjkgODguNjE3MTg3LTU0LjQyNTc4MSAxNDAuOTEwMTU2LTU2LjU3ODEyNS0xLjAzOTA2MiAyNS4yODkwNjItNi4yNDIxODcgNTAuMDM1MTU2LTE1LjU2MjUgNzMuNzQ2MDk0em0yMi42MzY3MTkgMTczLjIyNjU2MiA0My4wNjI1IDQzLjA2MjVjLTM3LjEzMjgxMiA0NS41OTM3NS01Ny43MjI2NTYgMTAyLjU4NTkzOC01OC4xMTMyODEgMTYxLjM0Mzc1LTUwLjEwOTM3NS0yLjc0MjE4OC05Ny4wNzAzMTMtMjEuODI0MjE5LTEzNC42NDQ1MzEtNTQuNzIyNjU2em0xNC45NDkyMTkgMjA0LjEwMTU2MmMuNDQ1MzEyLTUwLjcxODc1IDE3Ljk0NTMxMi05OS45Mjk2ODcgNDkuNDU3MDMxLTEzOS42OTkyMThsODMuNTgyMDMxIDgzLjU3MDMxMmMtMzcuMzYzMjgxIDMyLjg1OTM3NS04My42Nzk2ODcgNTIuMzk4NDM4LTEzMy4wMzkwNjIgNTYuMTI4OTA2em02OS42MTMyODEtMTYxLjk3MjY1NmMzOC42Njc5NjktMzcuNDkyMTg3IDg4LjMwNDY4OC01OS44MzIwMzEgMTQxLjQyMTg3NS02My44NTE1NjItLjQ2NDg0NCA1NS4wOTc2NTYtMjAuNTA3ODEzIDEwNy4yNDYwOTQtNTYuNzgxMjUgMTQ4LjQ4NDM3NXptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PC9zdmc+Cg=="
                    />
                </div>
                <?php
            } ?>
        </div>
        <div class="col-xs-12 col-md-2 contenitore-minuti-punti" style="align-self:center">
            <div><strong><?= $p['PuntiTorneo'] ?></strong> punti</div>
        </div>

    </div>

    <?php
}// $p['TempoTorneo']

function stampaPartita($p)
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


