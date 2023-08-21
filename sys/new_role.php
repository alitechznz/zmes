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
                                                                            <label for="chkbx_dashboard">All User Role</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp1s1" name="role[]" value="da_det" class="chkbx dashboard"  />
                                                                        <label for="basic_checkbox_mp1s1" style="min-width: 100px;">Admin</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s2" name ="role[]" value="da_pub" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s2" style="min-width: 100px;">M&E Commissioner</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">M&E Officer</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">Focal Person (FP)</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">Planning Director (DPPR) </label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">Ministry Principal Secretary </label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3" name="role[]" value="da_lg" class="chkbx dashboard"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">ZPC Executive Secretary </label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                          </div>