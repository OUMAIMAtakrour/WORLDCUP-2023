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
                <img class="img-fluid" src="images/header-removebg-preview.png" alt="" style="height: 100% ;">
                <p>FIFA WORLD CUP 2023</p>
            </div>

            <h1 class="text-light text-center my-5 ">ENJOY THE MATCHS WITH YOUR FAVORITE GROUP</h1>
        </div>

    </header>
    <main>
        <section class="section1">
            <?php

            ?>
            <div class="mx-5 my-3">
                <form method="post">
                    <button onClick="window.location.reload();" class="btn btn-secondary ">Refresh</button>

                    <button type="submit" class="A btn btn-secondary" name="show" value="1">Group A</button>
                    <button type="submit" class="B btn btn-secondary" name="show" value="2">Group B</button>
                    <button type="submit" class="C btn btn-secondary my-3" name="show" value="3">Group C</button>
                    <button type="submit" class="D btn btn-secondary" name="show" value="4">Group D</button>
                    <button type="submit" class="E btn btn-secondary" name="show" value="5">Group E</button>
                    <button type="submit" class="F btn btn-secondary" name="show" value="6">Group F</button>
                    <button type="submit" class="G btn btn-secondary" name="show" value="7">Group G</button>
                    <button type="submit" class="H btn btn-secondary" name="show" value="8">Group H</button>
                </form>
            </div>
            <?php
            function fetchData($group)

            {
                global $conn;
                $data = "SELECT * FROM teams_table WHERE group_fk = $group";
                $result2 = $conn->query($data);

                if ($result2->num_rows > 0) {
                    echo "<table class='table  bg-dark text-light mx-4 my-4'>
                   
                    <tr><th scope='col' class='col-2'>Teams ID</th>
                    <th scope='col' class='col-2'>Teams name</th>
                    <th scope='col' class='col-2'>Coach name</th>
                    <th scope='col' class='col-2'>Players number</th>
                    <th scope='col' class='col-2'>Country</th>
                    
                    </tr>";

                    while ($row = $result2->fetch_assoc()) {
                        echo "<tr><th>" . $row["teams_id"] . "</th><th>" . $row["team_name"] .  "</th><th>" . $row["team_coach"]
                            . "</th><th>" . $row["nbr_players"] . "</th><th>" . $row["country"] .
                            "</th></tr>";
                    }
                    echo "</table>";
                } else {

                    echo "No data found.";
                }
            }
            ?>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show'])) {
                $selectedGroup = $_POST['show'];
                fetchData($selectedGroup);
            }

            ?>
            <?php if (!isset($_POST['show'])) { ?>
                <?php
                while ($row = $result->fetch_assoc()) {


                ?>

                    <table class="table table-striped bg-light mx-4 my-4">
                        <thead>
                            <tr>

                                <th scope="col" class="col-2"><?php echo $row["teams_id"] ?></th>
                                <th scope="col" class="col-2 p-3"><?php echo $row["team_name"] ?></th>
                                <th scope="col" class="col-2"><?php echo $row["team_coach"] ?></th>
                                <th scope="col" class="col-2"><?php echo $row["nbr_players"] ?></th>
                                <th scope="col" class="col-2 col"><?php echo $row["country"] ?></th>
                                <th scope="col" class="col-2">
                                    <form method="post">
                                        <input type="hidden" name="teamId" value="<?php echo $row['teams_id']; ?>">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="showTeam" value="<?php echo $row['teams_id']; ?>">View Details</button>
                                    </form>
                                </th>
                            </tr>
                        </thead>


                    </table>
            <?php
                }
            }
            ?>
            <form action="" method="post">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="show-details">
                    DETAILS
                </button>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <<?php echo "<tr><th>" . $row["teams_id"] . "</th><th>" ?>< /p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->

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
<!-- <img src="./images/argentina.png" alt="">
<img src="./images/australia.png" alt="">
<img src="./images/belgique.png" alt="">
<img src="./images/BRAZIL.png" alt="">
<img src="./images/canada.png" alt="">
<img src="./images/costa-rica.png" alt="">
<img src="./images/denmark.png" alt="">
<img src="./images/ENGLAND.png" alt="">
<img src="./images/equador.png" alt="">
<img src="./images/france.png" alt="">
<img src="./images/germany.png" alt="">
<img src="./images/GHANA.png" alt="">
<img src="./images/iran.png" alt="">
<img src="./images/japan.png" alt="">
<img src="./images/korea.png" alt="">
<img src="./images/maroc.png" alt="">
<img src="./images/mexico.png" alt="">
<img src="./images//netherland.png" alt="">
<img src="./images/PERU.png" alt="">
<img src="./images/poland.png" alt="">
<img src="./images/PORTUGAL.png" alt="">
<img src="./images/qatar.png" alt="">
<img src="./images/saudiarabia.png" alt="">
<img src="./images/senegal.png" alt="">
<img src="./images/SERBIA.png" alt="">
<img src="./images/spain.png" alt="">
<img src="./images/SWITZERLAND.png" alt="">
<img src="./images/tunisie.png" alt="">
<img src="./images/URUGUAY.png" alt="">
<img src="./images/usa.png" alt="">
<img src="./images/wales.png" alt="">
<img src="./images/croatia.png" alt=""> -->