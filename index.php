<?php
include_once __DIR__ . "/partials/hotels.php";

// Creo la variabile di hotel filtrati
$filtered_hotels = $hotels;

$filter_by_parking = $_GET["parking"] ?? "";
$filter_by_vote = $_GET["vote"] ?? "";
// Se il filtro per parcheggio è impostato, allora 
// scorro tutti gli hotel e inserisco in un'array quelli che hanno parcheggio
if ($filter_by_parking === "1") {
    // Filter manualmente
    // $temp_hotels = [];
    // foreach ($filtered_hotels as $hotel) {
    //     if ($hotel["parking"]) {
    //         $temp_hotels[] = $hotel;
    //     }
    // }
    // $filtered_hotels = $temp_hotels;
    $filtered_hotels = array_filter($filtered_hotels, fn ($hotel) => $hotel["parking"]);
}

if (!empty($filter_by_vote)) {
    // $filter_by_vote = intval($filter_by_vote);
    // $temp_hotels = [];
    // foreach ($filtered_hotels as $hotel) {
    //     if ($hotel["vote"] >= $filter_by_vote) {
    //         $temp_hotels[] = $hotel;
    //     }
    // }
    // $filtered_hotels = $temp_hotels;
    $filtered_hotels = array_filter($filtered_hotels, fn ($hotel) => $hotel["vote"] >= $filter_by_vote);
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
            <?php include __DIR__ . "/partials/filters.php"; ?>
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
                    foreach ($filtered_hotels as $hotel) {
                        include __DIR__ . "/partials/hotel-row.php";
                    } ?>
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