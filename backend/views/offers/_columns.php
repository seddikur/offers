<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'phone',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_at',
    ],

//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => false,
//        'vAlign'=>'middle',
//        'urlCreator' => function($action, $model, $key, $index) {
//            return Url::to(["offers"."/".$action,'id'=>$key]);
//        },
//
//        'viewOptions'=>['data-pjax'=>'0','title'=>'Просмотр','data-toggle'=>'tooltip'],
//        'updateOptions'=>['role'=>'modal-remote','title'=>'Изменить', 'data-toggle'=>'tooltip', ],
//        'deleteOptions'=>['role'=>'modal-remote','title'=>'Удалить',
//            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
//            'data-request-method'=>'post',
//            'data-toggle'=>'tooltip',
//            'data-confirm-title'=>'Вы уверены?',
//            'data-confirm-message'=>'Вы уверены что хотите удалить эту позицию'],
//    ],

];   