<?php
    class Parcel
    {
        private $height;
        private $width;
        private $length;
        private $weight;

        function setHeight($height_input)
        {
            $this->height = $height_input;
        }

        function getHeight()
        {
            return $this->height;
        }

        function setWidth($width_input)
        {
            $this->width = $width_input;
        }

        function getWidth()
        {
            return $this->width;
        }

        function setLength($length_input)
        {
            $this->length = $length_input;
        }

        function getLength()
        {
            return $this->length;
        }

        function setWeight($weight_input)
        {
            $this->weight = $weight_input;
        }

        function getWeight()
        {
            return $this->weight;
        }

        function volume($vol_height, $vol_width, $vol_length)
        {
            $volume = ($vol_height * $vol_width * $vol_length);
            return $volume;
        }

        function costToShip($volume, $weight)
        {
            $shipping_cost = ($volume * $weight) / 500;
            $formatted_price = number_format($shipping_cost, 2);
            return $formatted_price;
        }

    }

    $parcel = new Parcel();
    $parcel->setHeight($_GET["height"]);
    $parcel->setWidth($_GET["width"]);
    $parcel->setLength($_GET["length"]);
    $parcel->setWeight($_GET["weight"]);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Parcel</h1>
    <ul>
        <?php
            $parcel_height = $parcel->getHeight();
            $parcel_width = $parcel->getWidth();
            $parcel_length = $parcel->getLength();
            $parcel_volume = $parcel->volume($parcel_height, $parcel_width, $parcel_length);
            $parcel_weight = $parcel->getWeight();
            $parcel_cost = $parcel->costToShip($parcel_volume, $parcel_weight);
            $parcel_info = array($parcel_height, $parcel_width, $parcel_length, $parcel_weight);

            foreach($parcel_info as $input) {
                if ($input == 0) {
                    echo "<h2>Please fill in all fields.</h2>";
                }
            }

            echo "<li> Height: $parcel_height inches </li>
                  <li> Width: $parcel_width inches </li>
                  <li> Length: $parcel_length inches </li>
                  <li> Volume: $parcel_volume cubic inches</li>
                  <li> Weight: $parcel_weight pounds</li>
                  <h2>Total cost to ship: $$parcel_cost </h2>
                  ";

        ?>
    </ul>
  </body>
</html>
