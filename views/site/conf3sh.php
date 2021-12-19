<?php

use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
    'id' => 'Shot3',
    'options' => ['class' => 'form-vertical'],
]);
$count = 1;
    //var_dump($model);die();
foreach ($model->Tiri as $row) { ?>
    <?= $form->field($model, 'Tiri[' . $count . ']')->checkbox([]) ?>
    <?php
    $count = $count + 1;
}
?>
<?= $form->field($model, 'Tempo')->textInput() ?>
<?= $form->field($model, 'Nome')->textInput() ?>
<?= $form->field($model, 'Id')->hiddenInput()->label(false) ?>

<?= Html::submitButton('Invia', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>
