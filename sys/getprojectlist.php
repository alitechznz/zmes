<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
if(isset($_GET['type'])){
      if($_GET['type'] == 'org'){
            $sqls="SELECT * FROM project_targetgroup WHERE Institution='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            echo '<option value=" ">-- Select --</option>';
            while($rows = mysqli_fetch_array($results)) {	
                  $proj_id = $rows['Project'];
                  $sql="SELECT * FROM projecttb WHERE ID='$proj_id'"; 
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)) {	
                        echo '<option value="'.$row['ID'].'">'.$row['pTitle'].'</option>';
                  } 
            }
      } elseif($_GET['type'] == 'activity'){
            $sqls="SELECT * FROM project_activity WHERE Project='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            echo '<option value=" ">-- Select --</option>';
            while($rows = mysqli_fetch_array($results)) {	
                  $proj_id = $rows['Project'];
                  echo '<option value="'.$rows['activityID'].'">'.$rows['Activity'].'</option>';
            }
      } elseif($_GET['type'] == 'budget'){
            $get_mwezi = $_GET['mwezi'];
            $proj_dis_smz = 0;
            $proj_dis_wm = 0;
            $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
            $sqls="SELECT * FROM miradi WHERE MiradiID='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            
            while($rows = mysqli_fetch_array($results)) {	
                  $proj_pln_smz = $rows['MpangoSMZ'];
                  $proj_pln_wm = $rows['MpangoWM'];
                  $proj_pln_total = $rows['MpangoJumla'];

                  if($get_mwezi =='January'){
                     $proj_dis_smz = $rows['JanuariSMZ'];
                     $proj_dis_wm = $rows['JanuariWM'];
                     $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  } elseif($get_mwezi =='February'){
                     $proj_dis_smz = $rows['FebruariSMZ'];
                     $proj_dis_wm = $rows['FebruariWM'];
                     $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='March'){
                        $proj_dis_smz = $rows['MachiSMZ'];
                        $proj_dis_wm = $rows['MachiWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='April'){
                        $proj_dis_smz = $rows['ApriliSMZ'];
                        $proj_dis_wm = $rows['ApriliWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='May'){
                        $proj_dis_smz = $rows['MeiSMZ'];
                        $proj_dis_wm = $rows['MeiWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='June'){
                        $proj_dis_smz = $rows['JuniSMZ'];
                        $proj_dis_wm = $rows['JuniWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }
                  elseif($get_mwezi =='July'){
                        $proj_dis_smz = $rows['JulaiSMZ'];
                        $proj_dis_wm = $rows['JulaiWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='August'){
                        $proj_dis_smz = $rows['AgoastiSMZ'];
                        $proj_dis_wm = $rows['AgoastiWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='September'){
                        $proj_dis_smz = $rows['SeptembaSMZ'];
                        $proj_dis_wm = $rows['SeptembaWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='October'){
                        $proj_dis_smz = $rows['OktobaSMZ'];
                        $proj_dis_wm = $rows['OktobaWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='November'){
                        $proj_dis_smz = $rows['NovembaSMZ'];
                        $proj_dis_wm = $rows['NovembaWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }elseif($get_mwezi =='December'){
                        $proj_dis_smz = $rows['DisembaSMZ'];
                        $proj_dis_wm = $rows['DisembaWM'];
                        $proj_dis_total = $proj_dis_smz + $proj_dis_wm;
                  }



                  
                        echo
                        '<div class="col-md-12" >
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Planned Amount (Fedha Zilizopangwa)</label>
                                  </div>
                              </div>
                              
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                             <label>Government (SMZ)</label>   
                                            <input type="number" class="form-control" min="0" value="'.$proj_pln_smz.'" name="psmz" id="psmz" onkeyup="plannedfn(this)" required />
                                        </div>
                                  </div>
                              </div>
                               <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                             <label>Development Partner (WM)</label>   
                                            <input type="number" class="form-control" min="0" value="'.$proj_pln_wm.'" name="pwm" id="pwm" onkeyup="plannedfn(this)" required />
                                        </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                             <label>Total Amount</label>   
                                            <input type="number" class="form-control" value="'.$proj_pln_total.'" name="ptotal" id="ptotal" readonly />
                                        </div>
                                  </div>
                              </div>
                        </div>
                        <div class="col-md-12">
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Amount (Fedha Zilizopatikana)</label>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Government (SMZ)</label>   
                                                <input type="number" class="form-control" min="0" value="'.$proj_dis_smz.'" name="dsmz" id="dsmz" onkeyup="plannedfn(this)" required />
                                            </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Development Partner (WM)</label>   
                                                <input type="number" class="form-control" min="0" value="'.$proj_dis_wm.'" name="dwm" id="dwm" onkeyup="plannedfn(this)" required />
                                            </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Total Amount</label>   
                                                <input type="number" class="form-control" value="'.$proj_dis_total.'" name="dtotal" id="dtotal" readonly />
                                            </div>
                                      </div>
                                  </div>
                                
                            </div>
                        ';
            }

      }

     // echo '<option value="1">ali ffff</option>';
} else {
      $sql="SELECT * FROM project_kra 
      INNER JOIN projecttb ON project_kra.Project = projecttb.ID 
       INNER JOIN keyarea ON project_kra.KRA = keyarea.IDNo 
      WHERE project_kra.KRA ='$ID_get'"; 

      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)) {	
            echo '<option value="'.$row['ID'].'">'.$row['pTitle'].'</option>';
      }  

      //echo '<option value="1">ali ffff</option>';
}





?>