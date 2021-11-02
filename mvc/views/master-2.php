<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods order</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/preview/public/style/Var.css">
    
    <link rel="stylesheet" href="/preview/public/style/Layout.css">
    <link rel="stylesheet" href="/preview/public/style/Header.css">
    <link rel="stylesheet" href="/preview/public/style/Footer.css">   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php

        switch ($data['page']) {
            case "BuyItem":
                echo '<link rel="stylesheet" href="/preview/public/style/BuyItem.css">';
                break;
            case "AddtoCart": 
                echo '<link rel="stylesheet" href="/preview/public/style/AddtoCartLayout.css">';
                echo '<link rel="stylesheet" href="/preview/public/style/ListProductInCart.css">';
                break;
        }

    ?>
</head>
<body>
    <header>
        <?php require_once "./mvc/views/blocks/header.php"?>
    </header>
    <div class="container">
        <?php require_once "./mvc/views/pages/".$data['page'].".php";?>
    </div>
    <footer>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis tempora voluptatum hic impedit nam voluptates reiciendis tenetur enim labore. Eveniet delectus facilis ex voluptas ipsam necessitatibus. Repudiandae dicta odio quibusdam.
        </p>
    </footer>
</body>
</html>