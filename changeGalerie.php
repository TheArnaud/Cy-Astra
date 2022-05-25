<?php
    session_start();
?>

<DOCTYPE html>

<html>
    <head>
        <script>
                    //Charger l'image depuis le navigateur de dossier
            var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById('image').value = "images/gallerie"+ image.src;
        };
        </script>
    </head>
    
        <body>
            <!--Formulaire de modification d'image de la galerie pour l'administrateur AdminGalerie -->
            <h3>Modifiez l'image <?php echo $_GET['imageId']; ?> en entrant la source d'une nouvelle image </h3>
            <form method="POST", name="modifImage", action="changeGalerieServ.php", class="form">
                <br>
                <label class="label">Source d'image</label>
                <input class="input", name="imageSource" id="image">
                <br>
                <input type="hidden"  value="<?php echo $_GET['imageId'] ?>" name="imageId">
                <input type="submit" value="Enregistrer la modification d'image" name='imageModifier'>
                <div id='pic'></div>
                <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)"></p>
                <p><img id="output" width="200" /></p>
        </body>
    </html>