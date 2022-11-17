<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
				<tr>
                                        <th>id</th>
					<th>Nom </th>
                                        <th>prenom</th>
                                        <th>email</th>
                                        <th>Age</th>
                                        <th>genre</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     include ('connect.php');
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM etudiant WHERE CONCAT(first_name,last_name,email,gender,age) LIKE '%$filtervalues%' ";
					$query_run = pg_query($conn,  $query);


			
                                        if(pg_num_rows($query_run) > 0)
                                        {
                                            while ($items = pg_fetch_row($query_run))
                                            {
                                                ?>
						<tr>
                                                    <td><?= $items['0']; ?></td>
                                                    <td><?= $items['1']; ?></td>
                                                    <td><?= $items['2']; ?></td>
						    <td><?= $items['3']; ?></td>
                                                    <td><?= $items['4']; ?></td>
                                                    <td><?= $items['5']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
