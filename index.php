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

// Creo la variabile di hotel filtrati
$filtered_hotels = $hotels;

$filter_by_parking = $_GET["parking"] ?? "";
$filter_by_vote = $_GET["vote"] ?? "";
// Se il filtro per parcheggio è impostato, allora 
// scorro tutti gli hotel e inserisco in un'array quelli che hanno parcheggio
if ($filter_by_parking === "1") {
    $temp_hotels = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["parking"]) {
            $temp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $temp_hotels;
}

if (!empty($filter_by_vote)) {
    $filter_by_vote = intval($filter_by_vote);
    $temp_hotels = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["vote"] >= $filter_by_vote) {
            $temp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $temp_hotels;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hotel</title>
</head>

<body>
    <main>
        <section class="container">
            <form action="index.php" method="GET">
                <div class="mb-2">
                    <label for="parking">Parcheggio</label>
                    <select class="form-select mb-3" name="parking" id="parking">
                        <option value="">Tutti</option>
                        <option value="1">Con parcheggio</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="vote">Voto minimo</label>
                    <select class="form-select mb-3" name="vote" id="vote">
                        <option value="">Tutti</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Filtra</button>
                    <button class="btn btn-secondary" type="reset">Annulla</button>
                </div>
            </form>
        </section>
        <section class="container">
            <h2>Vedi tutti i nostri hotel</h2>
            <!-- Approccio con le chiavi -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($filtered_hotels as $hotel) {  ?>
                        <tr>
                            <th scope="row">
                                <?php echo $hotel["name"]; ?>
                            </th>
                            <td>
                                <?php echo $hotel["description"]; ?>
                            </td>
                            <td>
                                <?php echo $hotel["parking"] ? "Sì" : "No"; ?>
                            </td>
                            <td>
                                <?php echo $hotel["vote"]; ?>
                            </td>
                            <td><?php echo $hotel["distance_to_center"]; ?> km</td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Approccio foreach annidato -->
            <!-- <?php
                    foreach ($hotels as $hotel) {
                        foreach ($hotel as $key => $value) {
                            if ($key === "parking") { ?>
                        <p>Parking: <?php echo $hotel["parking"] ? "Sì" : "No"; ?></p>
                    <?php } else { ?>
                        <p><?php echo $key; ?>: <?php echo $value; ?></p>
                    <?php } ?>
            <?php }
                    }
            ?> -->
        </section>
    </main>

</body>

</html>