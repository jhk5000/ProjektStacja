<?php
echo '<h2>Dodaj stację:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
?>

<div class="row">
    <div class="col-lg-6">
        <b>Nazwa:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="station_name" value=""/>
        <b>Województwo:</b>
        <select id="station_void" class="form-control">
            <option value="Podkarpackie">Podkarpackie</option>
            <option value="Małopolskie">Małopolskie</option>
        </select>
        <b>Miasto:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="station_city" value=""/>
        <b>Ulica:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="station_street" value=""/>
        <br/>
        <center><input class="btn btn-primary btn-lg" type="submit" onClick="app.registerStation();" value="Dodaj"/></center>
    </div>
</div>