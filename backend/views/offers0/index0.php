<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;

\backend\assets\FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\OffersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

if(isset($additionalLinkParams)){
    $createUrl = ArrayHelper::merge(['offers/create'], $additionalLinkParams);
    $createUrl = ArrayHelper::merge($createUrl, ['display' => true]);
} else {
    $createUrl = ['offers/create'];
}

?>
<?php \yii\widgets\Pjax::begin(['id' => 'main-page-pjax']) ?>
<div class="offers-index">
    <div id="ajaxCrudDatatable">
        <?php

//        echo GridView::widget([
//            'id'=>'crud-datatable-offers',
//            'dataProvider' => $dataProvider,
//            //'filterModel' => $searchModel,
//            'pjax'=>true,
//            'columns' => require(__DIR__.'/_columns.php'),
//            ['content'=>
//                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
//                    ['role'=>'modal-remote','title'=> 'Create new Offers','class'=>'btn btn-default']).
//                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
//                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
//                '{toggleData}'.
//                '{export}'
//            ],
//
//            'striped' => true,
//            'condensed' => true,
//            'responsive' => true,
//            'responsiveWrap' => false,
//            'panel' => [
//                'headingOptions' => ['style' => 'display: none;'],
//                'after'=>BulkButtonWidget::widget([
//                        'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; '."Удалить все",
//                            ["bulk-delete"] ,
//                            [
//                                "class"=>"btn btn-danger btn-xs",
//                                'role'=>'modal-remote-bulk',
//                                'data-confirm'=>false,
//                                'data-method'=>false,// for overide yii data api
//                                'data-request-method'=>'post',
//                                'data-confirm-title'=>'Вы уверены?',
//                                'data-confirm-message'=>"Вы действительно хотите удалить эту запись?",
//                            ]),
//                    ]).
//                    '<div class="clearfix"></div>',
//
//            ]
//        ])
        ?>
        <?php
        GridView::widget([
            'id'=>'crud-datatable-offers',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Новый','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Offers listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).
                        '<div class="clearfix"></div>',
            ]
        ])
        ?>
    </div>
</div>
<?php \yii\widgets\Pjax::end() ?>
<?php
$script = <<< JS
$('#crud-datatable-offers [data-key]').dblclick(function(e){
    if($(e.target).is('td')){
        var id = $(this).data('key');
        window.location = '/admin/offers/view?id='+id;
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
            window.location = '/admin/offers/view?id='+id;
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

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

