<?php
require('requestor.php');

// Create Coinkite API requestor object
$CK_API = new CKRequestor();
// Get rates from '/public/rates' endpoint
$rates = $CK_API->get('/public/rates');
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h1>
            Coinkite PHP API Example #1
        </h1>
        <h2>
            This example uses the '/public/rates' API endpoint to get market rates for 
            various currency pairs.<br/>
            Note that not API keys are not required for this.
        </h2>
        <p>
            The current Bitcoin (<?php echo $rates['currencies']['BTC']['sign']; ?>)
            price in Canadian dollars is: 
            <?php echo $rates['rates']['BTC']['CAD']['pretty']; ?>
        </p>
        <p>
            The current Litecoin (<?php echo $rates['currencies']['LTC']['sign']; ?>)
            price in US dollars is: 
            <?php echo $rates['rates']['LTC']['USD']['pretty']; ?>
        </p>
        <p>
            The current Blackcoin (<?php echo $rates['currencies']['BLK']['sign']; ?>)
            price in Japanese Yen is: 
            <?php echo $rates['rates']['BLK']['JPY']['pretty']; ?>
        </p>
    </body>
</html>
