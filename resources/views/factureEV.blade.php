@php
    $l = ('./data/data.json');
    $json = json_decode(file_get_contents($l), true);
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>{{ $json['EVOUTION PROFESSIONNELLE'][$i]["NOM "]}}</title>
    <link rel="stylesheet"  type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="/" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-sm">
            <p>
                <img src="https://i.ibb.co/H7Ddxfx/Image1.png" alt="" style="height:50px;">
            </p>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <h5 style="font-weight: bold;">EVOUTION PROFESSIONNELLE</h5>
                                128 rue de la Boétie <br/>
                                75008 PARIS <br/>
                                France <br/>
                                N° SIRET : 87789243000019 <br/>
                            </td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td style="margin-left:-300px;">
                                <h5 style="font-weight: bold;">{{ $json['EVOUTION PROFESSIONNELLE'][$i]["NOM "]}}</h5>
                                Mr/Mme : {{ $json['EVOUTION PROFESSIONNELLE'][$i]["NOM "]}}, {{ $json['EVOUTION PROFESSIONNELLE'][$i]["PRENOM "]}} <br/>
                                Adresse : {{ $json['EVOUTION PROFESSIONNELLE'][$i]["ADRESSE "]}} <br/>
                            </td>
                        </tr>
                    </tbody>
                </table>

        </div>
    </div>
    <div class="panel panel-default invoice" id="invoice">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 top-left">
                    <br><br>
                    <h3 class="marginright"><b>FACTURE N° {{ $json['EVOUTION PROFESSIONNELLE'][$i]["NUMERO FACTURE "]}}</b></h3>
                    <span class="marginright"> Fait le :{{ $json['EVOUTION PROFESSIONNELLE'][$i]["DATE ENCAISSEMENT "]}}</span>
                </div>

                <div class="col-sm-6 top-right">
                </div>

            </div>

            <br><br>
            <div class="row table-row">
                <table class="table table-striped">
                    <tr>
                        <td class="text-center" style="">Désignation</td>
                        <td style="">Quantité</td>
                        <td class="text-right" style="">PU Vente</td>
                        <td class="text-right" style="">TVA</td>
                        <td class="text-right" style="">Montant HT</td>
                    </tr>
                    <tr>
                        <td class="text-center">Bilan de Compétences</td>
                        <td>1,00</td>
                        <td class="text-right">{{ number_format($json['EVOUTION PROFESSIONNELLE'][$i]["MONTANT "]) }} € </td>
                        <td class="text-right">0.00</td>
                        <td class="text-right">{{ number_format($json['EVOUTION PROFESSIONNELLE'][$i]["MONTANT "]) }} € </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="" style="margin-top: 25%;">
        <table>
            <tbody>
                <tr> <b>Bon pour Accord </b></tr>
                <tr>
                    <td><b>Condition de paiement : </b></td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td>Total HT :</td>
                    <td>{{ number_format($json['EVOUTION PROFESSIONNELLE'][$i]["MONTANT "]) }} €</td>
                </tr>
                <tr>
                    <td>
                        <li class="mb-0 px-2" style="margin-left: 10%;">Payé 100% par virement bancaire
                        le {{ $json['EVOUTION PROFESSIONNELLE'][$i]["DATE ENCAISSEMENT "]}}</li>
                    </td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td>TVA (0%) :</td>
                    <td>0,00 €</td>
                </tr>
                <tr>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td><b style="color: #fff;">INVISIBLE</b></td>
                    <td><b>Total TTC : {{ number_format($json['EVOUTION PROFESSIONNELLE'][$i]["MONTANT "]) }} €</b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <center><small> N° de SIRET 87789243000019 <br>
                N° Déclaration d'activité : 11756182775 <br>
                Organisme de Formation non assujetti à la TVA - exonérée de TVA — Art. 261.4.4 a du CGI
            </small>
            </center>
        </div>
    </div>
</body>
