<?php

namespace worstinme\uikit\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\FileHelper;

class Slideset extends Widget
{
    public $options = [];
    public $images = [];
    public $previews = [];
    public $folder;
    public $data = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $data = [];

        if ($this->folder !== null) {
            $files = FileHelper::findFiles(Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.ltrim($this->folder,DIRECTORY_SEPARATOR),['except'=>['*preview-*']]);
            //print_r($files);

            if (count($files)) {
                foreach ($files as $file) {

                    $name = explode(DIRECTORY_SEPARATOR,$file);

                    $last_name = array_pop($name);

                    $preview = implode(DIRECTORY_SEPARATOR,$name).DIRECTORY_SEPARATOR.'preview-'.$last_name;

                    if (!file_exists($preview)) {
                        \yii\imagine\Image::thumbnail($file, 300, 200)->save($preview, ['quality' => 95]);
                    }

                    if (file_exists($preview)) {
                        $data[] = [
                            'image' => str_replace(Yii::getAlias('@webroot'),"", $file),
                            'preview'=> str_replace(Yii::getAlias('@webroot'),"", $preview),
                        ];
                    }
                    
                }
                $this->data = $data;
            }
        }
        
        return $this->render('slideset',[
                'data'=>$this->data,
            ]);    
    }    
}