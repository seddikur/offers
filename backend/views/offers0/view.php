<?php

use yii\widgets\DetailView;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */
?>
<div class="offers-view">
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'create_at',
        ],
    ]) ?>

</div>
