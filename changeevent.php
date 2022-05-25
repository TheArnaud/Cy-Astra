<DOCTYPE html>

    <html>
        <head>
        <script>
            //Charge l'image depuis le navigateur de dossier
  var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('image').value = "images/"+ image.src;
};
</script>
        </head>
    
<body>
    <!--Formulaire de modification d'evenement pour l'administrateur, avec champs pré-remplis -->
    <h3>Modifier l'évenement #<?php echo $_GET['id'] ?></h3>
    <form method="POST", name="eventAdd", action="changeservevent.php", class="form">
        
        <label class="label">Nom</label>
        <input class="input", name="Nom"  value="<?php echo $_GET['Nom'] ?>">
        <br>
        <label class="label">description</label>
        <input  class="input", name="Description"  value="<?php echo $_GET['Description'] ?>">
        <br>
        <label class="label">image source</label>
        <input class="input", name="image", id="image" value="<?php echo $_GET['img'] ?>">

        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

        <input type="submit" value="Send" name='eventmodifier'>
        <div id='pic'></div>
        <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)"></p>
        <p><img id="output" width="200" /></p>
</body>

    
    </html>