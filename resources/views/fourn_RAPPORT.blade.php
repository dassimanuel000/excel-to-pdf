@php
    $l = ('./data/LISTECLIENTS.json');
    $json = json_decode(file_get_contents($l), true);
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>{{ $json[$i]["NOM"]}}</title>
    <link rel="stylesheet"  type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="/" crossorigin="anonymous">
</head>

<body style="margin-left: 40px;">
    <div class="row">
        <div class="col-sm">
            <p><h2></h2>
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
                                <h5 style="font-weight: bold;">AGENCE RECRUTEMENT</h5>
                                GERANT Florent Covilette <br/>
                                N°SIRET : 877 892 430 000 19 <br/>
                                128 RUE DE LA BOETIE <br/>
                                75008 Paris <br/>
                            </td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                           
                            <td></td>
                        </tr>
                        <tr>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>

                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td>AC CONSEILS <br>
                                6 RUE MUSSET <br>
                                75016 PARIS</b></h3>
                                <br></b></td>
                        </tr>
                        <tr>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                            <td><b style="color: #fff;">INVISIBLE</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2" style="width:300px !important;">
                                <span class="marginright" style="width:100% !important;border: 2px solid black;padding:5%;">DATE : {{ $json[$i]["DATE ENCAISSEMENT"]}}</span>
                                
                                <br>
                                <span class="marginright" style="width:100% !important;border: 2px solid black;padding:5%;">FACTURE N°A{{  (1035 +855 + $i ); }}</span></td>
                        </tr>
                    </tbody>
                </table>

        </div>
    </div>
    <div class="panel panel-default invoice" id="invoice">
        <div class="panel-body">
            <div class="row">
                <br>
                <center style="border: 2px solid black;padding:2%;">


            <span class="marginright" style="padding:1px;">FOURNITURE DE RAPPORT DE BILAN DE COMPETENCE</span><br>
                </center>

            </div>
            <br>
            <div class="row table-row">
                <br>
                <table class="table" border="1" style="font-weight: bolder !important">
                    <tr class=" table-striped" style="background-color: lightgray;font-weight:bolder;font-size:12px;  height: 1px;" >
                        <td class="text-center" style="">DESCRIPTION</td>
                        <td class="text-center" style="">QUANTITE</td>
                        <td class="text-center" style="">PRIX UNITAIRE</td>
                        <td class="text-center" style="">MONTANT HT</td>
                    </tr>
                    <tr>
                        <td class="text-center">Attestation d'assiduité de réalisation des ateliers du BDC</td>
                        <td class="text-center" style="position: relative;top: 25px !important;" rowspan="2">1</td>
                        <td class="text-center" style="position: relative;top: 25px !important;" rowspan="2">75</td>
                        <td class="text-center" style="position: relative;top: 25px !important;" rowspan="2"><b> 75 </b></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $json[$i]["NOM"]}}</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3">SOUS TOTAL H.T</td>
                        <td class="text-center">75 €</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3"> TOTAL H.T</td>
                        <td class="text-center">75 €</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3">TVA non applicable, article 293 B du CGI</td>
                        <td class="text-center">0 €</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3">TOTAL</td>
                        <td class="text-center">75 €</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 19%;">
        <div class="row">
            <center><small>Type de règlement : VIREMENT BANCAIRE OU CHEQUE <br>
                PM GROUPE FRANCE - 128 RUE DE LA BOETIE- 75008 PARIS - TEL 09-70-46-63-83
            </small>
            </center>
        </div>
    </div>
</body>
