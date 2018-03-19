<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initiale-scale=1">
        
        <title></title>
    </head>
 
    <body>
        <ul>
            <?php foreach ($data as $datum) : ?>
                <li><?= $datum->name; ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>