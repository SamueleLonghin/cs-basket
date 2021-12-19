<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use common\models\Members;
use app\models\Squadra;


$this->title = 'Credits';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .footer {
        position: absolute;
    }

    h4 {
        padding-top: 20px;
    }
</style>

<div class="site-about row">
    <h1>Credits</h1>
    <div align="left" class="col-xs-6" width="25%">
        <h2 align="left">ITT Barsanti</h2>
        <div style="background-color:#e8e8f6; max-width: 101px;border-radius:10px;">
            <a href="https://www.barsanti.edu.it" target="_new">
                <img style="padding:1px;max-width:100px;border-radius:10px;" src="img/logobarsanti.png"></a></div>
        <h4>Alex Berton - Social Media</h4>
        <h4>Nicolò Bolzon - Social Media e Inserimento dati</h4>
        <h4>Angelo Bottazzo - Grafica web</h4>
        <h4>Davide Corradin - Social Media e Inserimento dati</h4>
        <h4>Francesco Giacometti - Debugger</h4>
        <h4>Edoardo Ginghina - Grafica web</h4>
        <h4>Samuele Longhin - Struttura del sito web</h4>
        <h4>Coordinati durante tutta la durata del progetto:<br> prof.ssa Elena MOMI</h4>
    </div>
    <div align="right" class="col-xs-6 " width="40%">
        <h2>Rosselli</h2>
        <a href="https://www.istitutorosselli.net" target="_new">
            <img style="max-width:100px;border-radius:10px;" src="https://www.grandefestival.it/wp-content/uploads/2018/03/rosselli.jpg"></a>
        <h4>Francesco Azzalini - Video Regioni (Valle d'Aosta, Marche, Molise), Video serata inaugurale, HL partite, Foto e Video</h4>
        <h4>Arianna Berti - Video Regioni (Basilicata, Lazio, Liguria), HL partite, Foto e Video</h4>
        <h4>Matilde Bianco - Video Regioni (Campania), Foto e Video</h4>
        <h4>Alex Gheno - Video Regioni (Veneto, Trentino Alto Adige, Umbria), Video serata inaugurale, HL partite, Foto e Video</h4>
        <h4>Nicole Lessio - Video Regioni (Friuli Venezia Giulia, Abruzzo), Foto e Video</h4>
        <h4>Alessandro Parisotto - Video Regioni (Emilia Romagna, Toscana, Lombardia), HL partite, Foto e Video</h4>
        <h4>Alberto Ratiglia - Video Regioni (Puglia, Piemonte), Foto e Video</h4>
        <h4>Giada Vignola - Video Regioni (Calabria, Sicilia, Sardegna), Video serata inaugurale, Foto e Video</h4>
        <h4>Coordinati a Scuola: prof Antonello ROTA</h4>
    </div>
</div>
