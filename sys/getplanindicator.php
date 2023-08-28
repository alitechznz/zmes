<?php
include 'includes/conn.php';
$ID_get = $_GET['q'];
$ind_def = [];
$ind_baseline = [];
$ind_target = [];
$ind_source = [];
$ind_frequency = [];
$ind_responsible = [];

$sql="SELECT * FROM kpi_baseline WHERE kpi_id ='$ID_get'";
$num = 0;
$result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        $ind_def[$num] = $row['kpi_definition'];
        $ind_baseline[$num] = $row['baseline_name'];
        $ind_target[$num] = $row['target_name'];
        $ind_source[$num] = $row['data_source'];
        $ind_frequency[$num] = $row['frequency'];
        $ind_responsible[$num] = $row['sector'];
        $num +=1;
    }

    $ind_def_l = count($ind_def);
    $ind_baseline_l = count($ind_baseline);
    $ind_target_l = count($ind_target);
    $ind_source_l = count($ind_source);
    $ind_frequency_l = count($ind_frequency);
    $ind_responsible_l = count($ind_responsible);

    $SectorName = '';
    $sector_temp = '';

echo '<div class="col-md-4">
        <div class="form-group">
            <label>Definition of Indicator :</label>';
            if($ind_def_l == 0){
                echo '<input type="text" class="form-control" name="definition" placeholder=" Enter definition ..." required/>';
            } else {
               echo '<select class="form-control select2" style="width: 100%;" name="definition" required>';
               echo '<option value="Select">Select ...</option>';
               $readElements = array();
               foreach($ind_def as $def_value){
                    if (!in_array($def_value, $readElements)) {
                        echo '<option value="'.$def_value.'">'.$def_value.'</option>';
                        $readElements[] = $def_value;
                    }
               }
               echo '</select>';
            }
        echo '</div>
     </div>
     <div class="col-md-4">
        <div class="form-group">
            <label>Baseline :</label>';
            if($ind_baseline_l == 0){
               echo '<input type="text" class="form-control" name="baseline"  placeholder=" Enter baseline ..." required/>';
            } else {
                echo '<select class="form-control select2" style="width: 100%;" name="baseline" required>';
                echo '<option value="Select">Select ...</option>';
                $readElements = array();
                foreach($ind_baseline as $baseline_value){
                    if (!in_array($baseline_value, $readElements)) {
                        echo '<option value="'.$baseline_value.'">'.$baseline_value.'</option>';
                        $readElements[] = $baseline_value;
                    }
                }
                echo '</select>';
            }
        echo '</div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Target :</label>';
            if($ind_target_l == 0){
                echo ' <input type="text" class="form-control" name="target" placeholder=" Enter target ..." required/>';
            } else {
                 echo '<select class="form-control select2" style="width: 100%;" name="target" required>';
                 echo '<option value="Select">Select ...</option>';
                 $readElements = array();
                 foreach($ind_target as $target_value){
                    if (!in_array( $target_value, $readElements)) {
                     echo '<option value="'.$target_value.'">'.$target_value.'</option>';
                     $readElements[] =  $target_value;
                    }
                 }
                 echo '</select>';
            }
           
        echo '</div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Source Of Data :</label>';
            if($ind_source_l == 0){
                echo '<input type="text" class="form-control" name="source" placeholder=" Enter source ..." required/>';
            } else {
                 echo '<select class="form-control select2" style="width: 100%;" name="source" required>';
                 echo '<option value="Select">Select ...</option>';
                 $readElements = array();
                 foreach($ind_source as $source_value){
                    if (!in_array($source_value, $readElements)) {
                        echo '<option value="'.$source_value.'">'.$source_value.'</option>';
                        $readElements[] = $source_value;
                    }
                 }
                 echo '</select>';
            }
        
        echo '</div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Frequence :</label>';
            if($ind_frequency_l == 0){
                echo '<input type="text" class="form-control" name="frequency" placeholder=" Enter frequency ..." required/>';
            } else {
                 echo '<select class="form-control select2" style="width: 100%;" name="frequency" required>';
                 echo '<option value="Select">Select ...</option>';
                 $readElements = array();
                 foreach($ind_frequency as $frequency_value){
                    if (!in_array($frequency_value, $readElements)) {
                     echo '<option value="'.$frequency_value.'">'.$frequency_value.'</option>';
                     $readElements[] = $frequency_value;
                    }
                 }
                 echo '</select>';
            } 
        echo '</div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Responsible :</label>';
            if($ind_frequency_l == 0){
                echo ' <input type="text" class="form-control" name="responsible"  placeholder=" Enter responsible ..." required/>';
            } else {
                echo '<select class="form-control select2" style="width: 100%;" name="responsible" required>';
                 echo '<option value="Select">Select ...</option>';
                 $readElements = array();
                foreach ($ind_responsible as $values) {
                    if (!in_array($values, $readElements)) {
                        $query2 = "SELECT * FROM organizationtb WHERE ID = '$values'"; 
                        $result2 = mysqli_query($conn, $query2) or die("Error : ".mysqli_error($conn));
                        if($row2 = mysqli_fetch_array($result2)){
                            $SectorName = $row2['Name'];
                            echo '<option value="'.$SectorName.'">'.$SectorName.'</option>';
                            $num_array +=1;
                        }
                        $readElements[] = $values;
                    }
                }
                echo '</select>';
            }
           echo '</div>
        </div>
    </div> 
    <div class="col-md-12">
        <div class="modal-footer">
            <a href="m&e.php?id=<?php echo $get_id; ?>" class="btn btn-default btn-flat pull-left"><i class="fa fa-close"></i> Clean</a>
            <button type="submit" class="btn btn-primary btn-flat" name="editmeplan"><i class="fa fa-save"></i> Update</button>
        </div>
    </div>';  


?>

