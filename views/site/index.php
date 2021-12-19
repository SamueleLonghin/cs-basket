<?php

/* @var $this yii\web\View */

use app\models\User;
//use app\model\Partita;
use app\models\Partita;

$this->title = 'csbaskettv';
?>
<div class="container-home">
    <div class="cascade-images">
        <div class="background-effect"></div>
        <div id="first" class="cascade-image" style="background-image:url(img/slide1.jpg);">
            <div class="text">Benvenuto su CSBasket TV</div>
        </div>

        <div id="second" class="cascade-image hidden" style="background-image:url(img/slide2.jpg);">
            <div class="text">Benvenuto su CSBasket TV</div>
        </div>

    </div>
    <div class="gallery-container">
        <div class="gallery-column" style="padding:0px">
            <div class="gallery-space-item meteo">
                <a class="weatherwidget-io" href="https://forecast7.com/it/45d6712d24/treviso/" data-label_1="TREVISO"
                   data-label_2="Meteo" data-theme="original"
                   style="display: block; position: relative; height: 211px; padding: 0px; overflow: hidden; text-align: left; text-indent: -299rem;">TREVISO
                    Meteo
                    <iframe id="weatherwidget-io-0" class="weatherwidget-io-frame" scrolling="no"
                            src="https://weatherwidget.io/w/"
                            style="display: block; position: absolute; top: 0px; height: 211px;" width="100%"
                            frameborder="0"></iframe>
                </a>
                <script>
                    !function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'weatherwidget-io-js');
                </script>
            </div>

            <?php
            if(is_array($partiteOra)&&count($partiteOra)>0) {
                ?>
                <div class="gallery-space-item cosoF" style="padding:0px">
                    <div class="sub-gallery-text cosoD"><h2>Live</h2>
                        <div>
                            <?php
                            foreach ((array)$partiteOra as $p) {
                                    stampa($p);

                            } ?>

                        </div>
                    </div>
                </div>
                <?php
            }else{?>
                <div class="gallery-space-item cosoF" style="padding:0px">
                    <div class="sub-gallery-text cosoD"><h2>Finali</h2>
                        <div>
                            <?php
                            $finali=[];
                            $finali=Partita::getFinaliAll();
                            foreach ((array)$finali as $girone=>$valori) {?>
                                <h3>
                                    <?= $girone?>
                        </h3>
                            <?php
                                foreach ($valori as $item) {
                                    stampa($item);
                                }

                            } ?>

                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="gallery-column">
            <div class="gallery-space-item coso" style="padding:0px">

                <div class="sub-gallery-text"><h2>Lunedì 3 Giugno</h2>
                    <p><strong>Dalle ore 13.00 alle ore 16.00 </strong>arrivo alla sede della manifestazione di tutte le
                        Rappresentative per le operazioni di accredito; sistemazione logistica di tutte le squadre</p>
                    <p><strong>Ore 18.00 </strong>Riunione tecnica presso il centro Sportivo “La Ghirada”</p>
                    <p><strong>Ore 19.30</strong> cena nei rispettivi alberghi</p>
                    <p><strong>Ore 21.00 Cerimonia di apertura</strong>
                        Ritrovo in piazza Duomo, sfilata delle rappresentative, presentazione delle squadre e accensione
                        tripode in Piazza Rinaldi.</p>
                    <p><strong>Ore 22.15 Festa di apertura</strong>
                    <p><strong>Ore 23.00</strong> Ritrovo in piazza Duomo per trasferimento in Hotel</p>
                </div>
            </div>
            <div class="gallery-space-item">

                <div class="sub-gallery-text"><h2>Martedì 4 Giugno</h2>

                    <p><strong>Ore 7.45</strong> Partenza bus per trasferimento ai campi di gioco.
                    <p><strong>Ore 8.30</strong> Ritrovo presso i campi e inizio attività “Fase di Qualificazione”
                    <p><strong>Ore 12.30</strong> pausa e pranzo presso Hotel Maggior Consiglio
                    <p><strong>Ore 14.30</strong> Ritrovo presso i campi e ripresa attività “Fase di Qualificazione”

                    <p><strong>Ore 17.30 </strong>Festa delle Regioni presso i campi di gioco
                    <p><strong>Ore 18.30 </strong>Rientro in Hotel e successiva cena
                    <p><strong>Ore 21.00 </strong>Incontro con le giocatrici della nazionale di basket femminile presso
                        Aula Congressi Hotel Best Western Premier BHR 
                    <p><strong>Ore 22.30</strong> Rientro in Hotel</p>
                </div>
            </div>
        </div>
        <div class="gallery-column">
            <div class="gallery-space-item">

                <div class="sub-gallery-text"><h2>Mercoledì 5 Giugno</h2>

                    <p><strong>Ore 7.45 </strong>Partenza bus per trasferimento ai campi di gioco.
                    <p><strong>Ore 8.30</strong> Ritrovo presso i campi e inizio attività “Quarti di Finale”
                    <p><strong>Ore 11:00</strong> Semifinali e Finali
                    <p><strong>Ore 12.30</strong> pausa e pranzo presso Hotel Maggior Consiglio
                    <p><strong>Ore 14.30</strong> Trasferimento a Treviso e ritrovo rappresentative in piazza Rinaldi
                        per visita culturale e caccia al tesoro fotografica nella città
                    <p><strong>Ore 18.30 </strong>Rientro in Hotel
                    <p><strong>Ore 20.30</strong> Trasferimento a Treviso in piazza Rinaldi
                    <p><strong>Ore 21.00</strong> Cerimonia di Premiazione
                    <p><strong>Ore 22.15 </strong>Festa di chiusura
                    <p><strong>Ore 23.00</strong> Ritrovo in piazza Duomo per trasferimento in Hotel
                </div>
            </div>
            <div class="gallery-space-item">
                <div class="sub-gallery-text"><h2>Giovedì 6 Giugno</h2>
                    <p>Rientro delle rappresentative regionali</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-high">
        <div class="highligs">
            <?php
            //var_dump($hs['UrlVideo']);die();
            foreach ((array)$hs as $h) {
            if(strpos($h['UrlVideo'], 'youtube') !== false) {
                ?>
                <div style="background-image: url(/img/kuroko-basket.jpg);" class="hightlig high"
                     onclick="openYoutube(' <?= $h['UrlVideo'] ?> ')" id="<?= $h['Id'] ?>">

                    <div class="background-effect"></div>

                    <div class="gradient-play">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"></path>
                            <path d="M0 0h24v24H0z" fill="none"></path>
                        </svg>
                    </div>
                    <div class="text-highlig">test testo</div>
                </div>
            <?php }} ?>
            <div class="oscure"></div>
            <div class="popup-box-space">
                <div class="popup-box">
                    <iframe id="youtube-video"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen="" autoplay="true" src="https://www.youtube.com/embed/"
                            frameborder="0"></iframe>

                </div>
                <div class="close-button" onclick="closeBoxes()">+</div>
            </div>

        </div>
    </div>


    <?php
    function stampa($p)
    {
        ?>
        <div class="container-fluid" id="<?= $p['Id'] ?>"
             style="padding-top: 5px; padding-bottom: 5px;padding-right: 0px; padding-left: 0px;display: flex;">
            <a class="col-xs-12" href="<?= $p['UrlVideo'] ?? '#!' ?>" style="padding:0px;">
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
                                <div class="col-xs-2" style="padding:0">
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
                        <div class="<?= $p["isM"]?"bg-info":"bg-danger"?>" style="flex-grow:1;display:flex;padding-top: 5px;">
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
        </div>
    <?php } ?>

    <script>

        setInterval(function () {
            if ($("#first").hasClass("hidden")) {
                $("#first").removeClass("hidden");
                $("#second").addClass("hidden");
            } else {
                $("#first").addClass("hidden");
                $("#second").removeClass("hidden");
            }
        }, 10000);

        function openYoutube(link) {
            $(".youtube-box").removeClass("hidden");
            $("#youtube-video").attr("src", "https://www.youtube.com/embed/" + link + "?autoplay=1&showinfo=0");
            $(".popup-box-space").addClass("open");
            $(".oscure").addClass("open");
        }

        function closeBoxes() {
            $(".oscure").removeClass("open");
            $(".popup-box-space").removeClass("open");
            $("#youtube-video").attr("src", "https://www.youtube.com/embed/");
        }

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <style>
        @media (max-width: 850px) {
            .cosoF {
                padding: 0px;
                margin:-13px;
            }
            .cosoD {
                padding: 5px;
            }
        }
    </style>
