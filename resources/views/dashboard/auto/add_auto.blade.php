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

    <link rel="stylesheet" href="../custom.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body onload="name()">
	<div class="wrapper">

        @include('topbar')
<!-- Sidebar -->
        @include('navbar')
<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-5">
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
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
                        <div class="col-md-12">
							<div class="card full-height shadow">
								<div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                        <b>project Bien Ajouter</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (session('error'))
                        <script>
                            function name() {
                                swal("{{ session('error') }}!", "You clicked the button!", {
                                    icon : "error",
                                    buttons: {
                                        confirm: {
                                            className : 'btn btn-danger'
                                        }
                                    },
                                });
                            }
                        </script>
                        <div class="col-md-12">
							<div class="card full-height shadow">
								<div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('error') }}
                                        <b>project ete mal ou pas Ajouter</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
							<div class="card full-height shadow">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12">
                                            <h2>Ajouter Un Projet</h2>
                                            <h3>Ajouter les identifiants d'un Projet</h3>
                                            <div class="card-body">
                                                <form action="{{ route('form_add_project') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Client du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="referent" type="text" class="form-control" name="referent" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nom du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="title" type="text" class="form-control" name="title" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Description du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="description" type="text" class="form-control" name="description" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"> Famille du Projet</label>
                                                        <div class="col-md-9">
                                                            <select name="project_family" required class="form-control select2-choice" required>
                                                                @php
                                                                    $famille = DB::select('select all_familly from list_product ');
                                                                @endphp
                                                                @foreach ($famille as $item)
                                                                    @php
                                                                        $question = json_decode(($item->all_familly), true);
                                                                        $count = count($question);
                                                                    @endphp
                                                                    @for ($i = 0; $i < $count; $i++)
                                                                        <option value="{{ $question[$i]}}">{{ $question[$i]}}</option>
                                                                    @endfor
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Type  du Projet</label>
                                                        <div class="col-md-9">
                                                            <select name="project_type" required class="form-control select2-choice" required>
                                                                @php
                                                                    $all_type = DB::select('select all_type from list_product ');
                                                                @endphp
                                                                @foreach ($all_type as $item)
                                                                    @php
                                                                        $_all_type = json_decode(($item->all_type), true);
                                                                        $_count = count($_all_type);
                                                                    @endphp
                                                                    @for ($i = 0; $i < $_count; $i++)
                                                                        <option value="{{ $_all_type[$i]}}">{{ $_all_type[$i]}}</option>
                                                                    @endfor
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Categorie du Projet</label>
                                                        <div class="col-md-9">
                                                            <select name="category" class="form-control select2-choice" required>
                                                                @php
                                                                    $all_categorie = DB::select('select all_categorie from list_product ');
                                                                @endphp
                                                                @foreach ($all_categorie as $item)
                                                                    @php
                                                                        $_all_categorie = json_decode(($item->all_categorie), true);
                                                                        $__count = count($_all_categorie);
                                                                    @endphp
                                                                    @for ($i = 0; $i < $__count; $i++)
                                                                        <option value="{{ $_all_categorie[$i]}}">{{ $_all_categorie[$i]}}</option>
                                                                    @endfor
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nombres de ressources du Projet </label>
                                                        <div class="col-md-9">
                                                            <input id="number_of_resource" type="number" class="form-control" name="number_of_resource" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Montant previsionnel du Projet </label>
                                                        <div class="col-md-9">
                                                            <input id="price_min" type="number" class="form-control" name="price_min" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Montant reel du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="price_max" type="number" class="form-control" name="price_max" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Investissement requis du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="price_achat" type="number" class="form-control" name="price_achat" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-9">
                                                            <label class="col-md-4 control-label">Ajouter Une Image</label>
                                                            <input id="image" type="file" class="form-control" name="image" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Fournisseur du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="provider" type="text" class="form-control" name="provider" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Date de debut du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="date_start" type="date" class="form-control" name="date_start" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Date de fin du Projet</label>
                                                        <div class="col-md-9">
                                                            <input id="date_stop" type="date" class="form-control" name="date_stop" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                                        </button>
                                                        <a href="/add_project">
                                                            <button class="btn btn-danger">
                                                                <i class="fa fa-btn fa-sign-in"></i>Cancel
                                                            </button>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('footer')
		</div>
        @include('rightbar')

	</div>
    @include('script')
</body>
