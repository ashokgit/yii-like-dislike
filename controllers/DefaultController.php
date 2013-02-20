<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLikedislike(){
		$field_id = Yii::app()->request->getParam('field_id');
		$user_id = yii::app()->user->GetId();
		
		$criteria=new CDbCriteria;
		$criteria->select='*';  // only select the 'title' column
		$criteria->condition='field_id=:field_id and user_id=:user_id';
		$criteria->params=array(':field_id'=>$field_id,':user_id'=>$user_id);
		$model = Likedislike::model()->find($criteria);
		
		if(count($model)==0){
			$model = new Likedislike();
			$model->field_id = $field_id;
			$model->user_id = $user_id;
			$model->status = 1;
			$model->add_timestamp = time();
			$displaynow = 'Unlike';
		}
		else if($model->status==0){
			$model->status = 1;
			$model->edit_timestamp = time();
			$displaynow = 'Unlike';
		}
		else{
			$model->status = 0;
			$model->edit_timestamp = time();
			$displaynow = 'Like';
		}
		
		if($model->save()){
			$data['status'] = true;
			$data['displaytext'] = $displaynow;
		}
		else{
			$data['status'] = false;
		}
		$data['count'] = Yii::app()->getModule('likedislike')->countlikes($field_id);
		echo json_encode($data);
	}
}