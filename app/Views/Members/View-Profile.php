<?php
/**
* Display Profile View
*
* UserApplePie
* @author David (DaVaR) Sargent <davar@userapplepie.com>
* @version 4.0.0
*/

use Libs\Language;
?>

    <div class="col-md-4 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4><?php echo $data['profile']->username; ?></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12" align="center">
                      <?php if(!empty($data['profile']->userImage)){ ?>
                        <img alt="<?php echo $data['profile']->username; ?>'s Profile Picture" src="<?php echo SITE_URL.IMG_DIR_PROFILE.$data['profile']->userImage; ?>" class="img-rounded img-responsive">
                        <?php }else{ ?>
							<span class='glyphicon glyphicon-user icon-size'></span>
						<?php } ?>
                        <Br>
                        <?php if($data['isAdmin'] == 'true'){
                            echo " <a href='".SITE_URL."AdminPanel-User/".$data['profile']->userID."' title='Admin - Edit User' class='btn btn-warning btn-block btn-xs'>Admin - Edit User</a> ";
                        } ?>
                        <?php if($currentUserData[0]->username == $data['profile']->username){
                            echo " <a href='".SITE_URL."Edit-Profile' title='".Language::show('mem_act_edit_profile', 'Members')."' class='btn btn-danger btn-block btn-xs'>".Language::show('mem_act_edit_profile', 'Members')."</a> ";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-striped">
                            <tbody>
                              <?php
                                /* Check to see if Private Message Module is installed, if it is show link */
                                if(file_exists(ROOTDIR.'app/Modules/Messages/messages.module.php')){
                                  echo "<tr><td>PM</td><td><a href='".SITE_URL."/NewMessage/".$data['profile']->username."' class='btn btn-xs btn-default'>".Language::show('members_profile_sendmsg', 'Members')."</a></td></tr>";
                                }
                              ?>
                              <tr><td><?=Language::show('members_profile_firstname', 'Members'); ?></td><td><?php echo $data['profile']->firstName; ?></td></tr>
                              <tr><td><?=Language::show('members_profile_lastname', 'Members'); ?></td><td><?php echo $data['profile']->lastName; ?></td></tr>
                              <?php
                                if($data['user_groups']){
                                  echo "<tr><td>".Language::show('members_profile_group', 'Members')."</td><td>";
                                  foreach($data['user_groups'] as $row){
                                    echo " $row <br>";
                                  }
                                  echo "</td></tr>";
                                }
                              ?>
                            <tr><td><?=Language::show('members_profile_gender', 'Members'); ?></td><td><?php echo $data['profile']->gender; ?></td></tr>
							              <?php if(isset($data['profile']->website)){ ?>
                              <tr><td><?=Language::show('members_profile_website', 'Members'); ?></td><td><a href="<?php echo "http://".$data['profile']->website; ?>" target="_blank">View</a></td></tr>
							              <?php } ?>
                            <tr><td><?=Language::show('members_profile_lastlogin', 'Members'); ?></td><td><?php if($data['profile']->LastLogin){ echo date("F d, Y",strtotime($data['profile']->LastLogin)); }else{ echo "Never"; } ?></td></tr>
                            <tr><td><?=Language::show('members_profile_signup', 'Members'); ?></td><td><?php echo date("F d, Y",strtotime($data['profile']->SignUp)); ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?=Language::show('members_profile_allabout', 'Members'); ?> <?php echo $data['profile']->username; ?></h4>
            </div>
            <div class="panel-body">
                <?php echo $data['profile']->aboutme; ?>
            </div>
        </div>
    </div>
