<?php
namespace backend\components\widgets;
use yii\base\Widget;
Class LanguageSelector extends Widget
{
	public function run(){
		$currentLang = \Yii::$app->language;
		$languages = \Yii::$app->params['languages'];
		return $this->render('languageSelector',array(
			'currentLang'=>$currentLang,
			'languages'=>$languages,
		));
	}
}
?>