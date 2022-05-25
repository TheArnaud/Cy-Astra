<DOCTYPE html>

    <html>
        <head>
        <script>
            //Pour charger l'image via le navigateur de dossier
  var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('image').value = "images/"+ image.src;
};
</script>
        </head>
        <!--Formulaire de modification de l'item choisi, avec les champs pré-remplis -->
        <body>
        <h3>Modifier l'item #<?php echo $_GET['id'] ?></h3>
        <form method="POST", name="eventAdd", action="changeboutserv.php", class="form">
                <br>
                <label class="label">Nom</label>
                <input class="input", name="Nom" value="<?php echo $_GET['Nom'] ?>">
                <br>
                <label class="label">prix</label>
                <input  class="input", name="Prix"  value="<?php echo $_GET['prix'] ?>">
                <br>
                <label class="label">image source</label>
                <input class="input", name="image" value="<?php echo $_GET['img'] ?>" id="image">
                <br>
                <label class="label">infos</label>
                <input class="input", name="Infos" value="<?php echo $_GET['infos'] ?>">

                <input type="hidden"  value="<?php echo $_GET['id'] ?>" name="id">
                
    

                <input type="submit" value="Send" name='eventmodifier'>
    
            <!-- affiche l'image -->
                <div id='pic'></div>
                <!-- Charge l'image -->
                <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)"></p>
<p><img id="output" width="200" /></p>
        </body>
    
    
    </html>