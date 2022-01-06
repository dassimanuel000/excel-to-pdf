<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Project and Website Dashboard.</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
    
@php
use Carbon\Carbon;
$l = storage_path('../storage/framework/cache/data/json.json');
$json = json_decode(file_get_contents($l), true);


@endphp

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body onload="name()">
	<div class="wrapper">

        @include('dashboard.topbar')
<!-- Sidebar -->
        @include('dashboard.navbar')
<!-- End Sidebar -->

        @if (session('success'))
        <script>
            function name() {
                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Confirm Me",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            }
        </script>
        @endif

		<div class="main-panel">
			<div class="content">
				<div class="panel-header ">
					<div class="page-inner py-5">
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
                        <div class="col-md-12">
                            <div class="body">
                                <div class="card full-height shadow">
                                    <div class="card-body">
                                        <h2>Listes des Projects</h2>
                                        <!--------------------------------->

                                        <!---->
                                        <h3>Trier par Categorie Produit</h3>
                                        <div class="body table-responsive">
                                        @if (session('add_project'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('add_project') }}
                                            </div>
                                        @endif
                                            <table id="DataTable" class="table table-hover m-b-0">
                                                <thead>
                                                <tr>
                                                    <th data-breakpoints="sm xs">ID</th>
                                                    <th>Image</th>
                                                    <th>NOM</th>
                                                    <th data-breakpoints="sm xs">Marque</th>
                                                    <th data-breakpoints="xs">Description</th>
                                                    <th data-breakpoints="sm xs">Accélération</th>
                                                    <th data-breakpoints="sm xs md">Vitesse maximale</th>
                                                    <th data-breakpoints="sm xs md">Puissance maximale</th>
                                                    <th data-breakpoints="sm xs md">Usine d'assemblage</th>
                                                    <th data-breakpoints="sm xs md">Energie</th>
                                                    <th data-breakpoints="sm xs md">Moteur</th>
                                                    <th data-breakpoints="sm xs md">Années de production</th>
                                                    <th data-breakpoints="sm xs md">Editer</th>
                                                    <th data-breakpoints="sm xs md">Modifier</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                     for ($i = 0; $i < count($json); $i++){
                                                    @endphp
                                                <tr>
                                                    <td><span class="col-green">{{ $json[$i]["Nom"] }}</span></td>
                                                    <td>
                                                        <a href="/show_project/{{$i }}">
                                                            <img src="{{$json[$i]["img"] }}" width="48" alt="Produit">
                                                        </a>
                                                    </td>
                                                    <td><h5>{{ $json[$i]["img"] }}</h5></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Nom"] }}</span></td>
                                                    <td>{{ $json[$i]["Marque"] }}</td>
                                                    <td><span class="text-muted">{{ $json[$i]["Description"] }}</span></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Poids"] }}</span></td>
                                                    <td class=""><span class="col-green">{{ $json[$i]["Vitesse maximale"] }}M <small> ( XAF )</small></span></td>
                                                    <td class=""><span class="col-red">{{ $json[$i]["Puissance maximale"] }}M <small> ( XAF )</small></span></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Usine d'assemblage"] }}</span></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Energie"] }}</span></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Moteur"] }}</span></td>
                                                    <td><span class="text-muted">{{ $json[$i]["Années de production"] }}</span></td>
                                                    <td>
                                                        <a href="/show_project/{{ $i }}" class="btn btn-primary waves-effect waves-float waves-green"><i class="fa fa-camera"></i></a>
                                                        </td>
                                                    <td>
                                                    <a href="/edit_project/{{ $i }}" class="btn btn-primary waves-effect waves-float waves-green"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                    <form action="/delete_project/{{ $i }}" method="GET">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" onclick="if(confirm('Are you sure ? Vous ne pourez rien modifier') == true){ return true; } else {return false}" class="btn btn-danger waves-effect waves-float waves-red">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    </td>
                                                </tr>

                                                @php
                                                    }
                                                @endphp

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="row">

                    </div>
                    <br>
					<div class="row row-card-no-pd">

					</div>
					<div class="row">

					</div>
					<div class="row">
                    </div>
				</div>
			</div>
			@include('dashboard.footer')
		</div>
        @include('dashboard.rightbar')

    </div>
    @include('dashboard.script')
</body>
