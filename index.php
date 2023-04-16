<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
    
    <title>WooBoos</title>
</head>
<body>
    <header>
        <div class="navigation">
            <div class="logo">
                <h2>WOObOOS</h2>
            </div>
            <nav class="barreNav">
                <ul class="navbar">
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Recherche</a></li>
                    <li><a href="">Apropos</a></li>
                </ul>  
            </nav>
          <div class="btn">
             <i class="fa fa-bars open"></i>
             <i class="fa fa-times close"></i>
          </div>
            
        </div>
      
    </header>
    <form id="form" class="form" action="" method="post">
        <label for="depart">Point de depart</label>
        <br>
        <input type="text" id="depart" name="depart" required>
        <br>
         <small>Vers</small>
        <br>
        <label for="destination">Destination</label>
        <br>
        <input type="text" id="destination" name="destination" required>
        <br>
       <input class="boutton" type="submit" name="rechercher" value="Rechercher">
    </form>
    <div id="resultats">
   <?php
         
            include 'liste.php';
            if(isset($_POST['rechercher'])){
                $depart = $_POST["depart"];
                $destination =$_POST["destination"];
                $depart = ucfirst($depart);
                $destination = ucfirst($destination);
                if($depart == $destination){
                    echo "<p>Mandehana tongotra eh</p>";
                }else{
                    $bus_correspondant = array();
                    foreach($bus_arrets as $bus => $arrets){
                        if(in_array($depart,$arrets) && in_array($destination,$arrets)){
                            $bus_correspondant[] =$bus;
                        }
                    }
                    if (count($bus_correspondant)>0){
                        echo "<h4> Liste des bus correspond à votre itinéraire:</h4>";
                        echo "<ul>";
                        foreach($bus_correspondant as $bus){
                            echo "<li>".$bus."</li>";
                        }
                        echo"</ul>";
                        
                       // echo "<p>".  "Les bus suivants corresponds à votre itineraire: " . implode(", ", $bus_correspondant) ."</p>"; 
                     }else{
                        echo "<p> Auccun Bus correspon à votre itinéraire</p>";
                     }
             
                }
               
            }
            ?>
         
        
    </div>
    <script>
        let btn = document.querySelector('.btn')
        let menu  =document.querySelector('.barreNav')
        btn.addEventListener('click',()=>{
                 menu.classList.toggle('responsive')
  
})
    </script>
</body>
</html>