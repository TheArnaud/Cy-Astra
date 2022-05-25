<?php
    session_start();
    ?>

    <?php
      try
      {
        // On établit la connection à MySQL et on active le détail des erreurs
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
      }
      catch(Exception $e)
      {
        // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
      }
    ?>

<?php 
// Prend toutes les valeurs de toutes les colonnes de la DB et les range dans des arrays
$query= "SELECT * FROM `membres`"; 
$result=$bdd->query($query);
$data=$result->fetchAll(\PDO::FETCH_ASSOC);
$ids = array_column($data,'membreId');
$noms =array_column($data,'nom');
$datedenaissances = array_column($data,'dateNaissance');
$pseudonymes = array_column($data,'pseudonyme');
$emails = array_column($data,'email');
$motdepasses = array_column($data,'motdepasse');
$adresses = array_column($data,'adresse');
$sexes = array_column($data,'sexe');
$professions = array_column($data,'profession');
$villes = array_column($data,'ville');
$roles = array_column($data,'roleMembres');


?>
<html>
<body>
<h2>Liste des membres</h2>
<br>
<table class="table">
  <thead>
    <tr>
      <!-- tableau -->
      <th scope="col">  IDs  </th>
      <th scope="col">  Noms  </th>
      <th scope="col">  Dates de naissance  </th>
      <th scope="col">  pseudonymes  </th>
      <th scope="col">  emails  </th>
      <th scope="col">  mots de passe  </th>
      <th scope="col">  adresses  </th>
      <th scope="col">  sexes </th>
      <th scope="col">  professions  </th>
      <th scope="col">  villes  </th>
      <th scope="col">  Rôles  </th>
    </tr>
  </thead>
  <tbody>
    <!-- colonnes -->
    <tr>
      <td><?php 
      foreach ($ids as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($noms as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($datedenaissances as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($pseudonymes as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($emails as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($motdepasses as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($adresses as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($sexes as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($professions as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($villes as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
      <td><?php 
      foreach ($roles as $value) {
        print_r('<br>'.$value.'<br>');
    
    }
      ?></td>
    </tr>
   
  </tbody>
</table>


</body>

</html>


