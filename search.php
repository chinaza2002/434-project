<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="container-fluid p-0 d-flex h-100">
        <div id="bdSidebar" class="d-flex flex-column  
                    flex-shrink-0  
                    p-3 bg-dark 
                    text-white offcanvas-md offcanvas-start">
            <a href="#" class="navbar-brand">
            </a>
            <ul class="mynav nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="dashboard.html">
                        <i class="fa-regular fa-user"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="customers.php">
                        <i class="fa-solid fa-table"></i>
                        View Customers
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="family.php">
                        <i class="fa-solid fa-table"></i>
                        View Family Accounts
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="measurements.php">
                        <i class="fa-solid fa-table"></i>
                        View Measurements
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="newcust.html">
                        <i class="fa-solid fa-plus"></i>
                        Add new a customer
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="searchcustomer.html">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search Customers
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a id="logout-modal-trigger">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Logout?
                    </a>
                </li>


        </div>

        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-dark">
                <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <span class="ms-3">GROUP ONE</span>
            </div>
            <div class="p-4">
                <nav style="--bs-breadcrumb-divider:'>';font-size:14px" id="nav">
                    <h2>Customer Details</h2>
                </nav>
                <hr>
                <?php 
    include("connection.php");
    
    if(isset($_POST["searchbutton"])) {
        $searcher = test($_POST["search"]);

        $sql = "SELECT * FROM measurements WHERE CustomerName = '$searcher'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-striped'>";
            echo "<thead><tr>
                    <th scope ='col'>CustomerName</th>
                    <th scope='col'>Bust</th>
                    <th scope='col'>HL</th>
                    <th scope='col'>FL</th>
                    <th scope='col'>UB</th>
                    <th scope='col'>Shoulder</th>
                    <th scope='col'>Waist</th>
                    <th scope='col'>HS</th>
                    <th scope='col'>Hips</th>
                    <th scope='col'>Crotch</th>
                    <th scope='col'>Chest</th>
                    </tr></thead>
                    ";
            echo "<tbody>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['CustomerName'] ."</td>";
                echo "<td>" . $row['Bust'] ."</td>";
                echo "<td>" . $row['H_L'] ."</td>";
                echo "<td>" . $row['F_L'] ."</td>";
                echo "<td>" . $row['U_B'] ."</td>";
                echo "<td>" . $row['Shoulder'] ."</td>";
                echo "<td>" . $row['Waist'] ."</td>";
                echo "<td>" . $row['H_S'] ."</td>";
                echo "<td>" . $row['Hips'] ."</td>";
                echo "<td>" . $row['Crotch'] ."</td>";
                echo "<td>" . $row['Chest'] ."</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }else{
            echo "No customers matches your search";
        }
    }else{
        echo "Please Enter a Name to search";
    }

    function test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
            </div>
        </div>
    </div>

    <div class="modal" id="logout-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close logout-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary logout-modal-close"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a href="/logout">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="scripts/scripts.js"></script>
</body>
</html>
