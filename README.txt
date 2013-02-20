SIMPLE LIKEDISLIKE

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
<?php $this->widget('likedislike.widgets.LikeDislikeButton',array('field_id'=>your filed/blog/post id)) ?>