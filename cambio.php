<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <ul>
  <?php
        $importo = $_GET["importo"];
        $valuta = $_GET["cambioValuta"];
        $cambio = array("dollaro" => 1.08 , "yen" => 165.98, "sterline" => 0.80, "franchi" => 0.94);
        $data = date("Y-m-d");
        $dayOfWeek = date("W");
        $cambioValuta = $importo;
        $cambioValutaNoCommissioni = $importo * $cambio[$valuta];
        $commissione = 0;

        if ($dayOfWeek == 6|| $dayOfWeek == 0) {
          $cambioValuta -= $cambioValuta * 0.05;
        }else{
          $cambioValuta -= $cambioValuta * 0.025;
        }

        $cambioValuta *= $cambio[$valuta];

        switch ($dayOfWeek) {
          case 0:
            $commissione = 0.05;
            $dayOfWeek = "Domenica";
            break;
          case 1:
            $commissione = 0.025;
            $dayOfWeek = "Lunedì";
            break;
          case 2:
            $commissione = 0.025;
            $dayOfWeek = "Martedì";
            break;
          case 3:
            $commissione = 0.025;
            $dayOfWeek = "Mercoledì";
            break;
          case 4:
            $commissione = 0.025;
            $dayOfWeek = "Giovedì";
            break;
          case 5:
            $commissione = 0.025;
            $dayOfWeek = "Venerdì";
            break;
          case 6:
            $commissione = 0.05;
            $dayOfWeek = "Sabato";
            break;
        }

        
    ?>
    <li><?php echo $data;?></li>
    <li><?php echo $dayOfWeek;?></li>
    <li><?php echo $importo;?></li>
    <img src="./bandiere/italia.gif">
    <li><?php echo $cambioValutaNoCommissioni;?></li>
    <li><?php if($commissione == 0.05){
        echo "5% commissione maggiorata";
      }else{
        echo "2.5% commissione non maggiorata";
      }
      ?></li>
    <li><?php echo $cambioValuta . "<br>";
      switch ($valuta) {
        case "sterline":
            echo "<img src='./bandiere/UK.gif'>";
            break;
        case "dollaro":
            echo "<img src='./bandiere/USA.gif'>";
            break;
        case "franchi":
            echo "<img src='./bandiere/svizzera.gif'>";
            break;
        case "yen":
            echo "<img src='./bandiere/giappone.gif'>";
            break;
    }
    ?></li>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>