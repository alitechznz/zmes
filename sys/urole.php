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
   
   <div class="col-md-12" style="margin: 0px 0%; padding: 0px 3%;">
                              <h4>PERMISSION:</h4>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox1_mp1s1" name="role[]" value="da_det" class="uchkbx udashboard"  />
                                                                        <label for="basic_checkbox1_mp1s1" style="min-width: 100px;">Agenda details</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp1s2" name ="role[]" value="da_pub" class="uchkbx udashboard"/>
                                                                        <label for="basic_checkbox1_mp1s2" style="min-width: 100px;">Publication</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp1s3" name="role[]" value="da_lg" class="uchkbx udashboard"/>
                                                                        <label for="basic_checkbox1_mp1s3" style="min-width: 100px;">Local Government</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_agenda" class="uchkbx" checked />
                                                                            <label for="uchkbx_agenda">Agenda</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s1" name="role[]" value="ag_add" class="uchkbx uagenda"/>
                                                                        <label for="basic_checkbox1_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s2" name="role[]" value="ag_edit" class="uchkbx uagenda"/>
                                                                        <label for="basic_checkbox1_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s3" name="role[]" value="ag_delete" class="uchkbx uagenda"/>
                                                                        <label for="basic_checkbox1_mp2s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #F8F8FF;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_kra" class="uchkbx ukra" checked />
                                                                            <label for="uchkbx_kra">Key Result Area (KRA)</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx ukra" name="role[]" value="kra_add"/>
                                                                        <label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx ukra" name="role[]" value="kra_edit"/>
                                                                        <label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp3s3" class="uchkbx ukra" name="role[]" value="kra_delete"/>
                                                                        <label for="basic_checkbox1_mp3s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_outcome" class="uchkbx" checked />
                                                                            <label for="uchkbx_outcome">Outcome</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox11_mp2s1" class="uchkbx uoutcome" name="role[]" value="out_add"/>
                                                                        <label for="basic_checkbox11_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s2" class="uchkbx uoutcome" name="role[]" value="out_edit"/>
                                                                        <label for="basic_checkbox1_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx uoutcome" name="role[]" value="out_delete"/>
                                                                        <label for="basic_checkbox1_mp2s3" style="min-width: 100px;">Delete</label>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox1_mp3s1" class="uchkbx urole" name="role[]" value="role_add"/>
                                                                        <label for="basic_checkbox1_mp3s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp3s2" class="uchkbx urole" name="role[]" value="role_edit"/>
                                                                        <label for="basic_checkbox1_mp3s2" style="min-width: 100px;">Edit</label>
                                                                      
                                                                    </div>
                                                            </div>
                                                        </div>
                                                         <div class="row" style="background-color: #FFFAF0;">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="uchkbx_stakeholder" class="uchkbx" checked />
                                                                            <label for="uchkbx_stakeholder">Stakeholder</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s1" class="uchkbx ustakeholder" name="role[]" value="stake_org"/>
                                                                        <label for="basic_checkbox1_mp2s1" style="min-width: 100px;">Organization</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s2" class="uchkbx ustakeholder" name="role[]" value="stake_user"/>
                                                                        <label for="basic_checkbox1_mp2s2" style="min-width: 100px;">M&E Users</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp2s31" class="chkbx stakeholder" name="role[]" value="stake_donor"/>
                                                                        <label for="basic_checkbox_mp2s31" style="min-width: 100px;">Sponsor|Donor</label>
                                                                        <input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstorg"/>
                                                                        <label for="basic_checkbox1_mp2s3" style="min-width: 100px;">View Organizations</label>
                                                                         <input type="checkbox" id="basic_checkbox1_mp2s3" class="uchkbx ustakeholder" name="role[]" value="stake_lstuser"/>
                                                                        <label for="basic_checkbox1_mp2s3" style="min-width: 100px;">View Users</label>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp3s11" class="uchkbx uconf" name="role[]" value="conf_term"/>
                                                                        <label for="basic_checkbox_mp3s11" style="min-width: 100px;">Budget Term</label></label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s2" class="uchkbx uconf" name="role[]" value="conf_source"/>
                                                                        <label for="basic1_checkbox_mp3s2" style="min-width: 100px;">Source of Finance</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_particular" />
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Finance Particular</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx uconf" name="role[]" value="conf_submit"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Submission Date</label>
                                                                         <input type="checkbox" id="basic_checkbox_mp3s31" class="chkbx conf" name="role[]" value="conf_sector"/>
                                                                        <label for="basic_checkbox_mp3s31" style="min-width: 100px;">Sector</label>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic1_checkbox_mp2s1" class="uchkbx uproj" name="role[]" value="proj_add"/>
                                                                        <label for="basic1_checkbox_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp2s2" class="uchkbx uproj" name="role[]" value="proj_edit"/>
                                                                        <label for="basic1_checkbox_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_delete"/>
                                                                        <label for="basic1_checkbox_mp2s3" style="min-width: 100px;">Delete</label>
                                                                         <input type="checkbox" id="basic1_checkbox_mp2s3" class="uchkbx uproj" name="role[]" value="proj_view"/>
                                                                        <label for="basic1_checkbox_mp2s3" style="min-width: 100px;">View</label>
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
                                                                    <div class="demo-checkbox">
                                                                      
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_workplan"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Workplan</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_kra"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">KRA</label>
                                                                         <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_resource"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Resource Tracking</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_quarter"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Quarterly Report</label>
                                                                         <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_annual"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Annual Report</label>
                                                                         <input type="checkbox" id="basic1_checkbox_mp3s3" class="uchkbx umonitor" name="role[]" value="mon_monitor"/>
                                                                        <label for="basic1_checkbox_mp3s3" style="min-width: 100px;">Monitoring Form</label>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic1_checkbox_mp4s1" class="uchkbx ubudget" name="role[]" value="budg_add" />
                                                                        <label for="basic1_checkbox_mp4s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp4s2" class="uchkbx ubudget" name="role[]" value="budg_edit" />
                                                                        <label for="basic1_checkbox_mp4s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp4s3" class="uchkbx ubudget" name="role[]" value="budg_delete" />
                                                                        <label for="basic1_checkbox_mp4s3" style="min-width: 100px;">Delete</label>
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
                                                                            <input type="checkbox" id="uchkbx_report" class="uchkbx" checked />
                                                                            <label for="uchkbx_report">Reports</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s1" class="uchkbx ureport" name="role[]" value="rep_project"/>
                                                                        <label for="basic1_checkbox_mp6s1" style="min-width: 100px;">Project/Program Report</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s2" class="uchkbx ureport" name="role[]" value="rep_stake"/>
                                                                        <label for="basic1_checkbox_mp6s2" style="min-width: 100px;">Stakeholders Report</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_annual"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Annual Report</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_quarter"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Quarter Report</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_kra"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per KRA</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_proj"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per Program</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_budget_stake"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Budget Per Stakeholders</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp6s3" class="uchkbx ureport" name="role[]" value="rep_visual"/>
                                                                        <label for="basic1_checkbox_mp6s3" style="min-width: 100px;">Data Visualization</label>
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
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic1_checkbox_mp8s1" class="uchkbx uaudit" name="role[]" value="audit_add" />
                                                                        <label for="basic1_checkbox_mp8s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp8s2" class="uchkbx uaudit" name="role[]" value="audit_edit"/>
                                                                        <label for="basic1_checkbox_mp8s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic1_checkbox_mp8s3" class="uchkbx uaudit" name="role[]" value="audit_delete"/>
                                                                        <label for="basic1_checkbox_mp8s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    
                                                
                          </div>