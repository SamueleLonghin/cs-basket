<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;
use kartik\datetime\DateTimePicker;

$this->title = 'Inserisci Partita';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="form-group">


    <?php

    $form = ActiveForm::begin([
        'id' => 'Partita',
        'options' => ['class' => 'form-vertical'],
    ]) ?>
    <?php
    //echo "<pre>";var_dump($form);die();

    //echo"<pre>";var_dump($squadre);die();

    echo $form->field($model, 'Sq_A')->widget(Select2::classname(), [
        'data' => $squadre,
        'options' => ['placeholder' => 'Seleziona la prima squadra...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    echo $form->field($model, 'Sq_B')->widget(Select2::classname(), [
        'data' => $squadre,
        'options' => ['placeholder' => 'Seleziopna la seconda squadra...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    echo $form->field($model, 'Id')->hiddenInput()->label(false);
    echo $form->field($model, 'Campo');
    echo $form->field($model, 'Ora')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    echo $form->field($model, 'UrlVideo');
    echo $form->field($model, 'Punti_A')->textInput(['type' => 'number']);
    echo $form->field($model, 'Punti_B')->textInput(['type' => 'number']);


    echo $form->field($model, 'isCosa')->radioList(
        [
            'isGironi' => "Gironi",
            'isQuarti' => "Gironi di Quarti",
            'isSemi' => 'Semifinali',
            'isFinale' => 'Finale'
        ]
    //,['selected'=>'isGironi']
    //['selection'=>'isGironi']
    )->label(false);


    ?>
    <?php


    ?>

    <?= Html::submitButton('Inserisci Partita', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>




