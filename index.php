<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/index.css">
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
        <div class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deserunt repellendus officia autem placeat nisi aut inventore, quas maxime debitis esse nemo! Adipisci libero rerum debitis corporis voluptatibus. Facilis, mollitia.
        </div>
    </div>
</section>

<section class="selector">
    <div class="container">
        <h2>Selector section</h2>
        <div class="flex_container item_flex_container flex_row">
            <div class="flex_item">
                <div id="use_case_definition" class="content">
                    <div class="row"><h4>Use Case Definition</h4></div>
                    <div class="row">
                        <div class="col">
                            <div id="object_type_selector" class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" id="vehicle_radio" name="object_type_selector" value="vehicle" checked> Vehicle
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" id="workshop_radio" name="object_type_selector" value="workshop"> Workshop
                                </label>
                            </div>
                            <div id="vehicle_type_selector" class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary">
                                    <input type="radio" id="car_radio" name="vehicle_type_selector" value="car"> Car
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" id="bike_radio" name="vehicle_type_selector" value="bike"> Bike
                                </label>
                            </div>
                            <div id="workshop_type_selector" class="btn-group btn-group-toggle hidden" data-toggle="buttons">
                                <label class="btn btn-secondary">
                                    <input type="radio" id="car_workshop_radio" name="workshop_type_selector" value="car_workshop"> Car Workshop
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" id="bike_workshop_radio" name="workshop_type_selector" value="bike_workshop"> Bike Workshop
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex_item">
                <div class="content">
                    <div id="item_selector_container">
                        <div class="row">
                            <h4 class="col">Select <span>an item</span>:</h4>
                            <div class="col hidden">
                                <button type="button" data-toggle="modal" data-target="#pulleyAnglePopUp">?</button>
                            </div>
                        </div>
                        <input type="text" class="hidden" value="">
                        <select id="item_selector" class="form-control"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<section class="specifications">
    <div class="container">
        <h2>Specifications:</h2>
        <div class="flex_container item_flex_container">
            <div class="flex_item">
                <div class="content">
                    <div id="item_specs">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="btn_container">
            <div id="tune_item" class="hidden">
                <button>Tune <span>bike</span></button>
            </div>
            <div id="create_new_item" class="hidden">
                <button>Create new <span></span></button>
            </div>
            <div id="delete_item" class="hidden">
                <button>Delete <span></span></button>
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
<script src="js/index.js"></script>
</body>
</html>