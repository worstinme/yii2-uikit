<?php

namespace worstinme\uikit\widgets;

use yii\helpers\ArrayHelper;

class GridView extends \yii\grid\GridView
{
	public $tableOptions = ['class' => 'uk-table uk-form uk-table-condensed uk-table-hover'];
	public $summaryOptions = ['class'=>'uk-text-center']; 
	public $pager =  ['class'=> 'worstinme\uikit\widgets\LinkPager'];
	public $beforeFooter;
	public $afterFooter;
	const FORMATTER_DECIMAL = 'Decimal';
	const FORMATTER_PERCENT = 'Percent';
	const FORMATTER_INTEGER = 'Integer';
	const FORMATTER_SEPARATOR_DEFAULT = ' ';

	public static function getTotal($provider, $fieldName, $format = null, $separator = null)
	{
		$value = 0;
		foreach ($provider as $item) {
			$value += ArrayHelper::getValue($item, $fieldName);
		}
		if($format){
			$formatter = new \yii\i18n\Formatter;
			if($separator){
				$formatter->thousandSeparator = $separator;
			}
			$value = $formatter->{'as'.$format}($value);
		}
		return $value;
	}

	public function renderTableFooter()
	{
		$footer = parent::renderTableFooter();
		return $this->beforeFooter.$footer.$this->afterFooter;
	}

}
