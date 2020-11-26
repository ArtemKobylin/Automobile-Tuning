<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/tune_item.css">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
    <title>Automobile tuning</title>
</head>
<body>
<header>
    <div class="modal fade" id="turboChargingPopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Turbo Charging</h5>
                </div>
                <div class="modal-body">
                    <select id="charging_selector" class="form-control">
                        <option value="small_turbine">Small Turbine (+30hp)</option>
                        <option value="compressor">Compressor (+30hp)</option>
                        <option value="big_turbine">Big Turbine (+50hp)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="brakePopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Turbo Charging</h5>
                </div>
                <div class="modal-body">
                    <select id="brake_selector" class="form-control">
                        <option value="medium">Medium Braking Disc (-2m)</option>
                        <option value="big">Big Braking Disc (-4m)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

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

<section class="main_content">
    <div class="container row">
        <div id="tuning_options" class="col-3">
            <h2>Tuning Options</h2>
            <button id="change_tires" value="change_tires">Change Tires</button><br>
            <button id="paint" value="paint">Paint Vehicle</button><br>
            <!--<button id="turbo_charging" value="turbo_charging">Turbo Charging</button><br>-->
        </div>
        <div class="col-1">
            <div class="divider-vertical"></div>
        </div>
        <div class="col-8">
            <div>
                <h2>Select a vehicle</h2>
                <select id="item_selector" class="form-control"></select>
            </div>
            <div>
                <h2>Specifications:</h2>
                <div id="item_specs">
                    <div></div>
                </div>
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
<script src="js/tune_item.js"></script>
</body>
</html>