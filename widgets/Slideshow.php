<?php

namespace worstinme\uikit\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\FileHelper;

class Slideshow extends Widget
{

    public $path;
    public $images = [];
    public $slides = [];
    public $height;
    public $items = [];

    /*  item => [
            'img'=>'/img.jpg', from @webroot
            'overlay'=>'',
            'item'=>'',
        ]   */

    public function init()
    {
        if ($this->path !== null) {
            $webroot = Yii::getAlias('@webroot');

            $dir = $webroot.DIRECTORY_SEPARATOR.ltrim($this->path,DIRECTORY_SEPARATOR);

            if (is_dir($dir)) {
                $files = FileHelper::findFiles($webroot.DIRECTORY_SEPARATOR.ltrim($this->path,DIRECTORY_SEPARATOR));
                foreach ($files as $file) {
                    $this->items[] = ['img'=>str_replace($webroot, "", $file)];
                }
            }
        }

        if (count($this->images)) {
            foreach ($this->images as $image) {
                $this->items[] = ['img'=>$image];
            }
        }

        if (count($this->slides)) {
            foreach ($this->slides as $slide) {
                $this->items[] = ['item'=>$slide];
            }
        }

        parent::init();
    }

    public function run()
    {

        if (count($this->items)) {

            return $this->render('slideshow',[
                'items'=>$this->items,
            ]); 

        }

        return null;
    }    
}