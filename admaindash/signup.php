<?php
include('link/desigene/db.php');
session_start();
error_reporting(0);
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
} else
  {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('link/links.php')?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 40px !important;
            border: 1px solid #ced4da;
            border-radius: 0px;
            width: 100% !important;
        }
        .select2-selection__arrow {
            height: 30px !important;
        }
    </style>
</head>
<body>
    <?php include('link/desigene/sidebar.php')?>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                    <form id="registrationForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" id="empname" for="firstName">Full Name</label>
                                                    <input type="text" id="fullName" name="FullName" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label">Gender</label>
                                                    <select id="gender" name="Gender" class="form-control select2" tabindex="-1" aria-hidden="true">
                                                        <option value="">Choose</option>
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="emailAddress">Email</label>
                                                    <input type="email" name="Email" id="emailAddress" class="form-control form-control-lg" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password" name="Password" class="form-control form-control-lg" value="Wssc@123" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="Employeenumber">Employee Number</label>
                                                    <select name="Employeenumber" id="employee_no" class="form-control select2">
                                                        <!-- Options will be populated via AJAX -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label select-label">Designation</label>
                                                <select class="select form-control" name="Designation" id="designation" required>
                                                    <option disabled>Designation</option>
                                                    <option value="Admin">IT Admin</option>
                                                    <option value="CEO">CEO</option>
                                                    <option value="GM">GM</option>
                                                    <option value="HR manager">Human Resource Manager</option>
                                                    <option value="Payroll manager">Payroll Manager</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="DYManager">Deputy Manager</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                    <option value="FinanceAdmin">Finance Admin</option>
                                                    <option value="Internal Auditor">Internal Auditor</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="AppAdmin">App Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                        </div>
                                    </form>
                                </div>
                                <div class="my-5">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>FullName</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>EmployeeNumber</th>
                                                <th>Designation</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataTableBody">
                                            <!-- Data will be populated via AJAX -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
    <script>
$(document).ready(function() {
    // Initialize select2
    $(".select2").select2();

    // Load employee numbers into the dropdown
    function loadEmployeeNumbers() {
        $.ajax({
            url: "ajex/empid.php",
            type: "POST",
            success: function(data) {
                $("#employee_no").html(data);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("AJAX error:", errorThrown);
            }
        });
    }

    // Load table data
    function loadTableData() {
        $.ajax({
            url: "ajex/fetch_data.php",
            type: "POST",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $("#dataTableBody").html(response.data);
                } else {
                    console.error("Error:", response.message);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("AJAX error:", errorThrown);
            }
        });
    }

    // Fetch and display employee details when an employee number is selected
    $("#employee_no").change(function() {
        var empNo = $(this).val();
        if (empNo) {
            $.ajax({
                url: "ajex/get_employee_details.php",
                type: "POST",
                data: { EmployeeNumber: empNo },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $("#fullName").val(response.data.FullName);
                        $("#gender").val(response.data.Gender).trigger('change'); // Trigger change for select2
                        $("#emailAddress").val(response.data.Email);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("AJAX error:", errorThrown);
                }
            });
        } else {
            // Clear fields if no employee number is selected
            $("#fullName").val('');
            $("#gender").val('').trigger('change');
            $("#emailAddress").val('');
        }
    });

    // Handle form submission via AJAX
    $("#registrationForm").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: "ajex/register_user.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                alert(response.message);
                if (response.success) {
                    $("#registrationForm")[0].reset();
                    loadEmployeeNumbers(); // Reload employee numbers if needed
                    loadTableData(); // Reload table data
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("AJAX error:", errorThrown);
            }
        });
    });

    // Handle delete button click via AJAX
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault(); // Prevent default anchor action
        var id = $(this).data('id');

        $.ajax({
            url: "ajex/deletsiginup.php",
            type: "POST",
            data: { Id: id },
            dataType: 'json',
            success: function(response) {
                alert(response.message);
                if (response.success) {
                    loadTableData(); // Reload table data after deletion
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("AJAX error:", errorThrown);
            }
        });
    });
// Handle edit button click via AJAX
$(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');

    $.ajax({
        url: "ajex/get_employee_details.php",
        type: "POST",
        data: { Id: id },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log("Edit Response Data:", response.data); // Debugging line

                $("#fullName").val(response.data.FullName);
                $("#gender").val(response.data.Gender).trigger('change'); // Trigger change for select2
                $("#emailAddress").val(response.data.Email);
                $("#employee_no").val(response.data.EmployeeNumber).trigger('change');
                $("#designation").val(response.data.Designation).trigger('change'); // Ensure this field is updated
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error("AJAX error:", errorThrown);
        }
    });
});


    // Initialize data loading
    loadEmployeeNumbers(); // Load employee numbers on page load
    loadTableData(); // Load table data on page load
});
 </script>
</body>
</html>

<?php }?>