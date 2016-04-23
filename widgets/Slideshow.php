<?php

namespace worstinme\uikit\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\FileHelper;

class Slideshow extends Widget
{

    public $images = [];
    public $path;

    public function init()
    {
        if ($this->path !== null) {
            $webroot = Yii::getAlias('@webroot');

            $dir = $webroot.DIRECTORY_SEPARATOR.ltrim($this->path,DIRECTORY_SEPARATOR);

            if (is_dir($dir)) {
                $files = FileHelper::findFiles($webroot.DIRECTORY_SEPARATOR.ltrim($this->path,DIRECTORY_SEPARATOR));
                foreach ($files as $file) {
                    $this->images[] = str_replace($webroot, "", $file);
                }
            }
            
        }
        parent::init();
    }

    public function run()
    {

        if (count($this->images)) {

            return $this->render('slideshow',[
                'images'=>$this->images,
            ]); 

        }

        return null;
    }    
}