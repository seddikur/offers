<?php

use common\models\Offers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var \common\models\OffersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Добавить', ['create'],
            [
//                'data-toggle' => "modal",
//                'data-target' => "#ajaxCrudModal",
                'title' => 'Добавить',
                'role'=>"modal-remote",
                'class' => 'btn btn-primary'
            ]) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php \yii\widgets\Pjax::begin(['timeout' => 10000, 'id' => 'offers']) ?>
    <?= GridView::widget([
        'id' => 'crud-datatable-offers',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require(__DIR__ . '/_columns.php'),
        'pjax' => true,
    ]); ?>

    <?php \yii\widgets\Pjax::end() ?>
</div>


<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>


<?php
$script = <<< JS
 
$('#crud-datatable-offers [data-key]').dblclick(function(e){
    if($(e.target).is('td')){
        var id = $(this).data('key');
        window.location = '/admin/offers/update?id='+id;
    }
});

$(function(){
    $(':input').click(function(){ 
        input_temp=this.value;
        $(this).select().focus();
    });
});

$(document).on('pjax:complete' , function(event) {
    $('#crud-datatable-offers [data-key]').dblclick(function(e){
        if($(e.target).is('td')){
            var id = $(this).data('key');
            window.location = '/admin/offers/update?id='+id;
        }
    });
    $(function(){
        $(':input').click(function(){ 
            input_temp=this.value;
            $(this).select().focus();
        });
    });
});

function convert_to_float(a) {
    var floatValue = +(a);
    return floatValue;
}
function maxLengthCheck(object)
{
    if (convert_to_float(object.value) > convert_to_float(object.max)) 
      object.value = object.max
}
JS;

$this->registerJs($script, \yii\web\View::POS_READY);
?>
