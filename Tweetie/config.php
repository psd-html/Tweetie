<?php if (!defined('PLX_ROOT')) exit; 
# Control du token du formulaire
plxToken::validateFormToken($_POST);
if(!empty($_POST)) {
	$plxPlugin->setParam('username', $_POST['username'], 'cdata');
	$plxPlugin->setParam('nb', $_POST['nb'], 'numeric');
	$plxPlugin->setParam('avatar', $_POST['avatar'], 'cdata');
	$plxPlugin->setParam('time', $_POST['time'], 'cdata');
	$plxPlugin->setParam('media', $_POST['media'], 'cdata');
	$plxPlugin->setParam('media_size', $_POST['media_size'], 'cdata');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=Tweetie');
	exit;
}
?>

<p>
	<h2><?php echo $plxPlugin->getInfo("description") ?></h2>
</p>

<p><?php $plxPlugin->lang('INFO1') ?></p>

<code>&lt;?php eval($plxShow->callHook('Tweetie')); ?&gt;</code>

<style>
	input, textarea {border-radius: 5px;width: 40%}
	input.numeric{width: 50px}
	textarea {min-height: 50px}
	label{font-style: italic}
</style>

<?php 
	$avatar =  $plxPlugin->getParam('avatar');
	$time =  $plxPlugin->getParam('time');
	$media =  $plxPlugin->getParam('media');
	$media_size =  $plxPlugin->getParam('media_size');
?>

<form action="parametres_plugin.php?p=Tweetie" method="post">

	<p>
		<label for="username"><?php $plxPlugin->lang('USER') ?>:</label>
		<input id="username" name="username"  maxlength="255" value="<?php echo $plxPlugin->getParam("username"); ?>">
	</p>

	<p>
		<label for="nb"><?php $plxPlugin->lang('NB') ?>:</label>
		<input class="numeric" id="nb" name="nb"  maxlength="255" value="<?php echo $plxPlugin->getParam("nb"); ?>">
	</p>

	<p>
		<label for="avatar"><?php $plxPlugin->lang('AVATAR') ?>?</label>
		<select name="avatar" id="avatar">
			<option value="true"  <?php if ($avatar == 'true') { echo'selected';}?> >Oui</option>
			<option value="false" <?php if ($avatar == 'false') { echo'selected';}?> >Non</option>
		</select>
	</p>

	<p>
		<label for="time"><?php $plxPlugin->lang('TIME') ?> ?</label>
		<select name="time" id="time">
			<option value="true"  <?php if ($time == 'true') { echo'selected';}?>>Oui</option>
			<option value="false" <?php if ($time == 'false') { echo'selected';}?>>Non</option>
		</select>
	</p>

	<p>
		<label for="media"><?php $plxPlugin->lang('MEDIA') ?> ?</label>
		<select name="media" id="media">
			<option value="true" <?php if ($media == 'true') { echo'selected';}?>>Oui</option>
			<option value="false" <?php if ($media == 'false') { echo'selected';}?>>Non</option>
		</select>
	</p>

	<p>
		<label for="media_size"><?php $plxPlugin->lang('SIZE') ?> ?</label>
		<select name="media_size" id="media_size">
			<option value="small" <?php if ($media_size == 'small') { echo'selected';}?>>small</option>
			<option value="large" <?php if ($media_size == 'large') { echo'selected';}?>>large</option>
			<option value="thumb" <?php if ($media_size == 'thumb') { echo'selected';}?>>thumb</option>
			<option value="medium" <?php if ($media_size == 'medium') { echo'selected';}?>>medium</option>
		</select>
	</p>	

	
	<p class="in-action-bar">
		<?php echo plxToken::getTokenPostMethod() ?>
		<input type="submit" name="submit" value="<?php $plxPlugin->lang('SUBMIT') ?>" />
	</p>

</form>
