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
						<div class="col-md-6">
                            @if (session('status_err'))
                                <div class="col-md-12">
                                    ERROr
                                </div>
                            @endif
							<div class="card full-height shadow">
								<div class="card-body">
									<h3>Ajouter Le nouveau fichier</h3>
                                    <form action="{{ route('form_add_sci') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Choississez le fichier</label>
                                            <div class="col-md-9">
                                                <input id="image" type="file" class="form-control" name="image" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">AJOUTER UNE NOUVELLE FACTURE</button>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">TEMPLATE 1 SCI VERS PM GROUPE F</div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table" style="" class="table table-responsive responsive">
                                            <tr class="">
                                                <th>
                                                    N
                                                </th>
                                                <th>
                                                    NUMERO FACTURE
                                                </th>
                                                <th>
                                                    DATE BILAN 
                                                </th>
                                                <th>
                                                    NOM
                                                </th>
                                                <th>
                                                    Facture
                                                </th>
                                            </tr>
                                                @for ($i = 0; $i < count($json["SCI VERS PM GROUPE"]); $i++)       
                                                <tr class="">
                                                    <td> {{ $i }} </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS PM GROUPE"][$i]['NUMERO FACTURE'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS PM GROUPE"][$i]['DATE BILAN'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS PM GROUPE"][$i]['NOM'];
                                                        @endphp
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="/sci_pm/{{$i}}" class="btn btn-small btn-primary"> Génerer {{ $json["SCI VERS PM GROUPE"][$i]['NOM']}}</a>
                                                    </td>
                                                </tr>
                                                @endfor
                                               
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title" style="position: sticky; top: 0;">SCI VERS AGENCE RECRUTEMENT</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table" style="" class="table table-striped table-responsive responsive">
                                            <tr class="">
                                                <th>
                                                    N
                                                </th>
                                                <th>
                                                    NUMERO FACTURE
                                                </th>
                                                <th>
                                                    DATE BILAN 
                                                </th>
                                                <th>
                                                    NOM
                                                </th>
                                                <th>
                                                    Facture
                                                </th>
                                            </tr>
                                                @for ($i = 0; $i < count($json["SCI VERS AGENCE RECRUTEMENT"]); $i++)       
                                                <tr class="">
                                                    <td> {{ $i }} </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS AGENCE RECRUTEMENT"][$i]['NUMERO FACTURE'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS AGENCE RECRUTEMENT"][$i]['DATE BILAN'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            echo $json["SCI VERS AGENCE RECRUTEMENT"][$i]['NOM'];
                                                        @endphp
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="/sci_ar/{{$i}}" class="btn btn-small btn-default"> Génerer {{ $json["SCI VERS PM GROUPE"][$i]['NOM']}}</a>
                                                    </td>
                                                </tr>
                                                @endfor
                                               
                                        </table>
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

</body>
</html>