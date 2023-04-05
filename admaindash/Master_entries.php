<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
        <div id="section2" style="display: block;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active bg-primary text-white" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">WSSC</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link bg-success text-white" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">TMA</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information
                                </div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-primary p-2 rounded" style="width: fit-content;">WSSC</h3>
                              </div>
                            </div>  
                          </div>
                          <br><!-- /.card-header -->
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select id="EmpGroup" name="Employement_Group" class="form-control">
                                    <option>Choose CONTRACTUAL/CONTINGENT</option>
                                    <option>WSSC CONTRACTUAL</option>
                                    <option>WSSC CONTINGENT</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select id="Employee_Class" name="Employee_Class" class="form-control">
                                    <option>Select</option>
                                    <option>Wssc Pay</option>
                                    <option>TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select id="Employee_Group" name="Employee_Group" class="form-control">
                                    <option>Select</option>
                                    <option>WSSCS-ADMIN PAY</option>
                                    <option>WSSCS-COMMERCIAL</option>
                                    <option>WSSCS-MANAGEMENT</option>
                                    <option>WSSCS-MSW PAY</option>
                                    <option>WSSCS-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group" class="form-control">
                                    <option>Select</option>
                                    <option>WSSCS-ADMIN-CONTINGENT PAY</option>
                                    <option>WSSCS-ADMIN-CONTRACTUAL PAY</option>
                                    <option>WSSCS-COMMERCIAL-CONTINGENT</option>
                                    <option>WSSCS-COMMERCIAL-CONTRACT</option>
                                    <option>WSSCS-MANAGEMENT</option>
                                    <option>WSSCS-MSW-CONTINGENT PAY</option>
                                    <option>WSSCS-MSW-CONTINGENT PAY (EXT.)</option>
                                    <option>WSSCS-MSW-CONTRACTUAL PAY</option>
                                    <option>WSSCS-WATER-CONTINGENT PAY</option>
                                    <option>WSSCS-WATER-CONTRACTUAL PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select id="Employee_Quota" name="Employee_Quota" class="form-control">
                                    <option>Select</option>
                                    <option>DECEASED SON</option>
                                    <option>DISABLED</option>
                                    <option>LETTER OF INTEREST</option>
                                    <option>MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select id="" name="Grade_tma" class="form-control">
                                    <option>Select</option>
                                    <option>CONTINGENT</option>
                                    <option>COVID-19</option>
                                    <option>DAILY WAGE</option>
                                    <option>INTERNSHIP</option>
                                    <option>M–1</option>
                                    <option>M–3</option>
                                    <option>M–4</option>
                                    <option>M–5</option>
                                    <option>M–6</option>
                                    <option>M–7</option>
                                    <option>S–1</option>
                                    <option>S–2</option>
                                    <option>S–3</option>
                                    <option>S–4</option>
                                    <option>STREAM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department" id="Department" class="form-control">
                                    <option>Select</option>
                                    <option>ADMINISTRATION</option>
                                    <option>COMMERCIAL</option>
                                    <option>SANITATION</option>
                                    <option>WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle" class="form-control">
                                    <option>Select</option>
                                    <option>CHIEF EXECUTIVE OFFICER</option>
                                    <option>GM (HR, ADMIN &amp; PROCUREMENT)</option>
                                    <option>MANAGER SOLID WASTE</option>
                                    <option>SENIOR MANAGER COMMERCIAL</option>
                                    <option>DY.MANAGER-ADMIN &amp; PROCUREMENT</option>
                                    <option>AM-WATER SUPPLY</option>
                                    <option>DY.MANAGER-SOLID WASTE</option>
                                    <option>MANAGER WATER SUPPLY OPERATIONS</option>
                                    <option>COMPLAINT MANAGEMENT OFFICER</option>
                                    <option>MECHANICAL OFFICER</option>
                                    <option>ASST.MANAGER HUMAN RESOURCE</option>
                                    <option>CHIEF FINANCIAL OFFICER</option>
                                    <option>DY.MANAGER ACCOUNTS</option>
                                    <option>ADMIN AND PROCUREMENT OFFICER</option>
                                    <option>AM-WATER SUPPLY</option>
                                    <option>ACCOUNTS JUNIOR</option>
                                    <option>BILLING OFFICER</option>
                                    <option>COMPUTER OPERATOR</option>
                                    <option>ACCOUNTS OFFICER</option>
                                    <option>ASSOCIATE ENGINEER</option>
                                    <option>FLEET CUM MECHANICAL OFFICER</option>
                                    <option>IT ASSISTANT</option>
                                    <option>AM-SOLID WASTE</option>
                                    <option>BILLING OFFICER</option>
                                    <option>ADMIN AND PROCUREMENT OFFICER</option>
                                    <option>TECHNICAL EXPERT NETWORK &amp; SYSTEMS</option>
                                    <option>RECEPTIONIST</option>
                                    <option>CAMERA MAN</option>
                                    <option>LEGAL ADVISOR</option>
                                    <option>ADMIN ASSISTANT</option>
                                    <option>DATA ENTRY ASSISTANT</option>
                                    <option>AM–FINANCE</option>
                                    <option>MEDIA OFFICER</option>
                                    <option>OFFICE BOY</option>
                                    <option>PAYROLL OFFICER</option>
                                    <option>DRIVER</option>
                                    <option>GM OPERATIONS &amp; ENGINEERING SERVICES</option>
                                    <option>TW OPERATOR</option>
                                    <option>LINE MAN</option>
                                    <option>ASSIST TO MANAGER OPS</option>
                                    <option>VALVE MAN</option>
                                    <option>WELDER</option>
                                    <option>BILLING SUPERVISOR</option>
                                    <option>LINE INSPECTOR</option>
                                    <option>HELPER</option>
                                    <option>WATER SUPPLY INSPECTOR</option>
                                    <option>BILLING BOY</option>
                                    <option>VALVE WOMAN</option>
                                    <option>SANITARY WORKER</option>
                                    <option>WATCHMAN</option>
                                    <option>SANITARY SUPERVISOR</option>
                                    <option>SANITARY CONDUCTOR</option>
                                    <option>INTERN-CIVIL ENGINEER</option>
                                    <option>SANITARY DRIVER</option>
                                    <option>STREAM INSPECTOR</option>
                                    <option>STREAM WORKER</option>
                                    <option>DRIVER TO CEO</option>
                                    <option>EXCAVATOR OPERATOR</option>
                                    <option>INTERN-ASSOCIATE ENGINEER</option>
                                    <option>LEGAL ADVISOR</option>
                                    <option>LETIGATION CLERK</option>
                                    <option>MSW SORTING SPECIALIST</option>
                                    <option>MANAGMENT TRAINEE OFFICER</option>
                                    <option>COVID19 WORKER</option>
                                    <option>WELDER</option>
                                    <option>HELPER TO PIPE FITTER</option>
                                    <option>SANITARY DRIVER</option>
                                    <option>HELPER</option>
                                    <option>BCC SUPERVISOR</option>
                                    <option>BCC COORDINATOR</option>
                                    <option>INTERN-ELECTRICAL ENGINEER</option>
                                    <option>INTERN-MEDIA COMMUNICATION</option>
                                    <option>WATER SUPPLY SPECIALIST</option>
                                    <option>ASSOCIATE ENGINEER</option>
                                    <option>VALVE MAN</option>
                                    <option>COOK</option>
                                    <option>OFFICE ASSISTANT</option>
                                    <option>INTERNEE</option>      
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode" class="form-control">
                                    <option>Select</option>
                                    <option>BANK TRANSFER</option>
                                    <option>CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status" id="Status" class="form-control">
                                    <option>Select</option>
                                    <option>CONTRACT EXP</option>
                                    <option>ON-DUTY</option>
                                    <option>OTHER</option>
                                    <option>PROBATION</option>
                                    <option>REPATRIATED</option>
                                    <option>RESIGNED</option>
                                    <option>RETIRED</option>
                                    <option>SALARY HOLD</option>
                                    <option>TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input type="text" id="EmployeeNowssp" name="EmployeeNowssp" placeholder="Employee NO" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Manager</label>
                                  <input type="text" name="Employee_Manager" id="Employee_Manager" placeholder="Employee Manager" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" name="Joining_Date" id="Joining_Date" placeholder="Joining Date" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input type="date" name="Contract_Expiry_Date" placeholder="" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Date</label>
                                  <input type="date" name="Last_Working_Date" placeholder="" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Attendance Supervisor</label>
                                  <input type="text" class="form-control" placeholder="Attendance Supervisor" name="Attendance_Supervisor" id="Attendance_Supervisor">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Location</label>
                                  <input type="text" name="Duty_Location" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Point</label>
                                  <input type="text" name="Duty_Point" id="Duty_Point" placeholder="Duty Point" class="form-control" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information</div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-success p-2 rounded" style="width: fit-content;">TMA</h3>
                              </div>
                            </div>
                          </div>
                          <br>
                          <!-- /.card-header -->
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select name="EmpGrupTma" class="form-control">
                                    <option>Choose Permanent/Daily Wages</option>
                                    <option>TMA PERMANENT</option>
                                    <option>TMA DAILY WAGES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select name="Employee_Class_tma" id="Employee_Class_Tma" class="form-control">
                                    <option>Select</option>
                                    <option>Wssc Pay</option>
                                    <option>TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select name="Employee_Group_tma" id="Employee_Group" class="form-control">
                                    <option>Select</option>
                                    <option>TMA-ADMIN PAY</option>
                                    <option>TMA-COMMERCIAL</option>
                                    <option>TMA-MSW PAY</option>
                                    <option>TMA-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group_tma" class="form-control">
                                    <option>Select</option>
                                    <option>TMA-ADMIN-PERMANENT PAY</option>
                                    <option>TMA-COMMERCIAL-PERMANENT PAY</option>
                                    <option>TMA-MSW-DAILY WAGES PAY</option>
                                    <option>TMA-MSW-PARMANENT PAY</option>
                                    <option>TMA-WATER-DAILY WAGES PAY</option>
                                    <option>TMA-WATER-PERMANENT PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select name="Employee_Quota_tma" id="Employee_Quota_tma" class="form-control">
                                    <option>Select</option>
                                    <option>DECEASED SON</option>
                                    <option>DISABLED</option>
                                    <option>LETTER OF INTEREST</option>
                                    <option>MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select name="Grande_tma" id="Grande_tma" class="form-control">
                                    <option>Select</option>
                                    <option>BPS-2</option>
                                    <option>BPS-3</option>
                                    <option>BPS-4</option>
                                    <option>BPS-5</option>
                                    <option>BPS-6</option>
                                    <option>BPS-7</option>
                                    <option>BPS-9</option>
                                    <option>BPS-11</option>
                                    <option>BPS-14</option>
                                    <option>BPS-16</option>
                                    <option>BPS-17</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department_name" id="Department_name" class="form-control">
                                    <option>Select</option>
                                    <option>ADMINISTRATION</option>
                                    <option>COMMERCIAL</option>
                                    <option>SANITATION</option>
                                    <option>WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle_tma" id="Job_Tiltle" class="form-control">
                                    <option>Select</option>
                                    <option>OFFICE ASSISTANT</option>
                                    <option>CLERK</option>
                                    <option>JUNIOR CLERK</option>
                                    <option>DRAFTSMAN</option>
                                    <option>DRIVER</option>
                                    <option>NAIB QASID</option>
                                    <option>SANITARY SUPERVISOR</option>
                                    <option>PIPE FITTER</option>
                                    <option>LINE MAN</option>
                                    <option>TW OPERATOR</option>
                                    <option>VALVE MAN</option>
                                    <option>HELPER TO PIPE FITTER</option>
                                    <option>WELDER</option>
                                    <option>CHIEF SANITARY INSPECTOR</option>
                                    <option>ASSTT:SANITARY INSPECTOR</option>
                                    <option>BLACKSMITH</option>
                                    <option>SANITARY WORKER</option>
                                    <option>MALARIA INSPECTOR</option>
                                    <option>MALARIA SUPERVISOR</option>
                                    <option>MOTOR TRANSPORT OFFICER</option>
                                    <option>WATER RATE COLLECTOR</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode_tma" id="Salary_Mode" class="form-control">
                                    <option>Select</option>
                                    <option>BANK TRANSFER</option>
                                    <option>CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status_tma" id="Status_tma" class="form-control">
                                    <option>Select</option>
                                    <option>CONTRACT EXP</option>
                                    <option>ON-DUTY</option>
                                    <option>OTHER</option>
                                    <option>PROBATION</option>
                                    <option>REPATRIATED</option>
                                    <option>RESIGNED</option>
                                    <option>RETIRED</option>
                                    <option>SALARY HOLD</option>
                                    <option>TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input id="EmployeeNo_tma" type="text" name="EmployeeNo_tma" placeholder="Employee NO" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Manager</label>
                                  <input type="text" name="Employee_Manager_tma" id="Employee_Manager" placeholder="Employee Manager" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" name="Joining_Date_tma" placeholder="Joining Date" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input type="date" name="Contract_Expiry_Date_tma" id="Contract_Expiry_Date_tma" placeholder="" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Day</label>
                                  <input type="date" name="Last_Working_Day" id="Last_Working_Day" placeholder="" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label> Attendance Supervisor</label>
                                  <input class="form-control" type="text" placeholder="Attendance Supervisor" name="Attendance_Supervisor_tma" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Location</label>
                                  <input type="text" name="Duty_Location_tma" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Duty Point</label>
                                <input type="text" name="Duty_Point_tma" placeholder="Duty Point" class="form-control" autocomplete="off">
                              </div>
                            </div>
                          </div>
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                    <input style="background-color: darkblue;" onclick="validateSection2()" type="button" class="btn text-white  float-right shadow" value="Next">
                    
                  </div>
                </div>
              </div>
        </div>
    </div>
<?php include('link/desigene/script.php')?>
</body>
</html>