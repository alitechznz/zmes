<script language="JavaScript">
function toggle(source) {
    document.getElementById('basic_checkbox_mp1').onclick = function() {
      var checkboxes = document.getElementsByName('agenda');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
}

function SelectAll(source) {
   
    document.getElementById('all_chkbx').onclick = function() {
      var checkboxes = document.getElementsByClassName('chkbx');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_audit').onclick = function() {
      var checkboxes = document.getElementsByClassName('audit');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_agenda').onclick = function() {
      var checkboxes = document.getElementsByClassName('agenda');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_kra').onclick = function() {
      var checkboxes = document.getElementsByClassName('kra');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_outcome').onclick = function() {
      var checkboxes = document.getElementsByClassName('outcome');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_role').onclick = function() {
      var checkboxes = document.getElementsByClassName('role');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_stakeholder').onclick = function() {
      var checkboxes = document.getElementsByClassName('stakeholder');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_conf').onclick = function() {
      var checkboxes = document.getElementsByClassName('conf');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_proj').onclick = function() {
      var checkboxes = document.getElementsByClassName('proj');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
     document.getElementById('chkbx_monitor').onclick = function() {
      var checkboxes = document.getElementsByClassName('monitor');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_budget').onclick = function() {
      var checkboxes = document.getElementsByClassName('budget');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_sms').onclick = function() {
      var checkboxes = document.getElementsByClassName('sms');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_report').onclick = function() {
      var checkboxes = document.getElementsByClassName('report');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    
    document.getElementById('chkbx_dashboard').onclick = function() {
      var checkboxes = document.getElementsByClassName('dashboard');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
}
</script>
   
   <div class="col-md-12" style="margin: 0px 0%; padding: 0px 3%;">
                              <h4>PERMISSION:</h4>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="all_chkbx" onClick="SelectAll(this)" checked />
                                                                            <label for="all_chkbx">Select All</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="head_chkbx" class="chkbx" name="role[]" value="group_head" checked />
                                                                            <label for="head_chkbx">Head of Group</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_dashboard" onClick="toggle(this)" class="chkbx" checked />
                                                                            <label for="chkbx_dashboard">Dashboard Management</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp1s1" name="role[]" value="da_det" class="chkbx dashboard"  />
                                                                        <label for="basic_checkbox_mp1s1" style="min-width: 100px;">Agenda details</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s2" name ="role[]" value="da_pub" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s2" style="min-width: 100px;">Publication</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">Local Government</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_agenda" class="chkbx" checked />
                                                                            <label for="chkbx_agenda">Plan</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1" name="role[]" value="ag_add" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2" name="role[]" value="ag_edit" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3" name="role[]" value="ag_delete" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3v" name="role[]" value="ag_view" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3v" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_agenda" class="chkbx" checked />
                                                                            <label for="chkbx_agenda">Aspiration</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1a" name="role[]" value="asp_add" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s1a" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2a" name="role[]" value="asp_edit" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s2a" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3a" name="role[]" value="asp_delete" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3a" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3a2" name="role[]" value="asp_view" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3a2" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_agenda" class="chkbx" checked />
                                                                            <label for="chkbx_agenda">Strategy|Goal</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1aa" name="role[]" value="goal_add" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s1aa" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2aa" name="role[]" value="goal_edit" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s2aa" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3aa" name="role[]" value="goal_delete" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3aa" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3aa2" name="role[]" value="goal_view" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3aa2" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_agenda" class="chkbx" checked />
                                                                            <label for="chkbx_agenda">Priority Area</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1aaa" name="role[]" value="priority_add" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s1aaa" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2aaa" name="role[]" value="priority_edit" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s2aaa" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3aaa" name="role[]" value="priority_delete" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3aaa" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3aaa1" name="role[]" value="priority_view" class="chkbx agenda"/>
                                                                        <label for="basic_checkbox_mp2s3aaa1" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_kra" class="chkbx kra" checked />
                                                                            <label for="chkbx_kra">Key Performance Indicator (KPI)</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp3s1" class="chkbx kra" name="role[]" value="kra_add"/>
                                                                        <label for="basic_checkbox_mp3s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s2" class="chkbx kra" name="role[]" value="kra_edit"/>
                                                                        <label for="basic_checkbox_mp3s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx kra" name="role[]" value="kra_delete"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3v" class="chkbx kra" name="role[]" value="kra_view"/>
                                                                        <label for="basic_checkbox_mp3s3v" style="min-width: 100px;">View</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3v" class="chkbx kra" name="role[]" value="kra_print"/>
                                                                        <label for="basic_checkbox_mp3s3v" style="min-width: 100px;">Print</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_role" class="chkbx" checked />
                                                                            <label for="chkbx_role">Role & Permission</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp3s1" class="chkbx role" name="role[]" value="role_add"/>
                                                                        <label for="basic_checkbox_mp3s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s2" class="chkbx role" name="role[]" value="role_edit"/>
                                                                        <label for="basic_checkbox_mp3s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s2" class="chkbx role" name="role[]" value="role_MDA"/>
                                                                        <label for="basic_checkbox_mp3s2" style="min-width: 100px;">MDAs Group</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                         <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_stakeholder" class="chkbx" checked />
                                                                            <label for="chkbx_stakeholder">User Management</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1" class="chkbx stakeholder" name="role[]" value="stake_org"/>
                                                                        <label for="basic_checkbox_mp2s1" style="min-width: 100px;">Organization</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2" class="chkbx stakeholder" name="role[]" value="stake_user"/>
                                                                        <label for="basic_checkbox_mp2s2" style="min-width: 100px;">M&E Users</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s31" class="chkbx stakeholder" name="role[]" value="stake_donor"/>
                                                                        <label for="basic_checkbox_mp2s31" style="min-width: 100px;">Sponsor|Donor</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx stakeholder" name="role[]" value="stake_lstorg"/>
                                                                        <label for="basic_checkbox_mp2s3" style="min-width: 100px;">View Organizations</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx stakeholder" name="role[]" value="stake_lstuser"/>
                                                                        <label for="basic_checkbox_mp2s3" style="min-width: 100px;">View Users</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_conf" class="chkbx" checked />
                                                                            <label for="chkbx_conf">Financing Configuration</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp3s1" class="chkbx conf" name="role[]" value="conf_term"/>
                                                                        <label for="basic_checkbox_mp3s1" style="min-width: 100px;">Budget Term</label></label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s2" class="chkbx conf" name="role[]" value="conf_source"/>
                                                                        <label for="basic_checkbox_mp3s2" style="min-width: 100px;">Source of Finance</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx conf" name="role[]" value="conf_particular" />
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Finance Particular</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx conf" name="role[]" value="conf_submit"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Submission Date</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp3s31" class="chkbx conf" name="role[]" value="conf_sector"/>
                                                                        <label for="basic_checkbox_mp3s31" style="min-width: 100px;">Sector</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                          <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_proj" class="chkbx" checked />
                                                                            <label for="chkbx_proj">Project</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1" class="chkbx proj" name="role[]" value="proj_add"/>
                                                                        <label for="basic_checkbox_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2" class="chkbx proj" name="role[]" value="proj_edit"/>
                                                                        <label for="basic_checkbox_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3" class="chkbx proj" name="role[]" value="proj_delete"/>
                                                                        <label for="basic_checkbox_mp2s3" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s31" class="chkbx proj" name="role[]" value="proj_view"/>
                                                                        <label for="basic_checkbox_mp2s31" style="min-width: 100px;">Project List</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s311" class="chkbx proj" name="role[]" value="proj_submit"/>
                                                                        <label for="basic_checkbox_mp2s311" style="min-width: 100px;">Submit Project</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3111" class="chkbx proj" name="role[]" value="proj_verify"/>
                                                                        <label for="basic_checkbox_mp2s3111" style="min-width: 100px;">Verify Project </label>
                                                                         <input type="checkbox" id="basic_checkbox_mp2s31111" class="chkbx proj" name="role[]" value="proj_confirm"/>
                                                                        <label for="basic_checkbox_mp2s3111" style="min-width: 100px;">Confirm Project </label>
                                                                         <input type="checkbox" id="basic_checkbox_mp2s32" class="chkbx proj" name="role[]" value="proj_accept"/>
                                                                        <label for="basic_checkbox_mp2s32" style="min-width: 100px;">ZPC Accept Project </label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s33" class="chkbx proj" name="role[]" value="proj_extension"/>
                                                                        <label for="basic_checkbox_mp2s33" style="min-width: 100px;">Request Extension</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s34" class="chkbx proj" name="role[]" value="proj_print"/>
                                                                        <label for="basic_checkbox_mp2s34" style="min-width: 100px;">Print Project</label>
                                                  
                                                                        <input type="checkbox" id="basic_checkbox_mp2s35" class="chkbx proj" name="role[]" value="proj_inst_approve"/>
                                                                        <label for="basic_checkbox_mp2s35" style="min-width: 100px;">Project Institution Approval</label>
                                                                    </div>
                                                            </div>
                                                        </div><br />
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_monitor" class="chkbx" checked />
                                                                            <label for="chkbx_monitor">Project Monitoring</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                      
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_workplan"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Workplan</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_kra"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">KPI</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_resource"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Resource Tracking</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_quarter"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Quarterly Report</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_annual"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Annual Report</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_monitor"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Monitoring Form</label>

                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_submit"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Submit Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_verify"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Approve Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_confirm"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Confirm Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_accept"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">ZPC Accept Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_report"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Reports</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3" class="chkbx monitor" name="role[]" value="mon_report_request"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Report Request</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"  style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_budget" class="chkbx" checked />
                                                                            <label for="chkbx_budget">Project Budget</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp4s1" class="chkbx budget" name="role[]" value="budg_add" />
                                                                        <label for="basic_checkbox_mp4s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp4s2" class="chkbx budget" name="role[]" value="budg_edit" />
                                                                        <label for="basic_checkbox_mp4s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp4s3" class="chkbx budget" name="role[]" value="budg_delete" />
                                                                        <label for="basic_checkbox_mp4s3" style="min-width: 100px;">Delete</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp4s3s" class="chkbx budget" name="role[]" value="budg_view" />
                                                                        <label for="basic_checkbox_mp4s3s" style="min-width: 100px;">View</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_sms" class="chkbx" checked name="role[]" value="sms" />
                                                                            <label for="chkbx_sms">Bulk SMS</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <!--div class="demo-checkbox">
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
                                                                            <input type="checkbox" id="chkbx_report" class="chkbx" checked />
                                                                            <label for="chkbx_report">Reports</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp6s1" class="chkbx report" name="role[]" value="rep_project"/>
                                                                        <label for="basic_checkbox_mp6s1" style="min-width: 100px;">Project/Program Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s2" class="chkbx report" name="role[]" value="rep_stake"/>
                                                                        <label for="basic_checkbox_mp6s2" style="min-width: 100px;">Stakeholders Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_annual"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Annual Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_quarter"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Quarter Report</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_kra"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Budget Per KRA</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_budget_proj"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Budget Per Program</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_budget_stake"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Budget Per Stakeholders</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_visual"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Data Visualization</label>

                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_zpc"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">M&E Report Approve</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_mda"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">MDAs Report Approve</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3" class="chkbx report" name="role[]" value="rep_app_inst"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Institution Report Approve</label>
                                                                    </div>
                                                            </div>
                                                        </div><br />
                                                       
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="chkbx_audit" class="chkbx" checked />
                                                                            <label for="chkbx_audit">Audit</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp8s1" class="chkbx audit" name="role[]" value="audit_add" />
                                                                        <label for="basic_checkbox_mp8s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp8s2" class="chkbx audit" name="role[]" value="audit_edit"/>
                                                                        <label for="basic_checkbox_mp8s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp8s3" class="chkbx audit" name="role[]" value="audit_delete"/>
                                                                        <label for="basic_checkbox_mp8s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    
                                                
                          </div>