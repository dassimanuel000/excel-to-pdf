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


@php
    use Carbon\Carbon;
    $l = storage_path('../storage/framework/cache/data/json.json');
    $json = json_decode(file_get_contents($l), true);

@endphp



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
                        <div class="card body">
                            <div class="col-lg-12">
                                <div class="card-body project_item_list">
                                    <div class="body">
                                        <h2>Listes des Véhicules {{ $json[25]["speed"]}}</h2>
                                        <!--------------------------------->
                                            <div class="form-group">
                                                <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                                            </div>
                                        <!---->
                                        <div class="body table-responsive">
                                        @if (session('add_auto'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('add_auto') }}
                                            </div>
                                        @endif
                                            <table id="DataTable" class="table table-hover m-b-0">
                                                <thead>
                                                    <tr>
                                                        <th data-breakpoints="sm xs">ID</th>
                                                        <th>Image</th>
                                                        <th>Referent</th>
                                                        <th data-breakpoints="sm xs">Titre</th>
                                                        <th data-breakpoints="xs">Description</th>
                                                        <th data-breakpoints="sm xs">Categories</th>
                                                        <th data-breakpoints="sm xs md">Quantit&eacute;s</th>
                                                        <th data-breakpoints="sm xs md">Prix Min</th>
                                                        <th data-breakpoints="sm xs md">Prix Max</th>
                                                        <th data-breakpoints="sm xs md">Stock D'alarme</th>
                                                        <th data-breakpoints="sm xs md">Type du Produit</th>
                                                        <th data-breakpoints="sm xs md">Fournisseurs</th>
                                                        <th data-breakpoints="sm xs md">Taxes</th>
                                                        <th data-breakpoints="sm xs md">Editer</th>
                                                        <th data-breakpoints="sm xs md">Modifier</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='tbody'>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                        <script type="text/javascript">
                                            const search = document.getElementById('search');
                                            const tableBody = document.getElementById('tbody');
                                            function getContent(){

                                            const searchValue = search.value;

                                                const xhr = new XMLHttpRequest();
                                                xhr.open('GET','{{route('search_auto')}}/?search=' + searchValue ,true);
                                                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                                xhr.onreadystatechange = function() {

                                                    if(xhr.readyState == 4 && xhr.status == 200)
                                                    {
                                                        tableBody.innerHTML = xhr.responseText;
                                                    }
                                                }
                                                xhr.send()
                                            }
                                            search.addEventListener('input',getContent);
                                        </script>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			@include('dashboard.footer')
		</div>
        @include('dashboard.rightbar')

	</div>
    @include('dashboard.script')
</body>
</html>
