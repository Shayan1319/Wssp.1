<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('link/links.php')?>
</head>
<style>
    #fullDiv ul {
        margin: 0;
        padding: 0;
    }
    
    #fullDiv li {
        float: left;
        display: block;
        width: 14.2857%;
        text-align: center;
        list-style-type: none;
    }
    
    #fullDiv li:nth-child(n+1):nth-child(-n+7) {
        font-weight: 900;
        color: #e67e22;
    }
    
    #fullDiv li:nth-child(n+39),
    #fullDiv li:nth-child(n+8):nth-child(-n+16) {
        font-weight: 900;
        color: rgba(0, 0, 0, .3);
    }
    
    #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
    #fullDiv li:nth-child(17) {
        border-radius: 5px;
        background-color: #1abc9c;
        color: #ecf0f1;
    }
    
    .form-group label {
        font-weight: bold;
    }
    /* width */
    
     ::-webkit-scrollbar {
        width: 20px;
    }
    /* Track */
    
     ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }
    /* Handle */
    
     ::-webkit-scrollbar-thumb {
        background: red;
        border-radius: 10px;
    }
    /* Handle on hover */
    
     ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }
</style>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <a href="exit-clear.php">
                        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Employee Clearance</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Approval</h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text float-end">#</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Employee Appraisal</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Employee Leave Request</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">mployee Travel Request</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Employee PayRoll</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Employee Count</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Employee Contact Expiry</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3">
                    <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">All Employee Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Approval</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text float-end">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-light border border-dark rounded p-5 border-3">
                        <label for="">Message to all WSSC employee</label>
                        <input type="text" class="form-control w-50 my-2" name="subject" placeholder="Subjext" id="">
                        <textarea name="message" class="my-2" placeholder="Message" id="message"></textarea>
                        <script>
                            CKEDITOR.replace('message');
                        </script>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                        <canvas id="myChart" style="width: 520px; max-width: 600px; display: block; height: 259px;" width="780" height="388"></canvas>
                        <script>
                            var xValues = ["Item1", "Item2", "Item3", "Item4", "Item5"];
                            var yValues = [55, 49, 44, 24, 20];
                            var barColors = ["red", "green", "blue", "orange", "brown"];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>

                        <canvas id="myChart1" style="width: 400px; max-width: 400px; display: block; height: 400px;" width="600" height="600"></canvas>

                        <script>
                            var xValues = ["type1", "type2", "type3", "type4", "type5"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = [
                                "#b91d47",
                                "#00aba9",
                                "#2b5797",
                                "#e8c3b9",
                                "#1e7145"
                            ];

                            new Chart("myChart1", {
                                type: "pie",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('link/desigene/script.php')?>
</body>

</html>