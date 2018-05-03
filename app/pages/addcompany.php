<?php
echo '<h2>Dodaj firmę:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";

//
?>

<div class="row">
    <div class="col-lg-6">
        <b>Nazwa:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="company_name" value=""/>
        <b>Adres:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="address" value=""/>
        <b>Znizka:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="discount" value=""/>
        <br/>
        <center><input class="btn btn-primary btn-lg" type="submit" onClick="app.registerCompany();" value="Dodaj"/></center>
    </div>
</div>