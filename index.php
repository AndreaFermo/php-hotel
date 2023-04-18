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


    $parking = $_GET['parking'];
    $rate = $_GET['rate']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<form method="Get" class="container-lg">
    <label for="parking">Parking:</label>
    <select name="parking" id="parking">
        <option value="">Need it?</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
    <label for="rate"></label>
    <input type="number" id="rate" name="rate">
    <button type="submit">Invia</button>
    <button type="reset">Reset</button>
</form>


<table class="table table-primary table-striped table-hover container-lg">
    <thead>
        <tr>
            <?php
               if ($rate <= 5 && $rate > 0) {
                foreach($hotels[0] as $key => $hotel) {
                    echo "<th>".str_replace("_", " ", ucfirst($key))."</th>";
                };
            } else {
                echo "<h1>SCEGLI UN VALORE TRA 0 E 5!</h1>";
            };
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
 
        foreach ($hotels as $key => $hotel) {
            echo "<tr>";
            if ($hotel['parking']) {
                $hotel['parking'] = 'yes';

            } else {
                $hotel['parking'] = 'no';
            };

            if ($parking == 'no' && $hotel['parking'] == 'no' && $hotel['vote'] >= $rate && $rate > 0) {
                foreach($hotel as $value) {
                    echo "<td>".$value."</td>";
                }; 
            } else if ($parking == 'yes' && $hotel['parking'] == 'yes' && $hotel['vote'] >= $rate && $rate > 0) {
                foreach($hotel as $value) {
                    echo "<td>".$value."</td>";
                }; 
            } else if (empty($parking) && $hotel['vote'] >= $rate && $rate > 0) {
                foreach($hotel as $value) {
                    echo "<td>".$value."</td>";
                }; 
            };
            echo "</tr>";
        };
    ?>
    </tbody>
</table>
   
    
</body>
</html>