<?php

use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
    'id' => 'Shot3',
    'options' => ['class' => 'form-vertical'],
]);
?>
<?= $form->field($model, 'Tiri')->textInput() ?>
<?= $form->field($model, 'Tempo')->textInput() ?>
<?= $form->field($model, 'Nome')->textInput() ?>
<?= $form->field($model, 'Id')->hiddenInput()->label(false) ?>

<?= Html::submitButton('Invia', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>
