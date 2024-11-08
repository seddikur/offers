<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Offers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="offers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'create_at')->hiddenInput(['value'=> date('Y-m-d')])->label(false) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
