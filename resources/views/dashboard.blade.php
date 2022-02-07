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
    $l = './data/data.json';
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
                            @if (session('status_err'))
                                <div class="col-md-12">
                                    ERROr
                                </div>
                            @endif
							<div class="card full-height shadow">
								<div class="card-body">
									<h3>Ajouter Le nouveau fichier</h3>
                                    <form action="{{ route('form_add_facture') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Choississez le fichier</label>
                                            <div class="col-md-9">
                                                <input id="image" type="file" class="form-control" name="image" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Add new factures</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
                        <div class="col-md-12">

                                

                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }} 
                                </div>
                                @endif
                            
                                <table id="table" style="" class="table responsive-table responsive">
                                    <tr>
                                        <th>
                                            COMPAGNIES
                                        </th>
                                        <th>
                                            NUMERO FACTURE 
                                        </th>
                                        <th>
                                            DATE ENCAISSEMENT
                                        </th>
                                        <th>
                                            NOM
                                        </th>
                                        <th>
                                            PRENOM
                                        </th>
                                        <th>
                                            ADRESSE
                                        </th>
                                        <th>
                                            MONTANT
                                        </th>
                                    </tr>
                                    <tbody>
                                        @for ($i = 0; $i < count($json["AC CONSEILS"]); $i++)
                                        <tr>
                                            <td>
                                                AC CONSEILS
                                            </td>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['NUMERO FACTURE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['DATE ENCAISSEMENT '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['NOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['PRENOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['ADRESSE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["AC CONSEILS"][$i]['MONTANT '];
                                                @endphp
                                            </th>
                                            <th>
                                                <a href="/ac/{{$i}}" class="btn btn-small btn-primary"> Génerer {{$json["AC CONSEILS"][$i]['NOM ']}}</a>
                                            </th>
                                        </tr>
                                        @endfor
                                        @for ($i = 0; $i < count($json["PM GROUPE FRANCE"]); $i++)
                                        <tr>
                                            <td>
                                                PM GROUPE FRANCE
                                            </td>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['NUMERO FACTURE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['DATE ENCAISSEMENT '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['NOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['PRENOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['ADRESSE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["PM GROUPE FRANCE"][$i]['MONTANT '];
                                                @endphp
                                            </th>
                                            <th>
                                                <a href="/pm/{{$i}}" class="btn btn-small btn-primary"> Génerer {{$json["PM GROUPE FRANCE"][$i]['NOM ']}}</a>
                                            </th>
                                        </tr>
                                        @endfor
                                        @for ($i = 0; $i < count($json["EVOUTION PROFESSIONNELLE"]); $i++)
                                        <tr>
                                            <td>
                                                EVOUTION PROFESSIONNELLE
                                            </td>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['NUMERO FACTURE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['DATE ENCAISSEMENT '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['NOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['PRENOM '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['ADRESSE '];
                                                @endphp
                                            </th>
                                            <th>
                                                @php
                                                    echo $json["EVOUTION PROFESSIONNELLE"][$i]['MONTANT '];
                                                @endphp
                                            </th>
                                            <th>
                                                <a href="/ev/{{$i}}" class="btn btn-small btn-primary"> Génerer {{$json["EVOUTION PROFESSIONNELLE"][$i]['NOM ']}}</a>
                                            </th>
                                        </tr>
                                        @endfor
                                       
                                    </tbody>
                                </table>
                                <a href="/facture" class="btn btn-primary btn-block">Génerer les factures en PDF</a>
                            
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