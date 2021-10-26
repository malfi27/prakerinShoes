<?php
require 'function.php';

session_start();


    try {
        
      if(count($_SESSION) == 0){
     echo "<center>Login first<a href='login.php'>Login</a></center>";die;
}
    } catch (\Throwable $th) {
        echo "anda harus login";die;
    }


    $product = query("SELECT * FROM product");
$id = $_SESSION['user'][0]['id'];
$cart = query("SELECT * FROM cart WHERE user_id='$id'");
$total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/base/style.css">
    <link rel="stylesheet" href="./css/pages/page.css">
    <title>Shoes Store</title>
</head>

<body>
    <style>
.btnDelete {
    background: #dc3545;
    color: #fff;
    padding: .5rem 1rem;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    width: 100%;
}
.btnDelete:hover {
    color: #fff;
}
.prices {
    font-size: 16px;
}

    </style>

    <header id="header" class="header">
        <div class="container">
            <div class="flex__navbar">
                <div class="logo"><a href="#">Shoes Store</a></div>

                <?php if (isset($_SESSION['user'])) { ?>

                    <div class="logo">
                        <a href="">Halo <?= $_SESSION['user'][0]['username'] ?></a>
                        <span>/</span>
                        <a href="logout.php">Logout</a>
                    </div>

                <?php } else { ?>

                    <div class="logo">
                        <a href="login.php">Login</a>
                        <span>/</span>
                        <a href="registration.php">Register</a>
                    </div>

                <?php } ?>

                <div class="shoppping__cart">
                    <ul style="margin: 0;">
                        <li class="sub__menu">
                            <img src="./css/img/cart.png" alt="">
                            <div id="shopping__list">
                                <table id="cart__content" class="full_width">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>QTY</th>
                                            <th>Price</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php foreach ($cart as $key => $value) { ?>
                                            <tr>
                                                <td style="font-size: 10px;"> <?= $value['name_product'] ?></td>
                                                <td style="font-size: 10px;"> <?= $value['qty'] ?></td>
                                                <td style="font-size: 10px;"> <?= $value['price_product'] * $value['qty']?></td>
                                                <td style="display: flex;"> 
                                                    <button class="adds" cart-id="<?= $value['id'] ?>">+</button>
                                                 <button class="removes" cart-id="<?= $value['id'] ?>">-</button>
                                            </td>
                                                <?php $total += $value['total']?>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td style="font-size: 10px;">Total All</td>
                                                <td></td>
                                                <td></td>
                                                <td style="font-size: 10px;"><?= $total?></td>
                                            </tr>
                                    </tbody>
                                </table>
                                <a href="removecart.php?id=<?= $value["id"]; ?>" id="clear-cart" class="button u-full-width">Clear Cart</a>
                               <br></br>
                                <a href="ChoosePayment/index.html" id="clear-cart" class="button u-full-width">Check out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div id="banner">
        <div class="container" style="height: 100%;">
            <div class="banner__container" style="display: flex; align-items :center; height :100%; justify-content :center;">
                <div style="margin: 0;" class="banner__content">
                    <h2 id="learn" style="margin: 0; font-weight :700">Good shoe,explore the world</h2>
                </div>
            </div>
        </div>
    </div>
    <section>

        <div style="margin:auto;">
            <!-- <div class="row__content"> -->
                <h1 class="logo" style="margin:40px;">Our product </h1>
                <a style="padding: 1rem; font-size :16px; color:#25396f; text-decoration :none; font-weight :600;" href="create.php" >Tambah Produk</a> 
                <div id="dt" style="display :flex; align-items:center; flex-wrap:wrap;" >

                    <?php foreach ($product as $key => $value) { ?>
                        <div class="card" style="width :100%; margin: .5rem; max-width : 280px; border-radius :12px">
                        <div class="images-product" style="width: 100%;">
                            <img style="width: 100%; border-radius :12px;" src="./img/<?= $value["thumb"]; ?>" class="course-image_1">
                        </div>
                            <div class="info-card">
                                <h1 style="font-size: 24px; margin-bottom :.5rem; font-weight :600;"><?= $value["name"]; ?></h1>
                                <p style="font-size: 14px; font-weight :500;" ><?= $value["description"]; ?></p>
                                <div class="rattingAndPrice" style="display: flex; justify-content :space-between; align-items :center; width :100%; margin-top :2rem;">
                                    <img style="width: 100%;" src="./css/img/stars.png">
                                    <span class="prices" style="width: 100%; display :flex; justify-content :flex-end;">Rp <?= $value["price"]; ?></span></p>
                                </div>
                                <button class="u-full-width button-primary button input add-to-cart" data-id="<?= $value["id"]; ?>">Add to Cart</button>
                                <a class="btnDelete" href="delete.php?id=<?= $value["id"]; ?>">delete</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>



    </section>
    <footer>

        <footer id="footer" class="footer">


            <div>

            </div>
            <center>SHOES STORE</center>
        </footer>
        
        <!-- Real time search-->
       <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
       
       <script>
let search = document.querySelector(".search");
let searchIcon = document.querySelector(".search__icon");
let searchInput = document.querySelector(".search__input");
let searchClose = document.querySelector(".search__close");
let searchDelete = document.querySelector(".search__delete");

searchIcon.addEventListener("click", () => {
  search.classList.add("search-open");
  searchIcon.focus();
});

searchClose.addEventListener("click", () => {
  search.classList.remove("search-open");
  
  searchInput.value = "";
  setTimeout(() => {
                            location.reload();
                        }, 2000);
});

searchDelete.addEventListener("click", () => {
  searchInput.value = "";
  searchInput.focus();
});

       </script>
       <script>


var elements = document.getElementsByClassName("add-to-cart");

var myFunction = function() {
    var attribute = this.getAttribute("data-id");
    
    var data = new FormData();
    data.append('productid',attribute);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addcart.php', true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert('item has been added to cart');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
    xhr.send(data);

    
   
};

for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', myFunction, false);

    
}

var item = document.getElementsByClassName("adds");

var myFunction2 = function() {
    var attribute = this.getAttribute("cart-id");
    var data = new FormData();
    data.append('cartid',attribute);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add.php', true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert('QTY has been added');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
    xhr.send(data);

   
};

for (var i = 0; i < item.length; i++) {
    item[i].addEventListener('click', myFunction2, false);

    
}

var item2 = document.getElementsByClassName("removes");

var myFunction3 = function() {
    var attribute = this.getAttribute("cart-id");
    var data = new FormData();
    data.append('cartid',attribute);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'remove.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert('QTY has been removed');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
    xhr.send(data);

    
   
};

for (var i = 0; i < item2.length; i++) {
    item2[i].addEventListener('click', myFunction3, false);

}

    
     const log = document.getElementById('searcher');

log.onclick = function() {
        logKey();   
    };

function logKey(e) {
        var value = document.getElementById('search').value;

        if (value.length >= 1) {
  
// return card as product 

    var data = new FormData();
    data.append('search',value);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);

    xhr.onreadystatechange = function(e) {
        if(xhr.readyState == 4 && xhr.status == 200) {
                data = JSON.parse(this.response);
                var htm = "";
                        for (let i = 0; i < data.length; i++) {
                         
                          htm += '<div class="card"><img src="./img/'+data[i]['thumb']+'" class="course-image_1"><div class="info-card"><h4>'+data[i]['name']+'</h4><p>'+data[i]['description']+'</p><img src="./css/img/stars.png"><span class="u-pull-right ">'+data[i]['price']+'</span></p><button class="u-full-width button-primary button input add-to-cart" data-id="'+data[i]['id']+'">Add to Cart</button></div></div>';

                        }

                        var myelement = document.getElementById("dt");
                    myelement.innerHTML= htm;
            }
        }
    xhr.send(data);



        }
}


        </script>
</body>

</html>