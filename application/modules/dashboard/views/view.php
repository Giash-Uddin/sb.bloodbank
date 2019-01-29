<?php
//$this->load->view('head');
$user_type = $this->session->userdata('user_type');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Sonali Bank Blood Bank</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>acss/bootstrap.4.2.1.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>acss/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/font-awesome.min.css" rel="stylesheet" >    
        <link href="<?php echo base_url() ?>acss/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>acss/style.css" rel="stylesheet">

    </head>

    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="menu_change('/admin');">
                                    <span data-feather="users"></span>
                                    admin
                                </a>
                                <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('donor');">
                                                <span data-feather="user"></span>
                                                Donor
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('branch');">
                                                <span data-feather="user"></span>
                                                Branches
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('designation');">
                                                <span data-feather="user"></span>
                                                Designation
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="menu_change('upozila');">
                                                <span data-feather="user"></span>
                                                Upozila
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <span data-feather="user"></span>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file"></span>
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="users"></span>
                                    Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="bar-chart-2"></span>
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="layers"></span>
                                    Integrations
                                </a>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Year-end sale
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button class="btn btn-sm btn-outline-secondary">Share</button>
                                <button class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar"></span>
                                This week
                            </button>
                        </div>
                    </div>
                    <div id="container" style="margin: 0 auto"></div>
                </main>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url() ?>ajs/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>ajs/jquery-slim.min.js"><\/script>')</script>
        <script src="<?php echo base_url() ?>ajs/popper.js"></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="<?php echo base_url() ?>ajs/feather.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.3.3.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>ajs/jquery.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/toastr.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/popper.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/bootstrap.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/jquery-1.12.4.js" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>ajs/jquery-ui.js" type="text/javascript" ></script>
        <script type="text/javascript" >
                feather.replace()
        </script>

        <!-- Graphs -->
        <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script>
          var ctx = document.getElementById("myChart");
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
              datasets: [{
                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: false
                  }
                }]
              },
              legend: {
                display: false,
              }
            }
          });
        </script> -->
<!--        <script src="https://code.highcharts.com/highcharts.js"></script>
       <script src="https://code.highcharts.com/highcharts-more.js"></script>
       <script src="https://code.highcharts.com/modules/exporting.js"></script>
       <script src="https://code.highcharts.com/modules/export-data.js"></script>-->
        <script>


                function menu_change(_url) {
                    $.ajax({
                        url: '<?php echo base_url() ?>' + _url,
                        type: 'get',
                        success: function(data) {
                            $('#container').html(data);
                        },
                        error: function() {
                            $('#container').text('An error occurred');
                        }
                    });
                }

                function update_form_set(_url, id) {
                    $.ajax({
                        url: '<?php echo base_url() ?>' + _url,
                        type: 'post',
                        data: {id: id},
                        success: function(data) {
                            $('#container').html(data);
                        },
                        error: function() {
                            $('#container').text('An error occurred');
                        }
                    });
                }

                $(document).ready(function() {
                    $('.datepick').datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "yy-mm-dd"
                    });
//                $('#admin').click(function() {
//                    var url = base_url + "admin";
////                    $.post(url).done(function(data) {
////                                alert(url);
////                                $('#myContainer').html(data);
////                            });
//                    $.ajax({
//                        url: base_url + 'admin',
//                        method: 'post',
//                        data : {},
//                        success: function(data) {
//                            alert("Saved successfully");
//                        },
//                        error: function() {
//                            alert("Data not Saved");
//                        }
//                    })
//                });
                                                    //        sendRequest();
                                                    //        function sendRequest() {
                                                    ////$('#test').val("123");
                                                    //            $.ajax({
                                                    //                url: "http://localhost:8081/skeleton/admin/activeSession",
                                                    //                success: function (result) {
                                                    //                    console.log(result);
                                                    //                    $('#test').val(result); //insert text of test.php into your div
                                                    //                    Highcharts.chart('container', {
                                                    //
                                                    //                        chart: {
                                                    //                            type: 'gauge',
                                                    //                            plotBackgroundColor: null,
                                                    //                            plotBackgroundImage: null,
                                                    //                            plotBorderWidth: 0,
                                                    //                            plotShadow: false
                                                    //                        },
                                                    //
                                                    //                        title: {
                                                    //                            text: 'Active Visitor'
                                                    //                        },
                                                    //
                                                    //                        pane: {
                                                    //                            startAngle: -150,
                                                    //                            endAngle: 150,
                                                    //                            background: [{
                                                    //                                backgroundColor: {
                                                    //                                    linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                                    //                                    stops: [
                                                    //                                        [0, '#FFF'],
                                                    //                                        [1, '#333']
                                                    //                                    ]
                                                    //                                },
                                                    //                                borderWidth: 0,
                                                    //                                outerRadius: '109%'
                                                    //                            }, {
                                                    //                                backgroundColor: {
                                                    //                                    linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                                    //                                    stops: [
                                                    //                                        [0, '#333'],
                                                    //                                        [1, '#FFF']
                                                    //                                    ]
                                                    //                                },
                                                    //                                borderWidth: 1,
                                                    //                                outerRadius: '107%'
                                                    //                            }, {
                                                    //                                // default background
                                                    //                            }, {
                                                    //                                backgroundColor: '#DDD',
                                                    //                                borderWidth: 0,
                                                    //                                outerRadius: '105%',
                                                    //                                innerRadius: '103%'
                                                    //                            }]
                                                    //                        },
                                                    //
                                                    //                        // the value axis
                                                    //                        yAxis: {
                                                    //                            min: 0,
                                                    //                            max: 10,
                                                    //
                                                    //                            minorTickInterval: 'auto',
                                                    //                            minorTickWidth: 1,
                                                    //                            minorTickLength: 10,
                                                    //                            minorTickPosition: 'inside',
                                                    //                            minorTickColor: '#666',
                                                    //
                                                    //                            tickPixelInterval: 30,
                                                    //                            tickWidth: 2,
                                                    //                            tickPosition: 'inside',
                                                    //                            tickLength: 10,
                                                    //                            tickColor: '#666',
                                                    //                            labels: {
                                                    //                                step: 2,
                                                    //                                rotation: 'auto'
                                                    //                            },
                                                    //                            title: {
                                                    //                                text: 'Visitor'
                                                    //                            },
                                                    //                            plotBands: [{
                                                    //                                from: 0,
                                                    //                                to: 120,
                                                    //                                color: '#55BF3B' // green
                                                    //                            }, {
                                                    //                                from: 120,
                                                    //                                to: 160,
                                                    //                                color: '#DDDF0D' // yellow
                                                    //                            }, {
                                                    //                                from: 160,
                                                    //                                to: 200,
                                                    //                                color: '#DF5353' // red
                                                    //                            }]
                                                    //                        },
                                                    //
                                                    //                        series: [{
                                                    //                            name: 'Active Visitor',
                                                    //                            data: [result],
                                                    //                            tooltip: {
                                                    //                                valueSuffix: ''
                                                    //                            }
                                                    //                        }]
                                                    //
                                                    //                    });
                                                    //                    setTimeout(function () {
                                                    //                        sendRequest(); //this will send request again and again;
                                                    //                    }, 5000);
                                                    //                }
                                                    //            });
                                                    //        }
                                                    //-------------------------------------------------------
                                                    //        Highcharts.chart('container', {
                                                    //
                                                    //                    chart: {
                                                    //                        type: 'gauge',
                                                    //                        plotBackgroundColor: null,
                                                    //                        plotBackgroundImage: null,
                                                    //                        plotBorderWidth: 0,
                                                    //                        plotShadow: false
                                                    //                    },
                                                    //
                                                    //                    title: {
                                                    //                        text: 'Active Visitor'
                                                    //                    },
                                                    //
                                                    //                    pane: {
                                                    //                        startAngle: -150,
                                                    //                        endAngle: 150,
                                                    //                        background: [{
                                                    //                            backgroundColor: {
                                                    //                                linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                                    //                                stops: [
                                                    //                                    [0, '#FFF'],
                                                    //                                    [1, '#333']
                                                    //                                ]
                                                    //                            },
                                                    //                            borderWidth: 0,
                                                    //                            outerRadius: '109%'
                                                    //                        }, {
                                                    //                            backgroundColor: {
                                                    //                                linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                                    //                                stops: [
                                                    //                                    [0, '#333'],
                                                    //                                    [1, '#FFF']
                                                    //                                ]
                                                    //                            },
                                                    //                            borderWidth: 1,
                                                    //                            outerRadius: '107%'
                                                    //                        }, {
                                                    //                            // default background
                                                    //                        }, {
                                                    //                            backgroundColor: '#DDD',
                                                    //                            borderWidth: 0,
                                                    //                            outerRadius: '105%',
                                                    //                            innerRadius: '103%'
                                                    //                        }]
                                                    //                    },
                                                    //
                                                    //                    // the value axis
                                                    //                    yAxis: {
                                                    //                        min: 0,
                                                    //                        max: 100,
                                                    //
                                                    //                        minorTickInterval: 'auto',
                                                    //                        minorTickWidth: 1,
                                                    //                        minorTickLength: 10,
                                                    //                        minorTickPosition: 'inside',
                                                    //                        minorTickColor: '#666',
                                                    //
                                                    //                        tickPixelInterval: 30,
                                                    //                        tickWidth: 2,
                                                    //                        tickPosition: 'inside',
                                                    //                        tickLength: 10,
                                                    //                        tickColor: '#666',
                                                    //                        labels: {
                                                    //                            step: 2,
                                                    //                            rotation: 'auto'
                                                    //                        },
                                                    //                        title: {
                                                    //                            text: ''
                                                    //                        },
                                                    //                        plotBands: [{
                                                    //                            from: 0,
                                                    //                            to: 60,
                                                    //                            color: '#55BF3B' // green
                                                    //                        }, {
                                                    //                            from: 60,
                                                    //                            to: 80,
                                                    //                            color: '#DDDF0D' // yellow
                                                    //                        }, {
                                                    //                            from: 80,
                                                    //                            to: 100,
                                                    //                            color: '#DF5353' // red
                                                    //                        }]
                                                    //                    },
                                                    //
                                                    //                    series: [{
                                                    //                        name: 'Speed',
                                                    //                        data: [0],
                                                    //                        tooltip: {
                                                    //                            valueSuffix: ''
                                                    //                        }
                                                    //                    }]
                                                    //
                                                    //                },
                                                    //// Add some life
                                                    //                function (chart) {
                                                    //                    if (!chart.renderer.forExport) {
                                                    //                        setInterval(function () {
                                                    //                            var point = chart.series[0].points[0],
                                                    //                                    newVal;
                                                    //
                                                    //                            $.getJSON('http://localhost:8081/skeleton/admin/activeSession', function (data) {
                                                    //                                chart.series[0].points[0].update(data);
                                                    ////                                console.log(data);
                                                    ////                                newVal = data;
                                                    //                            });
                                                    ////                            if (newVal < 0 || newVal > 200) {
                                                    ////                                newVal = point.y - inc;
                                                    ////                            }
                                                    //
                                                    ////                            point.update(newVal);
                                                    //
                                                    //                        }, 3000);
                                                    //                    }
                                                    //                });
                                                    //-------------------------------------------------------
                                                });
        </script>
    </body>
</html>

