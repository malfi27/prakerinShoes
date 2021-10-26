   <?php
    require 'function.php';

    if (isset($_POST['submit'])) {
        if (add($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
    ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Create</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="./custom/bootstrap.css">
        <link rel="stylesheet" href="./custom/app.css">
        <link rel="stylesheet" href="./custom/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="./custom/auth.css">

        <style>
            body {
                background: #f2f7ff;
                height: 100vh;
            }
            .container {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
            }
            .card {
                width: 100%;
                max-width: 800px;
            }
            label {
                margin-bottom: .5rem;
            }
        </style>
   </head>

   <body>
       <div class="container">
       <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tambah Produkmu</h4>
                <a href="index.php" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nameProduct">Nama Produk</label>
                            <input type="text" class="form-control" name="name" id="nameProduct" placeholder="Masukan Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harg Produk</label>
                            <input type="number" class="form-control" name="price" id="price" pattern="([0-9]{1,3}).([0-9]{1,3})" placeholder="Masukan Harga">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Masukan Deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="thumb">Masukan Gambar</label>
                            <input type="file" class="form-control" name="thumb" id="thumb">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
       </div>


       <script>
           
       </script>



   </body>
   </html>