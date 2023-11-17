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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['groupButton']) && $_POST['groupButton'] == 'A') {
        $groupQuery = "SELECT * FROM teams_table WHERE group_fk = 1";
        $result = $conn->query($groupQuery);
    }
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
            <div class="mx-5 my-3">
                <button type="button" class="btn btn-secondary">View all</button>
                <button type="button" class="A btn-secondary">Group A</button>
                <button type="button" class="B btn-secondary">Group B</button>
                <button type="button" class="C btn-secondary">Group C</button>
                <button type="button" class="D btn-secondary">Group D</button>
                <button type="button" class="E btn-secondary">Group E</button>
                <button type="button" class="F btn-secondary">Group F</button>
                <button type="button" class="G btn-secondary">Group G</button>
                <button type="button" class="H btn-secondary">Group H</button>
            </div>
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
                        </tr>
                    </thead>
                    <?php

                    ?>

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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>

                    </div>
                </div>
            </div>
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