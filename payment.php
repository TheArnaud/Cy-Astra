<?php 
session_start();
?>


<html>
    <head>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                              <!-- style du paiement façon Bitcoin-->
      <style>                                       
          body { margin-top:20px; }
      .panel-title {display: inline;font-weight: bold;}
      .checkbox.pull-right { margin: 0; }
      .pl-ziro { padding-left: 0px; }

      .container{
          margin: 0;
        position: fixed;
        top: 46%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);  
      }
      .btc{
          margin: 0;
        position: fixed;
        top: 50%;
        left: 60%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      }

      .abf-frame p {
        font-family: Helvetica!important;
        line-height: 18px;
        margin: 0!important;
        padding: 0!important
          
      }
      .abf-frame {
        color: #000!important;
        background-color: #fff!important;
        position: absolute;
        top: calc(50% - 245px);
        left: calc(50% - 180px);
        font-family: Helvetica!important;
        width: 360px;
        max-height: 600px;
        margin-top: 0;
        text-align: left;
        box-shadow: 0 12px 28px rgba(0,0,0,0.1);
        border-radius: 3px;
        font-size: 12px
      }
      .abf-frame a {
        font-family: Helvetica!important;
        color: #6A8FC2!important
      }
      .abf-frame a:hover {
        color: #676573!important
      }
      .abf-form {
        padding: 0 24px 24px
      }
      .abf-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 5px 24px;
        min-height: 93px
      }
      .abf-header div:nth-child(1) img {
        display: inline-block;
        margin: 5px 0
      }
      .abf-ash1 {
        text-align: center;
        font-size: 14px;
        margin: 12px 0
      }
      .abf-ash2 {
        font-size: 14px;
        text-align: center;
        margin: 12px 0;
        font-weight: 700
      }
      .abf-topline {
        border-top: 1px solid #dedede!important;
        padding-top: 12px
      }
      .abf-list-item {
        padding: 4px 0;
        display: flex;
        align-items: baseline
      }
      .abf-label {
        display: inline-block;
        width: 45%;
        padding-right: 24px;
        box-sizing: border-box;
        vertical-align: top;
        font-size: 12px;
        opacity: .5;
        text-align: right
      }
      .abf-value {
        display: inline-block;
        width: 48%;
        box-sizing: border-box
      }
      .abf-confirmations {
        display: inline-block;
        background-color: #dc3545!important;
        width: 12px;
        height: 12px;
        font-size: 9px;
        line-height: 12px;
        text-align: center;
        color: #fff!important;
        border-radius: 50%;
        margin-left: 3px
      }
      .abf-green {
        background-color: #28a745!important
      }
      .abf-img-height {
        max-height: 80px
      }
      </style>

<script>      // calcul conversion BTC/EUR au cours actuel (35k$)
function prixbtc() {
    document.getElementById('btc').innerText = parseInt('<?php echo $_GET['total'] ?>') / 35000; 
    document.getElementById('btc2').innerText = parseInt('<?php echo $_GET['total'] ?>') / 35000;
}
</script>
    </head>

<body onload="prixbtc()">     <!-- template paiement CB-->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Détails de votre payment
                    </h3>
                    <div class="checkbox pull-right">
                        
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                           NUMERO DE CARTE</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    DATE D'EXPIRATION</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CODE DE SECURITE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-eur"></span><?php echo $_GET['total']?>€</span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a onclick="window.location='accueil.php'" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>
    </div>
</div>
<div id="snackbar"> 
          <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden"></span>
          </div>
        </div>

<!-- Payment BTC  template de https://apirone.com/docs/templates -->
<div class="btc">
        <div class="abf-frame">
  <div class="abf-header">
    <div>
      <div class="abf-ash1"><img src="https://apirone.com/static/promo/bitcoin_logo_vector.svg" width="95" alt=""></div>
    </div>

  </div>
  <div class="abf-form">
    <div class="abf-ash1"> Envoyez <strong><a class="abf-totalbtc" id="btc"></a></strong> BTC
      à cette adresse </div>
    <div class="abf-address abf-topline abf-ash2 abf-input-address">16NsAySiUrLZc9WZzfSRBUxhk4QB47bPkT <!-- Adresse perso --></div>
    <div class="abf-data abf-topline">
      <div class="abf-list">
        <div class="abf-list-item">
          <div class="abf-label">Merchant:</div>
          <div class="abf-value">CY-Astra Store</div>
        </div>
        <div class="abf-list-item">
          <div class="abf-label">Amount to pay:</div>
          <div class="abf-value"><a class="abf-totalbtc" id="btc2"></a> BTC</div>
        </div>
        
        <div class="abf-list-item abf-tx-block">
          <div class="abf-label">Transaction(s):</div>
          <div class="abf-value abf-tx">
            <div><a href="https://www.blockchain.com/btc/tx/23539df4e38ec1f7f0c41e5abaa4d2c3b1ba5bc70f787eb1f85f428201b7fcbe" target="_blank">23539df4e38ec1f7f0...</a>
              <div class="abf-confirmations abf-green" title="Confirmations count">1</div>
            </div>
          </div>
        </div>
        <div class="abf-list-item">
          <div class="abf-label">Status:</div>
          <div class="abf-value"><b><span class="abf-status">Payment en attente</span></b></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>