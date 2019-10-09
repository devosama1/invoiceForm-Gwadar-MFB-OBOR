<?php
session_start();

if(isset($_POST["signo"])){
    $_SESSION["favcolor"]="wjat";
    session_destroy(); //destroy the session
    echo "<script>window.location = 'index.php';</script>";
    exit;
}

if("green"!=$_SESSION["favcolor"]){
    echo "<script>window.location = 'index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Obortunity Voucher Creator</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:600,700" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#voucher').change(function(){
    if($(this).is(":checked"))
    $('#voucherDiv').fadeIn('slow');
    else
    $('#voucherDiv').fadeOut('slow');

    });
    });

    $(document).ready(function(){
    $('#voucher').change(function(){
    if($(this).is(":checked"))
    $('#voucherDiv1').fadeIn('slow');
    else
    $('#voucherDiv1').fadeOut('slow');

    });
    });

    $(document).ready(function(){
    $('#invoice').change(function(){
    if($(this).is(":checked"))
    $('#invoiceDiv').fadeIn('slow');
    else
    $('#invoiceDiv').fadeOut('slow');

    });
    });
</script>


    <style>
        .tableintable th, td{
            padding:4px;
            font-size: 8pt;
        }
        hr{
            margin: 5px;
        }
    </style>
    <script>



        function printElement() {
            var x = document.forms["myForm"]["id"].value;
            if (x == "") {
                alert("Registration ID must be filled out");
                return false;
            }
            var printHtml = document.getElementById("areaID").outerHTML;
            var currentPage = document.body.outerHTML;
            var elementPage = '<html><head><title></title></head><body style="width: 100%; margin:0px;padding:0px;">' + printHtml + '</body>';
            //change the body
            document.body.innerHTML = elementPage;
            //print
            window.print();
            //go back to the original
            document.body.innerHTML = currentPage;
        }
    </script>
</head>

<body style="font-family: 'Roboto', sans-serif;" ng-app="app">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="float:left;"><img src="assets/img/obor.png" /></div>
                            <form method="post" action="">
                                <input name="signo" type="submit" value="Sign Out" class="btn btn-primary" style="float:right;"/>
                            </form>
                        </div>
                    </div>
                    <br />
                    <form class="form" name="myForm" method="" action="">
                        <div class="row">
                            <div class="col-md-12" style="background-color:#c42127; color:white;">
                                <h2 style="text-align:center;font-family: 'Titillium Web', sans-serif;font-weight: 700;margin-bottom:10px;margin-top:10px;">RECIEPT GENERATOR</h2>
                            </div>
                            <div class="col-md-6">
                                        <h4>Enter Student Details</h4>
                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Enter Voucher ID:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="id" class="form-control" ng-model="id" placeholder="ISB-1709-6267M0879">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Voucher Issue Date:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="date" ng-model="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Due Date:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="date" ng-model="ddate" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Full Name:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Full Name..." ng-model="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Session:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" placeholder="Oct - Nov" ng-model="session" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Fee Of:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" placeholder="1, 2 Month" ng-model="fMonth" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">Email:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="email" placeholder="someone@example.com" ng-model="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <div class="col-md-4"><label style="margin-top:10px;">City:</label></div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" placeholder="Islamabad" ng-model="city" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="col-md-6">
                                <h4>Enter Fee Details</h4>
                                <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Admission Fee:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" ng-model="aFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Course Fee:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" ng-model="cFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Fine / Non-Payment / Arrers:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number"  ng-model="fines" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Adjustments / Waivers:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number"  ng-model="waive" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Course Material Charges:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" ng-model="cmCharges" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Security Deposit [Refundable]:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" ng-model="sd" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label style="margin-top:10px;">Tax Credit 5% [Refundable]:</label></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number"  ng-model="tc" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                            </div>
                          </div>
                        <hr>

                    </form>

                </div>

                <div class="col-md-12">

                    <br/><br/>
                        <h4>Live Payment Voucher [Use Chrome for optimum use] Ver:2.0</h4>
                    <button onclick="printElement();" class="btn btn-primary btn-round btn-tooltip" >Print this voucher</button>
                    <button class="btn btn-default btn-round btn-tooltip" data-toggle="modal" data-target="#myModal">Document Printing Tutorial and Guidelines</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Document Printing Tutorial and Guidelines</h4>
                              </div>
                              <div class="modal-body">
                                So far you have logged in to the website<br/>

                                  <div>
                                    <h4>Step 1: It is important, enter all the details and check for any mistakes!</h4>
                                      <a href="assets/img/Capture2.PNG" target="_blank"><img src="assets/img/Capture2.PNG" alt="step 1" /></a>
                                  </div>
                                  <div>
                                    <h4>Step 2: Click on "Print Voucher"</h4>
                                      <a href="assets/img/Capture3.PNG"  target="_blank"><img src="assets/img/Capture3.PNG" alt="step 1" /></a>
                                  </div>
                                  <div>
                                    <h4>Step 3: "Preferably use Chrome Browser", Check for printing settings, then press Print</h4>
                                      <p>---- Press more settings ---- <br/>Layout: Landscape<br/>Paper Size: A4<br/>Scale: 100<br/></p>
                                      <a href="assets/img/Capture4.PNG" target="_blank" ><img src="assets/img/Capture4.PNG" alt="step 1" /></a>
                                  </div>

                                  <div>
                                    <h4>Save As PDF</h4>
                                      <p>---- Press "Change" Below "Print" Button ---- <br/>Press: "Save as PDF" button<br/>Layout: Landscape<br/>Paper Size: A4<br/>Scale: 100<br/></p>
                                      <a href="assets/img/Capture5.PNG" target="_blank" ><img src="assets/img/Capture5.PNG" alt="step 1" /></a>
                                      <a href="assets/img/Capture6.PNG" target="_blank" ><img src="assets/img/Capture6.PNG" alt="step 1" /></a>
                                  </div>

                                  <div>
                                        <h4>More Guidelines</h4>
                                        1. Preferably use Chrome and Microsoft Edge browser<br/>
                                        2. <b>Please sign out when done with printing</b><br/>
                                      3. Carefully enter all the details, and double verify before printing<br/>
                                      4. If in any confusion contact Obortunity Tech Department, or email at <a href="mailto:mohadosama@gmail.com">mohadosama@gmail.com</a>
                                  </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <input type="checkbox" name="frm" id="voucher" checked> Voucher<br>
                    <input type="checkbox" name="frm" id="invoice" checked> Invoice<br>

                    <br/><br/>
                        <div id="areaID">
                            <div class="row" id="voucherDiv">

                                <div style="border:1px dashed black; width:300px;" class="col-md-4">
                                         <table style="font-size:9pt;">
                                             <br/>
                                            <tr>

                                                <td>Voucher No:</td>

                                                <td><b ng-bind="id"></b></td>
                                            </tr>
                                        </table>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="date | date "dd-mm-yyyy""></b></td>
                                                <td>Due Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="ddate | date "dd-mm-yyyy""></b></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td style="width:300px;">Bank Credit Voucher, Faysal Bank, Islamabad</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/fsBank.png" style="width:150px;margin-right:40px; margin:10px;"><img src="assets/img/obor.png"style="width:150px;"/></td>
                                            </tr>
                                        </table>
                                         <hr>
                                        <table style="font-size:9pt;">
                                                <tr>
                                                    <td>Account No: </td>
                                                    <td><b>0194007900216900</b> </td>
                                                </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Name: </td>
                                                <td ng-bind="name"></td>
                                            </tr>
                                        </table>
                                                <table style="font-size:9pt;">
                                            <tr>
                                                <td>Session: </td>
                                                <td><b ng-bind="session"></b> </td>
                                                <td style="padding-left:100px;">Fee: </td>
                                                <td><b ng-bind="fMonth"></b> </td>
                                            </tr>
                                        </table>


                                        <table border="1" class="tableintable">
                                            <tr>
                                                <th style="width:250px;">Particulars</th>
                                                <th style="width:80px;">Amount</th>
                                            </tr>
                                            <tr>
                                                <td>Admission Fee</td>
                                                <td ng-bind="aFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Course Fee</td>
                                                <td ng-bind="cFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Fine / Non-Payment / Arrears</td>
                                                <td ng-bind="fines"></td>
                                            </tr>
                                            <tr>
                                                <td>Adjustments / Waivers</td>
                                                <td><b>(<b  style="border:0;padding:0px;" ng-bind="waive"></b>)</b> </td>
                                            </tr>
                                            <tr>
                                                <td>Course Material Charges</td>
                                                <td ng-bind="cmCharges"></td>
                                            </tr>
                                            <tr>
                                                <td>Security Deposit [Refundable]</td>
                                                <td ng-bind="sd"></td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Tax Credit 5%</td>
                                                <td ng-bind="tc"></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td><b ng-bind="aFee+cFee+fines+cmCharges+sd+tc-waive"></b></td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr>
                                                <td>Total payable in Words:</td>
                                                <td style="text-decoration:underline;font-size:10pt;">{{aFee+cFee+fines+cmCharges+sd+tc-waive | words}} Only</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>Mode of payment:</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cheque</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cash</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>If Cheque, Cheque No. _______________________________________</td>
                                            </tr>
                                        </table>

                                        <hr>
                                        <table>
                                            <tr>
                                                <td>In case of any queries, contact: <a style="font-size:10pt;">payments@obortunity.org</a> Or call at <a style="font-size:10pt;">0317-1541489</a></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <tr style="text-align:center;">
                                                <td style="padding-right:130px;">For: Faysal Bank  </td>
                                                <td>Cashier: Bank Officer</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td style="text-align:center; font-size:10pt;"><b>Office Copy</b></td>
                                            </tr>
                                        </table>
                                    </div>

                                <div style="border:1px dashed black; width:300px;" class="col-md-4">
                                         <table style="font-size:9pt;">
                                             <br/>
                                            <tr>

                                                <td>Voucher No:</td>

                                                <td><b ng-bind="id"></b></td>
                                            </tr>
                                        </table>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="date | date "dd-mm-yyyy""></b></td>
                                                <td>Due Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="ddate | date "dd-mm-yyyy""></b></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td style="width:300px;">Bank Credit Voucher, Faysal Bank, Islamabad</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/fsBank.png" style="width:150px;margin-right:40px; margin:10px;"><img src="assets/img/obor.png"style="width:150px;"/></td>
                                            </tr>
                                        </table>
                                         <hr>
                                        <table style="font-size:9pt;">
                                                <tr>
                                                    <td>Account No: </td>
                                                    <td><b>0194007900216900</b> </td>
                                                </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Name: </td>
                                                <td ng-bind="name"></td>
                                            </tr>
                                        </table>
                                                <table style="font-size:9pt;">
                                            <tr>
                                                <td>Session: </td>
                                                <td><b ng-bind="session"></b> </td>
                                                <td style="padding-left:100px;">Fee: </td>
                                                <td><b ng-bind="fMonth"></b> </td>
                                            </tr>
                                        </table>


                                        <table border="1" class="tableintable">
                                            <tr>
                                                <th style="width:250px;">Particulars</th>
                                                <th style="width:80px;">Amount</th>
                                            </tr>
                                            <tr>
                                                <td>Admission Fee</td>
                                                <td ng-bind="aFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Course Fee</td>
                                                <td ng-bind="cFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Fine / Non-Payment / Arrears</td>
                                                <td ng-bind="fines"></td>
                                            </tr>
                                            <tr>
                                                <td>Adjustments / Waivers</td>
                                                <td><b>(<b  style="border:0;padding:0px;" ng-bind="waive"></b>)</b> </td>
                                            </tr>
                                            <tr>
                                                <td>Course Material Charges</td>
                                                <td ng-bind="cmCharges"></td>
                                            </tr>
                                            <tr>
                                                <td>Security Deposit [Refundable]</td>
                                                <td ng-bind="sd"></td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Tax Credit 5%</td>
                                                <td ng-bind="tc"></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td><b ng-bind="aFee+cFee+fines+cmCharges+sd+tc-waive"></b></td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr>
                                                <td>Total payable in Words:</td>
                                                <td style="text-decoration:underline;font-size:10pt;">{{aFee+cFee+fines+cmCharges+sd+tc-waive | words}} Only</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>Mode of payment:</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cheque</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cash</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>If Cheque, Cheque No. _______________________________________</td>
                                            </tr>
                                        </table>

                                        <hr>
                                        <table>
                                            <tr>
                                                <td>In case of any queries, contact: <a style="font-size:10pt;">payments@obortunity.org</a> Or call at <a style="font-size:10pt;">0317-1541489</a></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <tr style="text-align:center;">
                                                <td style="padding-right:130px;">For: Faysal Bank  </td>
                                                <td>Cashier: Bank Officer</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td style="text-align:center; font-size:10pt;"><b>Bank Copy</b></td>
                                            </tr>
                                        </table>
                                    </div>

                                <div style="border:1px dashed black; width:300px;" class="col-md-4">
                                         <table style="font-size:9pt;">
                                             <br/>
                                            <tr>

                                                <td>Voucher No:</td>

                                                <td><b ng-bind="id"></b></td>
                                            </tr>
                                        </table>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Issue Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="date | date "dd-mm-yyyy""></b></td>
                                                <td>Due Date:</td>
                                                <td style="width:100px;padding-left:10px;"><b ng-bind="ddate | date "dd-mm-yyyy""></b></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td style="width:300px;">Bank Credit Voucher, Faysal Bank, Islamabad</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/fsBank.png" style="width:150px;margin-right:40px; margin:10px;"><img src="assets/img/obor.png"style="width:150px;"/></td>
                                            </tr>
                                        </table>
                                         <hr>
                                        <table style="font-size:9pt;">
                                                <tr>
                                                    <td>Account No: </td>
                                                    <td><b>0194007900216900</b> </td>
                                                </tr>
                                        </table>
                                        <hr>
                                        <table style="font-size:9pt;">
                                            <tr>
                                                <td>Name: </td>
                                                <td ng-bind="name"></td>
                                            </tr>
                                        </table>
                                                <table style="font-size:9pt;">
                                            <tr>
                                                <td>Session: </td>
                                                <td><b ng-bind="session"></b> </td>
                                                <td style="padding-left:100px;">Fee: </td>
                                                <td><b ng-bind="fMonth"></b> </td>
                                            </tr>
                                        </table>


                                        <table border="1" class="tableintable">
                                            <tr>
                                                <th style="width:250px;">Particulars</th>
                                                <th style="width:80px;">Amount</th>
                                            </tr>
                                            <tr>
                                                <td>Admission Fee</td>
                                                <td ng-bind="aFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Course Fee</td>
                                                <td ng-bind="cFee"></td>
                                            </tr>
                                            <tr>
                                                <td>Fine / Non-Payment / Arrears</td>
                                                <td ng-bind="fines"></td>
                                            </tr>
                                            <tr>
                                                <td>Adjustments / Waivers</td>
                                                <td><b>(<b  style="border:0;padding:0px;" ng-bind="waive"></b>)</b> </td>
                                            </tr>
                                            <tr>
                                                <td>Course Material Charges</td>
                                                <td ng-bind="cmCharges"></td>
                                            </tr>
                                            <tr>
                                                <td>Security Deposit [Refundable]</td>
                                                <td ng-bind="sd"></td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Tax Credit 5%</td>
                                                <td ng-bind="tc"></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td><b ng-bind="aFee+cFee+fines+cmCharges+sd+tc-waive"></b></td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr>
                                                <td>Total payable in Words:</td>
                                                <td style="text-decoration:underline;font-size:10pt;">{{aFee+cFee+fines+cmCharges+sd+tc-waive | words}} Only</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>Mode of payment:</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cheque</td>
                                                <td><div style="padding:4px;border:1px solid black; width:10px;"> </div></td><td>Cash</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>If Cheque, Cheque No. _______________________________________</td>
                                            </tr>
                                        </table>

                                        <hr>
                                        <table>
                                            <tr>
                                                <td>In case of any queries, contact: <a style="font-size:10pt;">payments@obortunity.org</a> Or call at <a style="font-size:10pt;">0317-1541489</a></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <tr style="text-align:center;">
                                                <td style="padding-right:130px;">For: Faysal Bank  </td>
                                                <td>Cashier: Bank Officer</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td style="text-align:center; font-size:10pt;"><b>Student Copy</b></td>
                                            </tr>
                                        </table>
                                    </div>

                            </div>
                            <div class="row" id="voucherDiv1" style="height:50px;"></div>
                            <div class="row" id="invoiceDiv">

                                <div style="border:2px solid #c42127; width:300px;" class="col-md-6">
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px; background-color:#f1f1f1;">
                                        <div class="col-md-6"><img src="assets/img/obor.png" /></div>
                                        <div class="col-md-6" style="font-size:14pt;text-align:right; color:#c42127"><b>MANDARIN FOR BUSINESS<br/>FEE INVOICE</b></div>
                                    </div>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                        <div class="col-md-8">
                                            <table>
                                                <tr>
                                                    <td>Session: </td>
                                                    <td><b ng-bind="session"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Registration No: </td>
                                                    <td><b ng-bind="id"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Name: </td>
                                                    <td><b ng-bind="name"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Email: </td>
                                                    <td><b ng-bind="email"></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <table>
                                                <tr>
                                                    <td>City: </td>
                                                    <td><b ng-bind="city"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Issue Date: </td>
                                                    <td><b ng-bind="date | date "dd-mm-yyyy""></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Due Date: </td>
                                                    <td><b ng-bind="ddate | date "dd-mm-yyyy""></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <style>
                                        #invoicetable td{
                                            border-top: 1px dashed lightgrey;

                                        }
                                        #invoicetable b{
                                            border-left: 1px dashed lightgrey;
                                            padding-left: 15px;
                                        }
                                    </style>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                            <div class="col-md-12">
                                                <table id="invoicetable">
                                                    <tr>
                                                        <th style="width:350px; padding-left:5px;"> DESCRIPTION</th>
                                                        <th style="width:150px; padding-left:20px;"> AMOUNT</th>
                                                    </tr>
                                                    <tr>
                                                <td>Admission Fee</td>
                                                <td><b ng-bind="aFee"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Course Fee</td>
                                                <td><b ng-bind="cFee"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Fine / Non-Payment / Arrears</td>
                                                <td><b ng-bind="fines"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Adjustments / Waivers</td>
                                                <td><b>(<b  style="border:0;padding:0px;" ng-bind="waive"></b>)</b> </td>
                                            </tr>
                                            <tr>
                                                <td>Course Material Charges</td>
                                                <td><b ng-bind="cmCharges"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Security Deposit [Refundable]</td>
                                                <td><b ng-bind="sd"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Tax Credit 5%</td>
                                                <td><b ng-bind="tc"></b></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:12pt;">Total</td>
                                                <td style="font-size:12pt;"><b ng-bind="aFee+cFee+fines+cmCharges+sd+tc-waive"></b></td>
                                            </tr>
                                                </table>

                                                <table>
                                                    <tr>
                                                        <td>Total payable in words:</td>
                                                        <td style="text-decoration:underline;font-size:10pt;">{{aFee+cFee+fines+cmCharges+sd+tc-waive | words}} Only</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                            <div class="col-md-12" style="font-size:8pt;">
                                                <b style="font-size:10pt;" >Terms and Conditions</b>
                                                <br/>
                                                - Fee is non-refundable
                                                <br/>
                                                - In case of payment through Cheque, make all cheques payable to <b>Obortunity Consulting (Pvt) Ltd.</b>
                                                <br/>
                                                - In case of payment through IBFT, make all payment to<b> Faysal Bank Account # 0194007900216900
                                                </b><br/>
                                                - For any queries, contact us at <b>payments@obortunity.org</b>
                                                <br/>
                                                - After the deadline, <b>a fine of PKR 100 will be charged per day</b>
                                                <br/>
                                                <b style="font-size:10pt;">Thank you for enrolling with us! Excited to see you soon.</b>

                                            </div>
                                        </div>
                                    <div class="row" style=" padding:5px;">
                                        <div class="col-md-12">
                                            <b style="font-size:14pt;">STUDENT COPY</b>
                                        </div>
                                        <div class="col-md-12">This is system-generated invoice </div>
                                    </div>

                                    <div class="row" style=" padding:5px; font-size:8pt;">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            Payment Recieved By: <br/><br/>__________________________
                                        </div>
                                    </div>
                                </div>

                                <div style="border:2px solid #c42127; width:300px;" class="col-md-6">
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px; background-color:#f1f1f1;">
                                        <div class="col-md-6"><img src="assets/img/obor.png" /></div>
                                        <div class="col-md-6" style="font-size:14pt;text-align:right; color:#c42127"><b>MANDARIN FOR BUSINESS<br/>FEE INVOICE</b></div>
                                    </div>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                        <div class="col-md-8">
                                            <table>
                                                <tr>
                                                    <td>Session: </td>
                                                    <td><b ng-bind="session"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Registration No: </td>
                                                    <td><b ng-bind="id"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Name: </td>
                                                    <td><b ng-bind="name"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Email: </td>
                                                    <td><b ng-bind="email"></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4" style="">
                                            <table>
                                                <tr>
                                                    <td>City: </td>
                                                    <td><b ng-bind="city"></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Issue Date: </td>
                                                    <td><b ng-bind="date | date "dd-mm-yyyy""></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Due Date: </td>
                                                    <td><b ng-bind="ddate | date "dd-mm-yyyy""></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <style>
                                        #invoicetable td{
                                            border-top: 1px dashed lightgrey;

                                        }
                                        #invoicetable b{
                                            border-left: 1px dashed lightgrey;
                                            padding-left: 15px;
                                        }
                                    </style>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                            <div class="col-md-12">
                                                <table id="invoicetable">
                                                    <tr>
                                                        <th style="width:350px; padding-left:5px;"> DESCRIPTION</th>
                                                        <th style="width:150px; padding-left:20px;"> AMOUNT</th>
                                                    </tr>
                                                    <tr>
                                                <td>Admission Fee</td>
                                                <td><b ng-bind="aFee"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Course Fee</td>
                                                <td><b ng-bind="cFee"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Fine / Non-Payment / Arrears</td>
                                                <td><b ng-bind="fines"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Adjustments / Waivers</td>
                                                <td><b>(<b  style="border:0;padding:0px;" ng-bind="waive"></b>)</b> </td>
                                            </tr>
                                            <tr>
                                                <td>Course Material Charges</td>
                                                <td><b ng-bind="cmCharges"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Security Deposit [Refundable]</td>
                                                <td><b ng-bind="sd"></b></td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Tax Credit 5%</td>
                                                <td><b ng-bind="tc"></b></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:12pt;">Total</td>
                                                <td style="font-size:12pt;"><b ng-bind="aFee+cFee+fines+cmCharges+sd+tc-waive"></b></td>
                                            </tr>
                                                </table>

                                                <table>
                                                    <tr>
                                                        <td>Total payable in words:</td>
                                                        <td style="text-decoration:underline;font-size:10pt;">{{aFee+cFee+fines+cmCharges+sd+tc-waive | words}} Only</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <div class="row" style="border-bottom:2px solid #c42127; padding:5px;">
                                            <div class="col-md-12" style="font-size:8pt;">
                                                <b style="font-size:10pt;" >Terms and Conditions</b>
                                                <br/>
                                                - Fee is non-refundable
                                                <br/>
                                                - In case of payment through Cheque, make all cheques payable to <b>Obortunity Consulting (Pvt) Ltd.</b>
                                                <br/>
                                                - In case of payment through IBFT, make all payment to<b> Faysal Bank Account # 0194007900216900
                                                </b><br/>
                                                - For any queries, contact us at <b>payments@obortunity.org</b>
                                                <br/>
                                                - After the deadline, <b>a fine of PKR 100 will be charged per day</b>
                                                <br/>
                                                <b style="font-size:10pt;">Thank you for enrolling with us! Excited to see you soon.</b>

                                            </div>
                                        </div>
                                    <div class="row" style=" padding:5px;">
                                        <div class="col-md-12">
                                            <b style="font-size:14pt;">OFFICE COPY </b>
                                        </div>
                                        <div class="col-md-12">This is system-generated invoice</div>
                                    </div>

                                    <div class="row" style=" padding:5px; font-size:8pt;">
                                        <div class="col-md-4">
                                            Payment Recieved By:<br/><br/>__________________________
                                        </div>
                                        <div class="col-md-4">
                                            Checked By Finance:<br/><br/>__________________________<br/><div style="width:10px;height:10px;border:1px solid black; float:left; margin-top:2px;"></div><div style="float:right;padding-right:50px;">Voucher Recieved</div>
                                        </div>
                                        <div class="col-md-4">
                                            Checked By Operations :<br/><br/>__________________________<br/><div style="width:10px;height:10px;border:1px solid black; float:left; margin-top:2px;"></div><div style="float:right;padding-right:50px;">Voucher Recieved</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <br/><br/>

                </div>
            </div>
        </div>

    </div>
</body>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script>



var app = angular.module('app',[]);

app.filter('words', function() {
  function isInteger(x) {
        return x % 1 === 0;
    }


  return function(value) {
    if (value && isInteger(value))
      return  toWords(value);

    return value;
  };

});


var th = ['','thousand','million', 'billion','trillion'];
var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine'];
var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen'];
var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];


function toWords(s)
{
    s = s.toString();
    s = s.replace(/[\, ]/g,'');
    if (s != parseFloat(s)) return 'not a number';
    var x = s.indexOf('.');
    if (x == -1) x = s.length;
    if (x > 15) return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i=0; i < x; i++)
    {
        if ((x-i)%3==2)
        {
            if (n[i] == '1')
            {
                str += tn[Number(n[i+1])] + ' ';
                i++;
                sk=1;
            }
            else if (n[i]!=0)
            {
                str += tw[n[i]-2] + ' ';
                sk=1;
            }
        }
        else if (n[i]!=0)
        {
            str += dg[n[i]] +' ';
            if ((x-i)%3==0) str += 'hundred ';
            sk=1;
        }


        if ((x-i)%3==1)
        {
            if (sk) str += th[(x-i-1)/3] + ' ';
            sk=0;
        }
    }
    if (x != s.length)
    {
        var y = s.length;
        str += 'point ';
        for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';
    }
    return str.replace(/\s+/g,' ');
}

window.toWords = toWords;

    </script>








</html>
