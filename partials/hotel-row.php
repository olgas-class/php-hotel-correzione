<?php if (isset($hotel)) { ?>
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