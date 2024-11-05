<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */
?>
<div class="offers-view">
 
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
