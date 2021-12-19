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
        'id' => 'Squadra',
        'options' => ['class' => 'form-vertical'],
    ]) ?>
    <?php
    echo $form->field($model, 'Id')->widget(Select2::classname(), [
        'data' => $squadre,
        'value'=>-1,
        'options' => ['placeholder' => 'Seleziona la prima squadra.'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    echo $form->field($model, 'Idgirone')->widget(Select2::classname(), [
        'data' => $gironi['G'],
        'options' => ['placeholder' => 'Seleziona un girone ...'],
    ]);
    echo $form->field($model, 'IdgironeQ')->widget(Select2::classname(), [
        'data' => $gironi['Q'],
        'options' => ['placeholder' => 'Qualificata a ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    echo $form->field($model, 'Nome');
    echo $form->field($model, 'Regione');
    echo $form->field($model, 'Descrizione')->textInput();
    echo $form->field($model, 'UrlVideo');
    foreach ($model as $key => $value) {
        //echo $form->field($model, $key);
    }
    echo $form->field($model, 'IsMaschile')->checkbox();
    ?>
    <?= Html::submitButton('Inserisci Squadra', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>




