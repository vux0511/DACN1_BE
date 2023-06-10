<?php

    include "DBConfig.php";

    $sql = "SELECT * FROM product ORDER BY idProduct DESC LIMIT 0,8";
    $result = $conn->query($sql);

    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product = array(
            "idProduct" => $row["idProduct"],
            "idCategory" => $row["idCategory"],
            "nameProduct" => $row["nameProduct"],
            "priceProduct" => number_format($row["priceProduct"]),
            "imageProduct_1" => $row["imageProduct_1"],
            "descriptionProduct" => $row["descriptionProduct"],
            
            );
            array_push($products, $product);
        }
    }

    echo json_encode($products);
    $conn->close();

?>