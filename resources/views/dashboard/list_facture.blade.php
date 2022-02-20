<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Stats and Website Dashboard.</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewporT ' />
    <link rel="icon" href="https://i.ibb.co/HpJN8FL/EV.png" type="image/png">
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your Stats -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

@php
    use Carbon\Carbon;
    $l = './data/data_sci.json';
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
                        <div class="col-md-12">

                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }} 
                            </div>
                            @endif
                        </div>
						<div class="col-md-6">
                            @if (session('status_err'))
                                <div class="col-md-12">
                                    ERROr
                                </div>
                            @endif
							<div class="card full-height shadow">
								<div class="card-body">
									<h3>Ajoutez les infos</h3>

                                    <form action="{{ route('form_add_uniq') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nom du client</label>
                                            <div class="col-md-9">
                                                <input id="nom" type="text" class="form-control" name="nom" required>
                                            </div>
                                            <label class="col-md-4 control-label">Prénom du client</label>
                                            <div class="col-md-9">
                                                <input id="nom" type="text" class="form-control" name="nom" required>
                                            </div>
                                            <label class="col-md-4 control-label">NUMERO Facture</label>
                                            <div class="col-md-9">
                                                <input id="nom" type="text" class="form-control" name="nom" required>
                                            </div>
                                            <label class="col-md-4 control-label">Date Facture</label>
                                            <div class="col-md-9">
                                                <input id="nom" type="date" class="form-control" name="nom" required>
                                            </div>
                                            <label class="col-md-4 control-label">Montant ( Facultatif )</label>
                                            <div class="col-md-9">
                                                <input id="nom" type="text" placeholder="Mettre les centimes au besoin" class="form-control" name="nom">
                                            </div>
                                            
                                            <label class="col-md-4 control-label">Société qui facture</label>
                                            <div class="col-md-9">
                                                <select name="compagnie" class="form-control select form" id="" required>
                                                    <option value="AC">AC CONSEILS</option>
                                                    <option value="EV">EVOLUTION PROFESSIONNELLE</option>
                                                    <option value="PM">PM GROUPE FRANCE</option>
                                                    <option value="SCIPM">SCI VERS PM GROUPE</option>
                                                    <option value="SCIAR">SCI VERS AGENCE RECRUTEMENT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">AJOUTER UNE NOUVELLE FACTURE</button>
                                        </div>
                                    </form>
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

</body>
</html>