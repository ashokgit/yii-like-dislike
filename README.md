yii-like-dislike
================

A simple yii extension to keep like dislike functionality

DEPENDENCIES
1. yii-user module
2. jquery.js
3. url without index.php and urlmanager enabled in config/main.php

INSTALLATION
1. Unzip
2. Copy the likedislike folder to protected/modules/
3. under config/main/
  'modules'=>array(
		'likedislike',
	),
4. Import protected/modules/data/tbl_likedislike.sql
5. You are ready to go

USAGE

To display blog feeds
<?php $this->widget('likedislike.widgets.LikeDislikeButton',array('field_id'=>your filed/blog/post id*)) ?>

*your filed/blog/post id :  it should be the id of the item you want to be liked or disliked

eg: if you are showing all your post contents then:

<?php
foreach($model as $row){
  echo '<p>'.$row->title.'<br>'.$row->post;
  $this->widget('likedislike.widgets.LikeDislikeButton',array('field_id'=>$row->id));
  echo '</p>';
}
?>
