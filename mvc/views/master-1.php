<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T&K shop</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/preview/public/style/Var.css">

    <link rel="stylesheet" href="/preview/public/style/Footer.css">
    <link rel="stylesheet" href="/preview/public/style/Layout.css">
    <link rel="stylesheet" href="/preview/public/style/Header.css">
    <?php
        switch($data['page']) {
            case "ProductByCategory": 
                echo "<link rel=\"stylesheet\" href=\"/preview/public/style/MainContent.css\">";
                echo "<link rel=\"stylesheet\" href='/preview/public/style/TemplateProductByCategory.css'>";
                break;
            case "ProductByItem":
                echo "<link rel=\"stylesheet\" href=\"/preview/public/style/LayoutItem.css\">";
                echo "<link rel=\"stylesheet\" href=\"/preview/public/style/ListProduct.css\">";
                echo "<link rel=\"stylesheet\" href=\"/preview/public/style/ProductInfo.css\">";
                echo "<link rel=\"stylesheet\" href=\"/preview/public/style/Option.css\">";
                break; 
            default:
            echo "<link rel=\"stylesheet\" href=\"/preview/public/style/MainContent.css\">";
        }
    ?>

    <script src="/preview/public/js/animation.js"></script>
</head>
<body>
    <header>
        <?php require_once "./mvc/views/blocks/header.php"; ?>
    </header>
    <?php if($data["page"]=="ProductByItem") {
        echo "<div class=\"link-dir\"></div>";
    }?>
    <div class="container col-sm-12">
        <?php require_once "./mvc/views/pages/".$data["page"].".php"?>
    </div>
    <footer>
        <?php require_once "./mvc/views/blocks/footer.php"?>
    </footer>
</body>
</html>