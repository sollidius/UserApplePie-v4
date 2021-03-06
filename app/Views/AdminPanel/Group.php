<?php
/**
* Admin Panel Group View
*
* UserApplePie
* @author David (DaVaR) Sargent <davar@userapplepie.com>
* @version 4.0.0
*/

use Libs\Form,
    Libs\ErrorMessages,
    Libs\SuccessMessages,
    Libs\Language;

?>

<div class='col-lg-12 col-md-12 col-sm-12'>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<?php echo $data['title']." - ".$data['g_groupName']  ?>
		</div>
		<div class='panel-body'>

			<p><?php echo $data['welcomeMessage'] ?></p>

			<?php echo Form::open(array('method' => 'post')); ?>

			<!-- Group Name -->
			<div class='input-group' style='margin-bottom: 25px'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-tower'></i> Group Name</span>
				<?php echo Form::input(array('type' => 'text', 'name' => 'ag_groupName', 'class' => 'form-control', 'value' => $data['g_groupName'], 'placeholder' => 'Group Name', 'maxlength' => '150')); ?>
			</div>

				<!-- Group Description -->
				<div class='input-group' style='margin-bottom: 25px'>
					<span class='input-group-addon'><i class='glyphicon glyphicon-book'></i> Group Description</span>
					<?php echo Form::input(array('type' => 'text', 'name' => 'ag_groupDescription', 'class' => 'form-control', 'value' => $data['g_groupDescription'], 'placeholder' => 'Group Description', 'maxlength' => '255')); ?>
				</div>

				<!-- Group Font Color -->
				<div class='input-group' style='margin-bottom: 25px'>
					<span class='input-group-addon'><i class='glyphicon glyphicon-lamp'></i> Group Font Color</span>
					<?php echo Form::input(array('type' => 'text', 'name' => 'ag_groupFontColor', 'class' => 'form-control', 'value' => $data['g_groupFontColor'], 'placeholder' => 'Font Color', 'maxlength' => '20')); ?>
				</div>

        <!-- Group Font Weight -->
				<div class='input-group' style='margin-bottom: 25px'>
					<span class='input-group-addon'><i class='glyphicon glyphicon-bold'></i> Group Font Weight</span>
          <select class='form-control' id='gender' name='ag_groupFontWeight'>
            <option value='Normal' <?php if($data['g_groupFontWeight'] == "Normal"){echo "SELECTED";}?> >Normal</option>
            <option value='Bold' <?php if($data['g_groupFontWeight'] == "Bold"){echo "SELECTED";}?> >Bold</option>
          </select>
				</div>

				<!-- CSRF Token -->
				<input type="hidden" name="token_group" value="<?php echo $data['csrfToken']; ?>" />
				<input type="hidden" name="ag_groupID" value="<?php echo $data['g_groupID']; ?>" />
        <input type="hidden" name="update_group" value="true" />
				<button class="btn btn-md btn-success" name="submit" type="submit">
					<?php // echo Language::show('update_profile', 'Auth'); ?>
					Update Group
				</button>
			<?php echo Form::close(); ?>

      <?php
        if($data['g_groupID'] == "4"){
          echo "<br><div class='alert alert-warning'><b>NOTE</b>: By default this group has full access to the website and can not be deleted. Default Group Name: <b>Administrator</b></div>";
        }else if($data['g_groupID'] == "3"){
          echo "<br><div class='alert alert-warning'><b>NOTE</b>: By default this group has set access to the website and can not be deleted. Default Group Name: <b>Moderator</b></div>";
        }else if($data['g_groupID'] == "2"){
          echo "<br><div class='alert alert-warning'><b>NOTE</b>: By default this group has limited access to the website and can not be deleted. Default Group Name: <b>Member</b></div>";
        }else if($data['g_groupID'] == "1"){
          echo "<br><div class='alert alert-warning'><b>NOTE</b>: By default this group has limited access to the website and can not be deleted. Default Group Name: <b>New Member</b></div>";
        }else{
          echo "<br><br>";
          echo Form::open(array('method' => 'post', 'style' => 'display:inline-block'));
          echo "<input type='hidden' name='token_group' value='".$data['csrfToken']."'>";
          echo "<input type='hidden' name='delete_group' value='true' />";
          echo "<input type='hidden' name='ag_groupID' value='".$data['g_groupID']."'>";
          echo "<button class='btn btn-xs btn-danger' name='submit' type='submit'>Delete Group</button>";
          echo Form::close();
        }
      ?>
		</div>
	</div>
</div>
