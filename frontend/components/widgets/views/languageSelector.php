<?php
use yii\helpers\Html;
use yii\web\JsExpression;

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/language.js',[
		'depends' => [\yii\web\JqueryAsset::className()],
		'position' => \yii\web\View::POS_END
	]
);
?>
<?php echo Html::beginForm();?>
<div id="language-select">
	<?php
	if(sizeof($languages)<0){
		$lastElement = end($languages);
		foreach($languages as $key=>$lang){
			if($key!=$lang){
				echo '<span class="language" id="'.$key.'">'.$lang.' </span>';
			}else{
				echo '<b>'.$lang.'</b>';
			}
			if($lang!=$lastElement){
				echo ' | ';
			}
		}
	}else{
		echo Html::dropDownList('lang', $currentLang, $languages, array(
			'class'=>'btn btn-info btn-select btn-select-light',
			'onchange'=>'language_change(this)',
			'csrf'=>true,
		));
	}		
	?>
</div>
<?php echo Html::endForm();?>