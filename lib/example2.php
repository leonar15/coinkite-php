<?php
require('requestor.php');

// Create Coinkite API requestor object
$CK_API = new CKRequestor('this-is-my-key', 'this-is-my-secret');

/* First, send the transaction request to the API.
   This will send 0.1 BTC from the account called 'MyBTC' to dest.
   This example sends an array of arguments to the put function,
   note that a JSON string could also be sent */
$ck_send = $CK_API->put('/v1/new/send', array('account'=>'MyBTC',
                                              'amount'=>0.1,
                                              'dest'=>'bitcoinAddress'));
// Now authorize the payment to be sent
$ck_auth = $CK_API->put($ck_send['next_step']);
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h1>
            Coinkite PHP API Example #2
        </h1>
        <h2>
            This example creates and sends a transaction.<br/>
            The HTML below summarizes the result with a refnum.
        </h2>
        <p>
            [<?php echo $ck_auth['result']['CK_refnum']; ?>]
            <?php echo $ck_auth['result']['amount']['pretty']; ?>
            sent to address: 
            <?php echo $ck_auth['result']['destination']; ?>
        </p>
    </body>
</html>
