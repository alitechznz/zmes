<script language="JavaScript">

function SelectAll(source) {
    document.getElementById('uall_chkbx').onclick = function() {
      var checkboxes = document.getElementsByClassName('uchkbx');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_audit').onclick = function() {
      var checkboxes = document.getElementsByClassName('uaudit');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_agenda').onclick = function() {
      var checkboxes = document.getElementsByClassName('uagenda');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_kra').onclick = function() {
      var checkboxes = document.getElementsByClassName('ukra');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_outcome').onclick = function() {
      var checkboxes = document.getElementsByClassName('uoutcome');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_role').onclick = function() {
      var checkboxes = document.getElementsByClassName('urole');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_stakeholder').onclick = function() {
      var checkboxes = document.getElementsByClassName('ustakeholder');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_conf').onclick = function() {
      var checkboxes = document.getElementsByClassName('uconf');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_proj').onclick = function() {
      var checkboxes = document.getElementsByClassName('uproj');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('uchkbx_monitor').onclick = function() {
      var checkboxes = document.getElementsByClassName('umonitor');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_budget').onclick = function() {
      var checkboxes = document.getElementsByClassName('ubudget');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_sms').onclick = function() {
      var checkboxes = document.getElementsByClassName('usms');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_report').onclick = function() {
      var checkboxes = document.getElementsByClassName('ureport');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('uchkbx_dashboard').onclick = function() {
      var checkboxes = document.getElementsByClassName('udashboard');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
}
</script>

<?php
include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM roletb WHERE role_ID='$ID_get'";

$result = mysqli_query($conn, $sql);
if($user_role = mysqli_fetch_array($result)) {
    echo '<h4>PERMISSION:</h4>
                <input type="hidden" class="form-control" name="RoleID" value="'.$ID_get.'"/>
                <input type="hidden" class="form-control" name="RoleName" value="'.$user_role['Name'].'"/>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uall_chkbx"  onClick="SelectAll(this)" checked />
                                                                            <label for="uall_chkbx">Select All</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12"></div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_dashboard"  class="uchkbx" checked />
                                                                            <label for="uchkbx_dashboard">Dashboard Management</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'da_det') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s1" name="role[]" value="da_det" class="uchkbx udashboard" checked />';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s1" name="role[]" value="da_det" class="uchkbx udashboard"  />';
    }
    echo ' <label for="basic_checkbox1_mp1s1" style="min-width: 100px;">Agenda details</label>';
    if(strpos($user_role['Permission'], 'da_pub') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s2" name ="role[]" value="da_pub" class="uchkbx udashboard" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s2" name ="role[]" value="da_pub" class="uchkbx udashboard"/>';
    }
    echo '<label for="basic_checkbox1_mp1s2" style="min-width: 100px;">Publication</label>';
    if(strpos($user_role['Permission'], 'da_lg') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s3" name="role[]" value="da_lg" class="uchkbx udashboard" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp1s3" name="role[]" value="da_lg" class="uchkbx udashboard"/>';
    }
    echo '<label for="basic_checkbox1_mp1s3" style="min-width: 100px;">Local Government</label>';
    echo '</div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_agenda" class="uchkbx" checked />
                                                                            <label for="uchkbx_agenda">Plan</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'ag_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s1" name="role[]" value="ag_add" class="uchkbx uagenda" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s1" name="role[]" value="ag_add" class="uchkbx uagenda"/>';
    }
    echo '<label for="basic_checkbox1_mp2s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'ag_edit') !== false) {
        echo ' <input type="checkbox" id="basic_checkbox1_mp2s2" name="role[]" value="ag_edit" class="uchkbx uagenda" checked/>';
    } else {
        echo ' <input type="checkbox" id="basic_checkbox1_mp2s2" name="role[]" value="ag_edit" class="uchkbx uagenda"/>';
    }
    echo '<label for="basic_checkbox1_mp2s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'ag_delete') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" name="role[]" value="ag_delete" class="uchkbx uagenda" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" name="role[]" value="ag_delete" class="uchkbx uagenda"/>';
    }
    echo '<label for="basic_checkbox1_mp2s3" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'ag_view') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" name="role[]" value="ag_view" class="uchkbx uagenda" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" name="role[]" value="ag_view" class="uchkbx uagenda"/>';
    }
    echo '<label for="basic_checkbox1_mp2s3" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_kra" class="uchkbx ukra" checked />
                                                                            <label for="uchkbx_kra">Aspriration</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'asp_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1a" class="uchkbx ukra" name="role[]" value="asp_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1a" class="uchkbx ukra" name="role[]" value="asp_add"/>';
    }
    echo '<label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'asp_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2a" class="uchkbx ukra" name="role[]" value="asp_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2a" class="uchkbx ukra" name="role[]" value="asp_edit"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'asp_delete') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3a" class="uchkbx ukra" name="role[]" value="asp_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3a" class="uchkbx ukra" name="role[]" value="asp_delete"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3a" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'asp_view') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3av" class="uchkbx ukra" name="role[]" value="asp_view" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3av" class="uchkbx ukra" name="role[]" value="asp_view"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3av" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <div class="demo-checkbox">
                                                                          <input type="checkbox" id="uchkbx_kra" class="uchkbx ukra" checked />
                                                                          <label for="uchkbx_kra">Goal</label>
                                                                  </div> 
                                                              </div>
                                                          </div>
                                                            <div class="col-md-9">
                                                                  <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'goal_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1aa" class="uchkbx ukra" name="role[]" value="goal_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1aa" class="uchkbx ukra" name="role[]" value="goal_add"/>';
    }
    echo '<label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'goal_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2aa" class="uchkbx ukra" name="role[]" value="goal_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2aa" class="uchkbx ukra" name="role[]" value="goal_edit"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'goal_delete') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aa" class="uchkbx ukra" name="role[]" value="goal_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aa" class="uchkbx ukra" name="role[]" value="goal_delete"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3aa" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'goal_view') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aa1" class="uchkbx ukra" name="role[]" value="goal_view" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aa1" class="uchkbx ukra" name="role[]" value="goal_view"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3aa1" style="min-width: 100px;">View</label>

                                                                  </div>
                                                          </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <div class="demo-checkbox">
                                                                          <input type="checkbox" id="uchkbx_kra" class="uchkbx ukra" checked />
                                                                          <label for="uchkbx_kra">Priority Area</label>
                                                                  </div> 
                                                              </div>
                                                          </div>
                                                          <div class="col-md-9">
                                                                  <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'priority_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1aaa" class="uchkbx ukra" name="role[]" value="priority_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1aaa" class="uchkbx ukra" name="role[]" value="priority_add"/>';
    }
    echo '<label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'priority_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2aaa" class="uchkbx ukra" name="role[]" value="priority_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2aaa" class="uchkbx ukra" name="role[]" value="priority_edit"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'priority_delete') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aaa" class="uchkbx ukra" name="role[]" value="priority_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aaa" class="uchkbx ukra" name="role[]" value="priority_delete"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3aaa" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'priority_view') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aaa1" class="uchkbx ukra" name="role[]" value="priority_view" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3aaa1" class="uchkbx ukra" name="role[]" value="priority_view"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3aaa1" style="min-width: 100px;">View</label>

                                                                  </div>
                                                          </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_kra" class="uchkbx ukra" checked />
                                                                            <label for="uchkbx_kra">Key Performance Indicator (KPI)</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'kra_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx ukra" name="role[]" value="kra_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx ukra" name="role[]" value="kra_add"/>';
    }
    echo '<label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'kra_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx ukra" name="role[]" value="kra_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx ukra" name="role[]" value="kra_edit"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'kra_delete') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3" class="uchkbx ukra" name="role[]" value="kra_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3" class="uchkbx ukra" name="role[]" value="kra_delete"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'kra_view') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3" class="uchkbx ukra" name="role[]" value="kra_view" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s3" class="uchkbx ukra" name="role[]" value="kra_view"/>';
    }
    echo '<label for="basic_checkbox1_mp3s3" style="min-width: 100px;">View</label>

                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_role" class="uchkbx" checked />
                                                                            <label for="uchkbx_role">Role & Permission</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'role_add') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx urole" name="role[]" value="role_add" checked/>';
    } else {
        echo ' <input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx urole" name="role[]" value="role_add"/>';
    }
    echo '<label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'role_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx urole" name="role[]" value="role_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx urole" name="role[]" value="role_edit"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'role_edit') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx urole" name="role[]" value="role_MDA" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx urole" name="role[]" value="role_MDA"/>';
    }
    echo '<label for="basic_checkbox1_mp3s2" style="min-width: 100px;">MDAs Group</label>';
    echo '</div>
                                                            </div>
                                                        </div>
                                                         <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_stakeholder" class="uchkbx" checked />
                                                                            <label for="uchkbx_stakeholder">User Management</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'stake_org') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s1" class="uchkbx ustakeholder" name="role[]" value="stake_org" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s1" class="uchkbx ustakeholder" name="role[]" value="stake_org"/>';
    }
    echo '<label for="basic_checkbox1_mp2s1" style="min-width: 100px;">Organization</label>';
    if(strpos($user_role['Permission'], 'stake_user') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s2" class="uchkbx ustakeholder" name="role[]" value="stake_user" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s2" class="uchkbx ustakeholder" name="role[]" value="stake_user"/>';
    }
    echo '<label for="basic_checkbox1_mp2s2" style="min-width: 100px;">M&E Users</label>';
    if(strpos($user_role['Permission'], 'stake_donor') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s31" class="chkbx stakeholder" name="role[]" value="stake_donor" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s31" class="chkbx stakeholder" name="role[]" value="stake_donor"/>';
    }
    echo '<label for="basic_checkbox_mp2s31" style="min-width: 100px;">Sponsor|Donor</label>';
    if(strpos($user_role['Permission'], 'stake_lstorg') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstorg" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstorg"/>';
    }
    echo '<label for="basic_checkbox1_mp2s3" style="min-width: 100px;">View Organizations</label>';
    if(strpos($user_role['Permission'], 'stake_lstuser') !== false) {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstuser" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstuser"/>';
    }
    echo '<label for="basic_checkbox1_mp2s3" style="min-width: 100px;">View Users</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_conf" class="uchkbx" checked />
                                                                            <label for="uchkbx_conf">Financing Configuration</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'conf_term') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp3s11" class="uchkbx uconf" name="role[]" value="conf_term" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp3s11" class="uchkbx uconf" name="role[]" value="conf_term"/>';
    }
    echo '<label for="basic_checkbox_mp3s11" style="min-width: 100px;">Budget Term</label></label>';
    if(strpos($user_role['Permission'], 'conf_source') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s2" class="uchkbx uconf" name="role[]" value="conf_source" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s2" class="uchkbx uconf" name="role[]" value="conf_source"/>';
    }
    echo '<label for="basic1_checkbox_mp3s2" style="min-width: 100px;">Source of Finance</label>';
    if(strpos($user_role['Permission'], 'conf_particular') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_particular" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_particular" />';
    }
    echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Finance Particular</label>';
    if(strpos($user_role['Permission'], 'conf_submit') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_submit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_submit"/>';
    }
    echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Submission Date</label>';
    if(strpos($user_role['Permission'], 'conf_sector') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp3s31" class="chkbx conf" name="role[]" value="conf_sector" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp3s31" class="chkbx conf" name="role[]" value="conf_sector"/>';
    }
    echo '<label for="basic_checkbox_mp3s31" style="min-width: 100px;">Sector</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                          <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_proj" class="uchkbx" checked />
                                                                            <label for="uchkbx_proj">Project</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'proj_add') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s1" class="uchkbx uproj" name="role[]" value="proj_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s1" class="uchkbx uproj" name="role[]" value="proj_add"/>';
    }
    echo '<label for="basic1_checkbox_mp2s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'proj_edit') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s2" class="uchkbx uproj" name="role[]" value="proj_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s2" class="uchkbx uproj" name="role[]" value="proj_edit"/>';
    }
    echo '<label for="basic1_checkbox_mp2s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'proj_delete') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_delete"/>';
    }
    echo '<label for="basic1_checkbox_mp2s3" style="min-width: 100px;">Delete</label>';

    if(strpos($user_role['Permission'], 'proj_view') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_view" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_view"/>';
    }
    echo '<label for="basic1_checkbox_mp2s3" style="min-width: 100px;">Project List</label>';

    if(strpos($user_role['Permission'], 'proj_submit') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_submit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_submit"/>';
    }
    echo '<label for="basic1_checkbox_mp2s3" style="min-width: 100px;">Submit Project</label>';

    if(strpos($user_role['Permission'], 'proj_verify') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_verify" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_verify"/>';
    }
    echo '<label for="basic1_checkbox_mp2s3" style="min-width: 100px;">Verify Project</label>';

    if(strpos($user_role['Permission'], 'proj_confirm') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_confirm" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_confirm"/>';
    }
    echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Confirm Project</label>';

    if(strpos($user_role['Permission'], 'proj_accept') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_accept" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_accept"/>';
    }
    echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">ZPC Accept Project</label>';

    if(strpos($user_role['Permission'], 'proj_extension') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_extension" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_extension"/>';
    }
    echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Request Extension</label>';

    if(strpos($user_role['Permission'], 'proj_extension') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3w" class="chkbx proj" name="role[]" value="proj_print" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3w" class="chkbx proj" name="role[]" value="proj_print"/>';
    }
    echo '<label for="basic_checkbox_mp2s3w" style="min-width: 100px;">Print Project</label>';

    if(strpos($user_role['Permission'], 'proj_inst_approve') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3ww" class="chkbx proj" name="role[]" value="proj_inst_approve" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp2s3ww" class="chkbx proj" name="role[]" value="proj_inst_approve"/>';
    }
    echo '<label for="basic_checkbox_mp2s3ww" style="min-width: 100px;">Project Institution Approval</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_monitor" class="uchkbx" checked />
                                                                            <label for="uchkbx_monitor">Project Monitoring</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
                                                                        if(strpos($user_role['Permission'], 'mon_workplan') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_workplan" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_workplan"/>';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Workplan</label>';
                                                                        if(strpos($user_role['Permission'], 'mon_kra') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_kra" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_kra"/>';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">KPI</label>';
                                                                        if(strpos($user_role['Permission'], 'mon_kra') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_resource" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_resource"/>';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Resource Tracking</label>';
                                                                        if(strpos($user_role['Permission'], 'mon_quarter') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_quarter" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_quarter"/>';
                                                                        }

                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Quarterly Report</label>';
                                                                        if(strpos($user_role['Permission'], 'mon_annual') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_annual" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_annual"/>';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Annual Report</label>';

                                                                        if(strpos($user_role['Permission'], 'mon_monitor') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_monitor" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_monitor"/>';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Monitoring Form</label>';

                                                                        if(strpos($user_role['Permission'], 'mon_submit') !== false) {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_submit" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_submit"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Submit Report</label>';

                                                                        if(strpos($user_role['Permission'], 'mon_verify') !== false) {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_verify" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_verify"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Approve Report</label>';


                                                                        if(strpos($user_role['Permission'], 'mon_confirm') !== false) {
                                                                            echo '  <input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_confirm" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_confirm"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Confirm Report </label>';

                                                                        if(strpos($user_role['Permission'], 'mon_accept') !== false) {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_accept" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_accept"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">ZPC Accept Report  </label>';

                                                                        if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_report" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_report"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Reports </label>';

                                                                        if(strpos($user_role['Permission'], 'mon_report_request') !== false) {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_report_request"/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="mon_report_request"/>';
                                                                        }
                                                                        echo '<label for="basic_checkbox_mp2s3" style="min-width: 100px;">Report Request </label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"  style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_budget" class="uchkbx" checked />
                                                                            <label for="uchkbx_budget">Project Budget</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
                                                                        if(strpos($user_role['Permission'], 'budg_add') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s1" class="uchkbx ubudget" name="role[]" value="budg_add" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s1" class="uchkbx ubudget" name="role[]" value="budg_add" />';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp4s1" style="min-width: 100px;">Add</label>';
                                                                        if(strpos($user_role['Permission'], 'budg_edit') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s2" class="uchkbx ubudget" name="role[]" value="budg_edit" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s2" class="uchkbx ubudget" name="role[]" value="budg_edit" />';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp4s2" style="min-width: 100px;">Edit</label>';
                                                                        if(strpos($user_role['Permission'], 'budg_delete') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s3" class="uchkbx ubudget" name="role[]" value="budg_delete" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s3" class="uchkbx ubudget" name="role[]" value="budg_delete" />';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp4s3" style="min-width: 100px;">Delete</label>';

                                                                        if(strpos($user_role['Permission'], 'budg_view') !== false) {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s3g" class="uchkbx ubudget" name="role[]" value="budg_view" checked/>';
                                                                        } else {
                                                                            echo '<input type="checkbox" id="basic1_checkbox_mp4s3g" class="uchkbx ubudget" name="role[]" value="budg_view" />';
                                                                        }
                                                                        echo '<label for="basic1_checkbox_mp4s3g" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_sms" class="uchkbx" checked name="role[]" value="sms" />
                                                                            <label for="uchkbx_sms">Bulk SMS</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <!--div class="demo-checkbox">;
                                                                    
                                                                        <input type="checkbox" id="basic_checkbox_mp5s1" class="chkbx sms" />
                                                                        <label for="basic_checkbox_mp5s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp5s2" class="chkbx sms"/>
                                                                        <label for="basic_checkbox_mp5s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp5s3" class="chkbx sms"/>
                                                                        <label for="basic_checkbox_mp5s3" style="min-width: 100px;">Delete</label>
                                                                    </div-->
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_report" class="uchkbx" checked />
                                                                            <label for="uchkbx_report">Reports</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'rep_project') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s1" class="uchkbx ureport" name="role[]" value="rep_project" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s1" class="uchkbx ureport" name="role[]" value="rep_project"/>';
    }
    echo '<label for="basic1_checkbox_mp6s1" style="min-width: 100px;">Project/Program Report</label>';
    if(strpos($user_role['Permission'], 'rep_stake') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s2" class="uchkbx ureport" name="role[]" value="rep_stake" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s2" class="uchkbx ureport" name="role[]" value="rep_stake"/>';
    }
    echo '<label for="basic1_checkbox_mp6s2" style="min-width: 100px;">Stakeholders Report</label>';
    if(strpos($user_role['Permission'], 'rep_annual') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_annual" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_annual"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Annual Report</label>';
    if(strpos($user_role['Permission'], 'rep_quarter') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_quarter" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_quarter"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Quarter Report</label>';
    if(strpos($user_role['Permission'], 'rep_kra') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_kra" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_kra"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per KRA</label>';
    if(strpos($user_role['Permission'], 'rep_budget_proj') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_proj" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_proj"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per Program</label>';
    if(strpos($user_role['Permission'], 'rep_budget_stake') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_stake" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_stake"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per Stakeholders</label>';
    if(strpos($user_role['Permission'], 'rep_visual') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_visual" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_visual"/>';
    }
    echo '<label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Data Visualization</label>';

    if(strpos($user_role['Permission'], 'rep_app_zpc') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_zpc" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_zpc"/>';
    }
    echo '<label for="basic_checkbox_mp6s3" style="min-width: 100px;">M&E Report Approve</label>';

    if(strpos($user_role['Permission'], 'rep_app_mda') !== false) {
        echo '<input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_mda" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_mda"/>';
    }
    echo '<label for="basic_checkbox_mp6s3" style="min-width: 100px;">MDAs Report Approve</label>';

    if(strpos($user_role['Permission'], 'rep_app_inst') !== false) {
        echo ' <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_inst" checked/>';
    } else {
        echo '<input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_inst"/>';
    }
    echo '<label for="basic_checkbox_mp6s3" style="min-width: 100px;">Institution Report Approve</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_audit" class="uchkbx" checked />
                                                                            <label for="uchkbx_audit">Audit</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">';
    if(strpos($user_role['Permission'], 'audit_add') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s1" class="uchkbx uaudit" name="role[]" value="audit_add" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s1" class="uchkbx uaudit" name="role[]" value="audit_add" />';
    }
    echo '<label for="basic1_checkbox_mp8s1" style="min-width: 100px;">Add</label>';
    if(strpos($user_role['Permission'], 'audit_edit') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s2" class="uchkbx uaudit" name="role[]" value="audit_edit" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s2" class="uchkbx uaudit" name="role[]" value="audit_edit"/>';
    }
    echo '<label for="basic1_checkbox_mp8s2" style="min-width: 100px;">Edit</label>';
    if(strpos($user_role['Permission'], 'audit_delete') !== false) {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s3" class="uchkbx uaudit" name="role[]" value="audit_delete" checked/>';
    } else {
        echo '<input type="checkbox" id="basic1_checkbox_mp8s3" class="uchkbx uaudit" name="role[]" value="audit_delete"/>';
    }
    echo '<label for="basic1_checkbox_mp8s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>';
}

?>