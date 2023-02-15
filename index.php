<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>GymBeam</title>
</head>
<body>

    <?php require 'gymbeam.php'; ?>

    <h3>The most positive GymBeam product is:</h3>
    <h4><strong><?=$mostPositiveName?></strong></h4>
        <p>
            <?=$mostPositiveDescription?>
        </p>

    <h3>The most negative GymBeam product is:</h3>
    <h4><strong><?=$mostNegativeName?></strong></h4>
        <p>
            <?=$mostNegativeDescription?>
        </p>

    
</body>
</html>