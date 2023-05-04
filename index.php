<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    if(!empty($_POST['parcheggio']) && !empty($_POST['voto'])) {
        $parcheggio = $_POST["parcheggio"];
        $voto = $_POST["voto"];
    }
?>  
<body>
    
    

    <main class="vh-100 d-flex align-items-center justify-content-center">
    
        <?php if (isset($parcheggio)) {?> 

            <table class="w-75 text-center">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to center</th>
                </tr>
                <?php foreach($hotels as $hotel){ ?>   
                    <?php if(($hotel['parking'] == $parcheggio) && ($hotel['vote'] >= $voto )){ ?>   
                        <tr>
                            <td><?php echo $hotel['name']; ?></td>
                            <td><?php echo $hotel['description']; ?></td>
                            <td><?php 
                                    if($hotel['parking']){
                                    echo 'Si' ;
                                    } else echo 'No';
                                ?>
                            </td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td><?php echo $hotel['distance_to_center']; ?></td>

                        </tr>
                    <?php } ?>
                    
                <?php } ?>
            </table>

        <?php } else { ?>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="parcheggio">Hai bisogno di un parcheggio?</label>
                <select id="parcheggio" name="parcheggio">
                    <option value="">Choose an option</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                
                <br>

                <label for="voto">Inserisci il voto minimo</label>
                <select id="voto" name="voto">
                    <option value="">Choose an option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                
                <br>

                <input type="submit" value="Invia">
            </form>
        <?php }?>
        
    </main>
</body>
</html>