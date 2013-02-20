<?php
/**
 * CmsBlock class file.
 * @author Christoffer Niska <christoffer.niska@nordsoftware.com>
 * @copyright Copyright &copy; 2011, Nord Software Ltd
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package cms.widgets
 */

/**
 * Widget that renders the node with the given name.
 */
class LikeDislikeButton extends CWidget
{
	/**
	 * @property string the content name.
	 */
	public $field_id;
	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if(!Yii::app()->user->isGuest){
		$assetsurl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('likedislike.assets') );
		Yii::app()->clientScript->registerScriptFile($assetsurl.'/js/likedislike.js', CClientScript::POS_HEAD);
		?>
		<span>
			<a href="javascript:void(0);" onclick="likedislike('<?php echo $this->field_id;?>')"><span id="displaytext_<?php echo $this->field_id;?>"><?php echo Yii::app()->getModule('likedislike')->defaultOnload($this->field_id);?></span></a><small>(<span id="likedislikecount_<?php echo $this->field_id;?>"><?php echo Yii::app()->getModule('likedislike')->countlikes($this->field_id);?></span>)</small>
			<input type="hidden" id="mybaseurl" value="<?php echo Yii::app()->baseUrl;?>/likedislike/default/likedislike">
		</span>
		<?php
	}
	else{
		?>
		<small><?php echo Yii::app()->getModule('likedislike')->countlikes($this->field_id);?></span> Likes</small>
		<?php
	}
	}
}
