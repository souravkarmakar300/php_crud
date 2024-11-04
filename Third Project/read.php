<?php
include("connection.php");

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users data</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>SL.No</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Password</td>
                            <td>Images</td>
                            <td>Gender</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <!-- Insert Table -->
                    <tbody>
                        <?php
                        $i    = 1;
                        $data = mysqli_query($conn, "SELECT * FROM  mamber");
                        $result = mysqli_fetch_assoc($data);
                        while ($result = mysqli_fetch_assoc($data)) :
                        ?>
                            <tr>
                                <td>
                                    <?= $i++ ?>
                                </td>
                                <td>
                                    <?php echo $result['username']; ?>
                                </td>
                                <td>
                                    <?php echo $result['email']; ?>
                                </td>
                                <td>
                                    <?php echo $result['password']; ?>
                                </td>
                                <td>
                                    <?php if (!empty($result['image'])) : ?>
                                        <img style="width: 50px; height: 50px;object-fit:cover;" src="./uploads/<?php
                                            echo $result['image'] ?>" alt="">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $result['gender']; ?>
                                </td>
                                <td>
                                    <!-- update -->
                                    <a href="update.php?id=<?= $result['id']; ?>" class="btn btn-primary mb-2">Edit</a>
                                    <!-- Update -->

                                    <!-- Delete -->
                                    <a href="" class="btn btn-danger dlt" data-deleteurl="delete.php?id=<?= $result['id']; ?>">Delete</a>
                                    <!-- Delete -->
                                </td>
                            </tr>
                        <?php
                        endwhile; ?>
                    </tbody>
                    <!-- insert Table -->
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <!-- Delete -->

    <script type=text/javascript>
        $(document).ready(function() {
            $(".dlt").click(function(e) {
                e.preventDefault();
                let dlurl = $(this).data("deleteurl");

                // Sweet alert
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = dlurl;
                    }
                });
            });

        });
    </script>

    <!-- Delete -->
</body>

</html>