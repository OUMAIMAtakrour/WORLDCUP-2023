<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "myfirstdatabase";
$sql = "SELECT * FROM teams_table";
// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    // If you reach this point, the connection was successful
    echo "Connected successfully";
    $result = $conn->query($sql);
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>WORLD CUP</title>
</head>

<body>
    <header>
        <div class="overlay">
            <div class="col-12 bg-secondary d-flex justify-content-between " style="height:10vh;">
                <img class="img-fluid" src="images/header.png" alt="" style="height: 100%;">
                <p>FIFA WORLD CUP 2023</p>
            </div>

            <h1 class="text-light text-center my-5 ">ENJOY THE MATCHS WITH YOUR FAVORITE GROUP</h1>
        </div>

    </header>
    <main>
        <section class="section1">

            <?php

            while ($row = $result->fetch_assoc()) {


            ?>

                <table class="table table-striped bg-light mx-4 my-4">
                    <thead>
                        <tr>
                            <th scope="col" class="col-2"><?php echo $row["teams_id"] ?></th>
                            <th scope="col" class="col-2"><?php echo $row["team_name"] ?></th>
                            <th scope="col" class="col-2"><?php echo $row["team_coach"] ?></th>
                            <th scope="col" class="col-2"><?php echo $row["nbr_players"] ?></th>
                            <th scope="col" class="col-2"><?php echo $row["country"] ?></th>
                        </tr>
                    </thead>


                    <!-- <tr>
                            <th scope="row"></th>
                            <td> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td colspan="2"></td>
                            <td></td>
                        </tr> -->
                    <!-- <tr>
                            <th scope="row"></th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                        </tr> -->

                </table>
            <?php
            }
            ?>
            <!-- <table class="table table-striped bg-secondary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table> -->

            <!-- <div class="row align-items-center">
                <div class="col my-5">
                  GROUPS
                </div>
                <div class="col">
                  A
                </div>
                <div class="col">
                  B
                </div>
                <div class="col">
                    C
                  </div>
                  <div class="col">
                    D
                  </div>
                  <div class="col">
                   E
                  </div>
                  <div class="col">
                    F
                  </div>
                  <div class="col">
                   G
                  </div>
                  <div class="col">
                    H
                  </div>
              </div> -->

            <!-- <div class="cards row align-items-center bg-light">
                
                <div class="col-3">
                  One of three columns
                </div>
                <div class="col-3">
                  One of three columns
                </div>
                <div class="col">
                  One of three columns
                </div>
                <div class="col">
                    One of three columns
                  </div>
              </div>
              <div class="cards row align-items-center">
                <div class="col">
                  One of three columns
                </div>
                <div class="col">
                  One of three columns
                </div>
                <div class="col">
                  One of three columns
                </div>
                <div class="col">
                    One of three columns
                  </div>
              </div> -->
            <!-- On tables -->

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>