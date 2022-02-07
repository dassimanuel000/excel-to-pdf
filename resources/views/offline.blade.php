<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Stats and Website Dashboard.</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="https://i.ibb.co/HpJN8FL/EV.png" type="image/png">
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your Stats -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

@php
    use Carbon\Carbon;
    $l = storage_path('../storage/framework/cache/data/json.json');
    $json = json_decode(file_get_contents($l), true);


@endphp
<body style="font-family: Times !important;">
	<div class="wrapper">

        @include('dashboard.topbar')
<!-- Sidebar -->
        @include('dashboard.navbar')
<!-- End Sidebar -->
		<div class="main-panel">
            <div class="content">
				<div class="panel-header">
					<div class="page-inner py-5">
					</div>
				</div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">

							<div class="card full-height shadow">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Last Updated: {{ count($json)}} auto<br>Du {{ date('l jS \of F Y h:i:s A') }}</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0"> Requêtes en Cours</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Véhicules </h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Utilisateurs</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height shadow">
								<div class="card-body">
									<div class="card-title">Total Véhicules & Les statistics</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Véhicules</h6>
												<h3 class="fw-bold"> {{ count($json)}} </h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<div class="card p-3">
								<div class="d-flex align-items-center">
									<span class="stamp stamp-md bg-secondary mr-2">
										<i class="fas fa-eye"></i>
									</span>
									<div>
										<h5 class="mb-1"><b><a href="#url">La VITESSE MAX  :<small></small></a></b></h5>
                                        
										<small class="text-muted">                                             
                                            @php
                                             $max = 0;
                                                for ($i =  (count($json)-1); $i < 1; $i--){
                                                   
                                                    if (($json[$i]["Production"]) > $json[$i-1]["Production"]) {
                                                        $max = $i;
                                                    }
                                                    
                                                    echo json_encode($max);
                                                }
                                            @endphp
                                        </small>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			@include('dashboard.footer')
		</div>

        <!-- Custom template | don't include it in your Stats! -->
        @include('dashboard.rightbar')

		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	@include('dashboard.script')

<script>
    Circles.create({
        id:'circles-1',
        radius:45,
        value: 42,
        maxValue:100,
        width:9,
        text: 6,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value: 99,
        maxValue:100,
        width:10,
        text: {{ count($json)}},
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:100,
        maxValue:100,
        width: 10,
        text: "1",
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id: 'task-complete',
        radius: 50,
        value: 879,
        maxValue: 100,
        width: 5,
        text: function(value) { return value + '%'; },
        colors: ['#36a3f7', '#fff'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: [
                    @php
                        for ($i = 0; $i < count($json); $i++){
                            echo "'".$json[$i]["Nom"]."',";
                        }
                    @endphp
                ],
				datasets : [{
					label: "Numéro Véhicules",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [
                        @php
                            for ($i = 0; $i < count($json); $i++){
                                echo $i.",";
                            }
                        @endphp
                    ],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});



    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>

<script>
    multipleBarChart_most = document.getElementById('multipleBarChart_most').getContext('2d');
    var myMultipleBarChart_most = new Chart(multipleBarChart_most, {
        type: 'bar',
        data: {
            labels: ["edz", "ze", "poc"],
            datasets : [{
                label: "Les Pages les plus consultées",
                backgroundColor: '#59d05d',
                borderColor: '#59d05d',
                data: [
                    @php
                        for ($i = 0; $i < 15; $i++){
                            echo "7,";
                        }
                    @endphp
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position : 'bottom'
            },
            title: {
                display: true,
                text: 'Nos liens Stats'
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>

</body>
</html>