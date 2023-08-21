<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(isset($_GET['q'])){
    include 'includes/conn.php';
    $id_activity = $_GET['q'];
    $mwezi = $_GET['mwezi'];
    $mradi = $_GET['mradi'];
    $budget = $_GET['budget'];

$pesa_SMZ_plan = 0;
$pesa_WM_plan = 0;
$pesa_total_plan = 0;

$pesa_SMZ_BL = 0;
$pesa_WM_BL = 0;
$pesa_total_BL = 0;

$pesa_SMZ_DA = 0;
$pesa_WM_DA = 0;
$pesa_Total_DA = 0;

$pesa_SMZ_perc = 0;
$pesa_WM_perc = 0;
$pesa_total_perc = 0;


    //get the plan budget
    $plan_budget = "SELECT * FROM project_activity WHERE activityID='$id_activity'";
    $result1 = mysqli_query($conn, $plan_budget) or die("Error : ".mysqli_error($conn));
    while($row1 = mysqli_fetch_array($result1))
    {   
        $pesa_SMZ_plan = $pesa_SMZ_plan + $row1['Amount'];
        $pesa_WM_plan = $pesa_WM_plan + $row1['amountWM'];
    }
    $pesa_total_plan = $pesa_SMZ_plan + $pesa_WM_plan;
    
    
    $query = "SELECT * FROM project_annualbudget WHERE Project='$mradi' AND activity='$id_activity'";
    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
    while($row = mysqli_fetch_array($result))
    {   
        $pesa_SMZ_BL = $pesa_SMZ_BL + $row['DA_Government'];
        $pesa_WM_BL = $pesa_WM_BL + $row['DA_Donor'];
        $pesa_total_BL = $pesa_total_BL + $row['DA_Total'];
    } //end of kusoma mwaka

    // $pesa_SMZ_BL = $pesa_SMZ_plan - $pesa_SMZ_BL;
    // $pesa_WM_BL = $pesa_WM_plan - $pesa_WM_BL;
    // $pesa_total_BL = $pesa_total_plan - $pesa_total_BL;


     $queryp = "SELECT * FROM project_annualbudget WHERE Project='$mradi' AND activity='$id_activity' AND Month='$mwezi'";
    
        $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
        while($rowp = mysqli_fetch_array($resultp))
        {   
            $pesa_SMZ_DA = $pesa_SMZ_DA + $rowp['DA_Government'];
            $pesa_WM_DA = $pesa_WM_DA + $rowp['DA_Donor'];
            $pesa_Total_DA = $pesa_Total_DA + $rowp['DA_Total'];
        } //end of kusoma mwaka
        
        // $pesa_SMZ_BL = $pesa_SMZ_BL-$pesa_SMZ_DA;
        // $pesa_WM_BL = $pesa_WM_BL-$pesa_WM_DA;
        // $pesa_total_BL = $pesa_total_BL-$pesa_Total_DA;

$pesa_SMZ_perc = round(((($pesa_SMZ_BL) / $pesa_SMZ_plan) * 100),2);
$pesa_WM_perc = round(((($pesa_WM_BL) / $pesa_WM_plan) * 100),2);
$pesa_total_perc = round(((($pesa_total_BL) / $pesa_total_plan) * 100), 2);

    echo '
      <div class="col-md-12" >
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Planned Amount (Fedha Zilizopangwa) TZS</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Government (SMZ)</label>   
                                                  <input type="text" class="form-control"  name="psmz" id="psmz"  value="'.number_format($pesa_SMZ_plan).'" readonly/>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Development Partner (WM)</label>   
                                                  <input type="text" class="form-control"  name="pwm" id="pwm"  value="'.number_format($pesa_WM_plan).'" readonly/>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Total Amount</label>   
                                                  <input type="text" class="form-control"  name="ptotal" id="ptotal" value="'.number_format($pesa_total_plan).'" readonly />
                                              </div>
                                        </div>
                                    </div>
                                  
                                </div>
                              <div class="col-md-12" >
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Current Balance, TZS</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Government (SMZ)</label>   
                                                  <input type="text" class="form-control" name="cpsmz" id="cpsmz" value="'.number_format($pesa_SMZ_BL).'" readonly />
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Development Partner (WM)</label>   
                                                  <input type="text" class="form-control" name="cpwm" id="cpwm" value="'.number_format($pesa_WM_BL).'" readonly />
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <label>Total Amount</label>   
                                                  <input type="text" class="form-control"  name="cptotal" id="cptotal" value="'.number_format($pesa_total_BL).'" readonly />
                                              </div>
                                        </div>
                                    </div>
                                  
                                </div>
                                 <div class="col-md-12">
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Disbursed Percentage (Asilimia) % </label>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <label>Government (SMZ)</label>   
                                                <input type="text" class="form-control"  name="totalsmz" id="totalsmz" value="'.$pesa_SMZ_perc.'" readonly />
                                            </div>
                                      </div>
                                  </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <label>Development Partner (WM)</label>   
                                                <input type="text" class="form-control"  name="totalwm" id="totalwm" value="'.$pesa_WM_perc.'" readonly />
                                            </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <label>Total Amount(%)</label>   
                                                <input type="text" class="form-control"  name="overtotal" id="overtotal" value="'.$pesa_total_perc.'" readonly />
                                            </div>
                                      </div>
                                  </div>
                                 
                              </div>
                              <div class="col-md-12">
                                      <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Disbursed Amount (Fedha Zilizopatikana|Kutolewa) TZS</label>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label>Government (SMZ)</label>   
                                                    <input type="text" class="form-control" name="dsmz" id="dsmz" onkeyup="plannedfn(this)" value="'.number_format($pesa_SMZ_DA).'" required />
                                                </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label>Development Partner (WM)</label>   
                                                    <input type="text" class="form-control"  name="dwm" id="dwm" onkeyup="plannedfn(this)" value="'.number_format($pesa_WM_DA).'" required />
                                                </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label>Total Amount</label>   
                                                    <input type="text" class="form-control" name="dtotal" id="dtotal" value="'.number_format($pesa_Total_DA).'" readonly />
                                                </div>
                                          </div>
                                      </div>
                                    
                                </div>
                              </div>
                             
                              <div class="col-md-12">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                  <button type="submit" class="btn btn-primary btn-flat" name="addbudget"><i class="fa fa-save"></i> Save</button>
                                </div>
                              </div>
    
    
    ';
    
    
    mysqli_close($conn);
}

?>