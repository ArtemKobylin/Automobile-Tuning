<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/create_new_item.css">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
    <title>Automobile tuning</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</header>

<section class="header">
    <div class="container">
        <h1>Automobile Tuning Tool</h1>
    </div>
</section>

<section class="input_form">
    <div class="container">
        <h2>Create new <?=$_GET['item']?></h2>
        <div class="flex_container item_flex_container">
            <div class="flex_item">
                <div id="create_new_item" class="content"></div>
            </div>
        </div>
    </div>
</section>

<section class="last_section">
    <div class="container">
        <div class="flex_container">
            <div class="text flex_item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ipsum eaque magnam neque amet quo, obcaecati earum doloremque dicta voluptate veritatis vel quidem quisquam sunt, distinctio facilis harum illo ducimus!
            </div>
            <div class="text flex_item">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati ad modi nobis illum saepe commodi, aspernatur ea sunt deleniti, fugiat error corrupti impedit possimus? Ratione praesentium assumenda culpa quo sapiente.
            </div>
            <div class="text flex_item">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae necessitatibus est tenetur? At non iure error suscipit sequi consequatur eveniet. Veritatis ab perspiciatis dolor aliquam et, molestiae delectus. Quaerat, ut.
            </div>
        </div>
    </div>
</section>

<script src="js/functions.js"></script>
<script src="js/create_new_item.js"></script>
</body>
</html>