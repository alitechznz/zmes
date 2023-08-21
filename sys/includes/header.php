
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>ZMES</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<link rel="icon" type="image/png" href="images/smz-trans.png">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="step.css">
     <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  	<!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="plugins/iCheck/all.css">
	 <!-- fullCalendar -->
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- DataTables
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
		 <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
    <!-- <link rel="stylesheet" href="datatable_yetu/jquery.dataTables.min.css">
    <link rel="stylesheet" href="datatable_yetu/buttons.dataTables.min.css"> -->
    
    <!-- data table -->
<link href="datatable/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="datatable/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="datatable/jss/jquery-3.5.1.js"></script>
<script src="datatable/jss/jquery.dataTables.min.js"></script>
<script src="datatable/jss/dataTables.buttons.min.js"></script>
<script src="datatable/jss/jszip.min.js"></script>
<script src="datatable/jss/pdfmake.min.js"></script>
<script src="datatable/jss/vfs_fonts.js"></script>
<script src="datatable/jss/buttons.html5.min.js"></script>
<script src="datatable/jss/buttons.print.min.js"></script>

 <!-- Select2 -->
 <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
<!-- <link href="form/form-validation.css" rel="stylesheet"> -->
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- multiselect library link -->
   
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        //alert(inputValue);
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
  	<style type="text/css">

.select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color: #458a42;
}

  		.mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

     /* chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
      }
      
      span .disable-links {
          pointer-events: none;
      }
      
      
  .required-input {
    border: 1px solid #ccc;
  }
  .required-input.clicked {
    border-color: red;
  }
  
  	</style>
  	
  	 <style>
      .blink {
        animation: blinker 0.8s linear infinite;
        color: #1c87c9;
        font-size: 14px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      .blink-one {
        animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {
        0% {
          opacity: 0;
        }
      }
      .blink-two {
        animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {
        100% {
          opacity: 0;
        }
      }
    </style>
  	
  	<script type="text/javascript">
  	
  	 function proj_cost(num) {
  	     //alert(num);
         var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
         document.getElementById("proj_cost").value = rep_num;
         document.getElementById("proj_cost2").value = rep_num;
     }
     
      function proj_disbursed(num) {
         var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
         document.getElementById("proj_disbursed").value = rep_num;
     }
  	
    function showFP(str) {
        // alert(str);
        if (str == "") {
            document.getElementById("responsibleOfficer").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("responsibleOfficer").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getresponsible.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
function showplan_theme1(str){
  
$.ajax({
  url: 'getplantheme.php',
  type: 'POST',
  data: { },
  success: function(response) {
    // Process the response and update the HTML elements
    $('#plan_theme').html(response.data1);
    $('#plan_aspiration').html(response.data2);
  },
  error: function(xhr, status, error) {
    console.error(error);
  }
});

}

 function showplan_theme(str) {
        if (str == "") {
            document.getElementById("plan_theme").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("plan_theme").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getplantheme.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function ShowKPIvalue(str) {
        if (str == "") {
            document.getElementById("getkpivalue").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getkpivalue").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_kpi_value.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
    
    function ShowKPIUnit(str) {
        if (str == "") {
            document.getElementById("get_kpi_unit").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("get_kpi_unit").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_kpi_unit.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function ShowKPIUnit_e(str) {
        if (str == "") {
            document.getElementById("get_kpi_unit_e").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("get_kpi_unit_e").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_kpi_unit.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
    
    function ShowmeKPI(str) {
        
        if(str == "") {
            document.getElementById("kpi_indicator_plan").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("kpi_indicator_plan").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getplankpi.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
    function ShowStrategyArea(str){
        if (str == "") {
            document.getElementById("strategyarea_id").innerHTML = "";
            document.getElementById("edit_strategyarea_id").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("strategyarea_id").innerHTML = this.responseText;
                    document.getElementById("edit_strategyarea_id").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getstrategyarea.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
    function showProjectlist(str){
         var proj_type = document.getElementById("project_type").value;
         var program_id = document.getElementById("ProjectBlock").value;
         
         if (str == "") {
            document.getElementById("projectlist_section").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("projectlist_section").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getprojectlists.php?program="+program_id+"&type="+proj_type+"&status="+str,true);
            xmlhttp.send();
        }
    }
    
    function ShowPriorityArea(str) {
        if (str == "") {
            document.getElementById("priorityarea").innerHTML = "";
            document.getElementById("edit_priorityarea").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("priorityarea").innerHTML = this.responseText;
                    document.getElementById("edit_priorityarea").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getpriorityarea.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
    function getOutcome(str) {
        //alert(str);
        if (str == "") {
            document.getElementById("outcome_statement").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("outcome_statement").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_outcome.php?q="+str,true);
            xmlhttp.send();
        }
    }

function ShowPlanValue(str) {
         //alert(str);
         var proj = document.getElementById("project_idp").value;
        // alert(proj);
                if (str == "") {
                    document.getElementById("planidvalue").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("planidvalue").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","getplanvalue.php?q="+str+"&p="+proj,true);
                    xmlhttp.send();
                }
       
}

function ProgramReport(str) {
         var kra_search = document.getElementById("kra_search").value;
         var sector_search = document.getElementById("sector_search").value;
         var program_search = document.getElementById("program_search").value;
         var sponser_search = document.getElementById("sponser_search").value;
         
         var dateV = document.getElementById("reservation").value;
         var dateRange = dateV.split('-');
         var FromDate = dateRange[0];
         var ToDate = dateRange[1];
         
         var budgeterm_search = document.getElementById("budgeterm_search").value;
         
        /* 
        alert("kra: "+kra_search);
        alert("sector:"+sector_search);
        alert("program:"+program_search);
        alert("sponser:"+sponser_search);
        alert("dateV:"+dateV);
        alert("budgeterm:"+budgeterm_search);
        */
        
                if (str == "") {
                    document.getElementById("searchResult").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("searchResult").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","getprogramsearchengine.php?program="+program_search+"&kra="+kra_search+"&sector="+sector_search+"&sponser="+sponser_search+"&datet="+ToDate+"&budget="+budgeterm_search+"&datef="+FromDate,true);
                    xmlhttp.send();
                }
       
}


function ShowInternalCode(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("internalcode").value = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("internalcode").value = this.responseText;
                }
            };
            xmlhttp.open("GET","getinternalcode.php?q="+str,true);
            xmlhttp.send();
        }
}

function showLGAsRegion(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("districtLGAs").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("districtLGAs").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getwilaya.php?q="+str,true);
            xmlhttp.send();
        }
}

 function showLGAsDistrict(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("responsibleShehia").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("responsibleShehia").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getshehia.php?q="+str,true);
            xmlhttp.send();
        }
}

function getenddate(str) {
         
    var duration = document.getElementById("duration").value;
	var unit = document.getElementById("duration_period").value;
    var str = document.getElementById("startdate").value;

    //     alert(str);
    //     alert(duration);
    //     alert(unit);
	//     var end_date = new Date(str);
	// //alert(end_date);
	

	// if(unit =="Year"){
	//     end_date = end_date.setFullYear(end_date.getFullYear()+duration);
    //     alert(end_date);
	// } else {
    //     end_date = end_date.setDate(end_date.getDate()+durati);
    //     alert(end_date);
    // }
		 
        if (str == "") {
            document.getElementById("getenddate").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getenddate").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET","getenddate.php?q="+str+"&dur="+duration+"&unit="+unit,true);
            xmlhttp.send();
        }
}


function FetchProject(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("project_fetchList").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("project_fetchList").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getfetchproject.php?q="+str,true);
            xmlhttp.send();
        }
}

function showproject(str){
   // alert(str);
    var type = 'org';
    if (str == "") {
            document.getElementById("getprojectlist").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getprojectlist").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getprojectlist.php?q="+str+"&type="+type,true);
            xmlhttp.send();
        }
      
}

function showproj_activity(str){
    var type = 'activity';
    if (str == "") {
            document.getElementById("getactivity").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getactivity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getprojectlist.php?q="+str+"&type="+type,true);
            xmlhttp.send();
        }
      
}


function showproj_finance(str){
    var mwezi = document.getElementById("getmonths").value;
    var mradi = document.getElementById("getprojectlist").value;
    var bdgterm = document.getElementById("budgeterm").value;
    var act = document.getElementById("getactivity").value;
    
    if (str == "") {
            document.getElementById("get_project_budget").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("get_project_budget").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getbudget.php?q="+act+"&budget="+bdgterm+"&mwezi="+mwezi+"&mradi="+mradi,true);
            xmlhttp.send();
        }
      
}

function showproj_org(str){
  
    if (str == "") {
            document.getElementById("taasisilist").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("taasisilist").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getbudget_org.php?q="+str,true);
            xmlhttp.send();
        }
      
}

function showproject_budget(str){
   // alert(str);
    var type = 'budget';
    var mwezi = document.getElementById("months").value;

    if (str == "") {
            document.getElementById("get_project_budget").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("get_project_budget").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getprojectlist.php?q="+str+"&type="+type+"&mwezi="+mwezi,true);
            xmlhttp.send();
        }
}
  	
function showOutcome(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("OutcomeStatement").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("OutcomeStatement").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getoutcome.php?q="+str,true);
            xmlhttp.send();
        }
}

function ShowUnit(str) {
        // alert(str);
        if (str == "") {
            document.getElementById("UnitSection").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("unitSection").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getunit.php?q="+str,true);
            xmlhttp.send();
        }
}


function showDepartment(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("department").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("department").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getdepartment.php?q="+str,true);
            xmlhttp.send();
        }
}

function showkra(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("getprojectlist").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getprojectlist").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getprojectlist.php?q="+str,true);
            xmlhttp.send();
        }
}


function showPermission(str) {
         //alert(str);
        if (str == "") {
            document.getElementById("UpdateRole").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("UpdateRole").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getrole.php?q="+str,true);
            xmlhttp.send();
        }
}

function showProjectProgram(str){
//   alert(str);
$("#ProjectBlock").css("display","none");
  if(str == 'Program') {
    $("#ProjectBlock").css("display","none");
  } else if(str == 'Project'){
    $("#ProjectBlock").css("display","block");
  }
}
</script>
</head>
