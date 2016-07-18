<?php

namespace worstinme\uikit\web;

use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\helpers\Inflector;

/**
 * ```php
 * public function actions()
 * {
 *     return [
 *         'error' => ['class' => 'worstinme\uikit\web\AliasAction'],
 *     ];
 * }
 * ```
 */

class AliasAction extends Action
{

    /*
        'checkCommand' => Yii::$app->db->createCommand('SELECT id FROM '.Sections::tableName().' WHERE alias = :alias')
    */

    public function run()
    {
        
        $alias = Inflector::slug(Yii::$app->request->post('name'));

       // if ($this->checkCommand->bindValues([':alias'=> $alias])->queryScalar() === false) {
            
        //}

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'alias' => $alias,
            'code' => 100,
        ];

    }

}