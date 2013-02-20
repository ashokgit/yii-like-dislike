<?php

class LikedislikeModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'likedislike.models.*',
			'likedislike.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	public function defaultOnload($field_id){
		$user_id = yii::app()->user->GetId();
		$criteria=new CDbCriteria;
		$criteria->select='*';  // only select the 'title' column
		$criteria->condition='field_id=:field_id and user_id=:user_id';
		$criteria->params=array(':field_id'=>$field_id,':user_id'=>$user_id);
		$model = Likedislike::model()->find($criteria);
		
		if(count($model)==0){
			return 'Like';
		}
		elseif($model->status==0){
			return 'Like';
		}
		else{
			return 'Unlike';
		}
	}
	
	public function countlikes($field_id){
		$criteria=new CDbCriteria;
		$criteria->select='count(id) as count';  // only select the 'title' column
		$criteria->condition='field_id=:field_id and status=:status';
		$criteria->params=array(':field_id'=>$field_id,'status'=>1);
		$model = Likedislike::model()->find($criteria);
		
		return $model->count;
	}
}
