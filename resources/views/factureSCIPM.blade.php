@php
$l = ('./data/data_sci.json');
$json = json_decode(file_get_contents($l), true);
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>{{ $json["SCI VERS PM GROUPE"][$i]["NOM"]}}</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="/"
        crossorigin="anonymous">
</head>

<style>
    .b {
        font-family: 'Courier New', Courier, monospace, serif;
        font-weight: bolder;
    }
</style>

<body style="width: 92%;margin-left:3%;">
    <div class="row">
        <div class="col-sm" style="max-width: 70% !important;float: left;">
            <p>
            <h5  style="max-width: 70% !important;color: #0099ff; border: 2px solid black; padding: 3%;font-family: 'Courier New', Courier, monospace, serif; font-weight: bolder;">SCI 128 RUE LA BOETIE</h5>
            </p>
        </div>
        <div class="col-sm">
            <p>
                <span style="font-weight: bold;">FACTURE</span><br>
                N° {{ $json["SCI VERS PM GROUPE"][$i]["NUMERO FACTURE"]}} <br>
                Dale: le {{ $json["SCI VERS PM GROUPE"][$i]["DATE BILAN"]}}
            </p>
        </div>
    </div>
    <div class="row">
        <table>
            <tbody>
                <tr>
                    <td colspan="2">
                        128 rue de la Boétie <br />
                        75008 PARIS <br />
                        Siret : 84471932800016<br /><br />
                        <div class="row">
                            <div class="col-md-1"><b>Objet  </b>
                            </div>
                            <div class="col-md-11">
                                 : FOURNITURE DE SUPPORT PEDAGOGIQUE <br>
                                <small> Concepton & délivrance de support pédagogique</small>
                            </div>
                        </div>
                    </td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td style="margin-left:-300px;">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel panel-default invoice" id="invoice">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 top-left">
                    <br><br>
                    <h3 class="marginright"><b> </b>
                    </h3>
                </div>

                <div class="col-sm-6 top-right" style="position: relative;left:70%;top:-100px;">
                    <b> FACTURER À :</b><br />
                    PM GROUPE FRANCE<br />
                    128 RUE DE LA BOETIE<br />
                    75008 PARIS<br />
                    SIRET: 791 275 357 000 30<br />
                </div>

            </div>
            <div class="row table-row" style="margin-top: -12%;">
                <table class="table" border="1">
                    <tr class=" table-striped" style="background-color: lightgray;font-weight:bolder;font-size:12px;">
                        <td class="text-center" style="">DESCRIPTION</td>
                        <td class="text-center" style="">Quantité</td>
                        <td class="text-center" style="">Prix Unitaire</td>
                        <td class="text-center" style="">MONTANT HT</td>
                    </tr>
                    <tr>
                        <td class="text-left">Fourniture bilan pédagogique</td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                        <td class="text-center"><b> 350 €</b></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ $json["SCI VERS PM GROUPE"][$i]["NOM"]}}</td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                    </tr>
                    <tr>
                        <td class="text-left">Prise en compte des spécificités du stagiaire</td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                    </tr>
                    <tr>
                        <td class="text-left">Co-construction du programme détaillé</td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                        <td class="text-left"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="" style="margin-top: -2%;width:105%;">
        <img src="https://i.ibb.co/84HyFPN/rib-true.png" style="height: 50%;width:50%;" alt="" srcset="">
    </div>
    <div class="container" style="margin-top: 2%;">
        <div class="row" style="">
            <center><small class="font-weight-bold"><b> SCI 128 RUE LA BOETIE</b> <br>
                    <b>128 rue dela boetie - Siret 79127535700030</b>
                </small>
            </center>
        </div>
    </div>
</body>