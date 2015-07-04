<?php
$x='
<tr><td colspan="2">Datos Personales</td></tr>
<tr><th>Apellidos</th>
    <td>'.$_POST["field1"].'</td></tr>
<tr><th>Nombres</th>
    <td>'.$_POST["field2"].'</td></tr>
<tr><th>Fecha de Nacimiento</th>
    <td>'.$_POST["field3"].'</td></tr>
<tr><th>Dirección y Número</th>
    <td>'.$_POST["field4"].'</td></tr>
<tr><th>Ciudad</th>
    <td>'.$_POST["field5"].'</td></tr>
<tr><th>País</th>
    <td>'.$_POST["field6"].'</td></tr>
<tr><th>Código de Población</th>
    <td>'.$_POST["field7"].'</td></tr>
<tr><th>Teléfono</th>
    <td>'.$_POST["field8"].'</td></tr>
<tr><th>E-mail</th>
 <td>'.$_POST["field9"].'</td></tr>
<tr><td colspan="2">Datos Profesionales</td></tr>

<tr><th>Profesión/ Ocupación</th>
    <td>'.$_POST["field10"].'</td></tr>
<tr><th>Nombre de Empresa</th>
    <td>'.$_POST["field11"].'</td></tr>
<tr><th>Dirección y Número</th>
    <td>'.$_POST["field12"].'</td></tr>
<tr><th>Teléfonos</th>
    <td>'.$_POST["field13"].'</td></tr><tr><td colspan="2">Ciclo Más por Mexico</td></tr>';
if($_POST['field14']){echo '<tr><td colspan="2">El Turismo como Política de Desarrollo sustentable para México</td></tr>';}
if($_POST['field15']){echo '<tr><td colspan="2">Reforma Energética: Una cuenta pendiente para México</td></tr>';}
if($_POST['field16']){echo '<tr><td colspan="2">Reforma Laboral ¿Cómo mejorar la competitividad?</td></tr>';}
if($_POST['field17']){echo '<tr><td colspan="2">México más joven que nunca: el boom demográfico de la juventud</td></tr>';}
if($_POST['field18']){echo '<tr><td colspan="2">Economía Global: los desafíos para México</td></tr>';}
if($_POST['field19']){echo '<tr><td colspan="2">Educación, Ciencia e Innovación: Ejes claves del capital Humano</td></tr>';}
if($_POST['field20']){echo '<tr><td colspan="2">El Imperio de las TIC y la necesidad de su acceso universal</td></tr>';}
if($_POST['field21']){echo '<tr><td colspan="2">Nuevos Modelos sociales: Como combatir la delincuencia y la inseguridad en México</td></tr>';}
if($_POST['field22']){echo '<tr><td colspan="2">El Emponderamiento de la Mujer: Claves del desarrollo</td></tr>';}
if($_POST['field23']){echo '<tr><td colspan="2">Cambio Climático y Desarrollo sostenible: México responsable</td></tr>';}
?>
<label class="lblcheckins" for="field14"><input type="checkbox" name="field14" id="field14" />El Turismo como Política de Desarrollo sustentable para México.</label>
<label class="lblcheckins" for="field15"><input type="checkbox" name="field15" id="field15" />Reforma Energética: Una cuenta pendiente para México.</label>
<label class="lblcheckins" for="field16"><input type="checkbox" name="field16" id="field16" />Reforma Laboral ¿Cómo mejorar la competitividad?.</label>
<label class="lblcheckins" for="field17"><input type="checkbox" name="field17" id="field17" />México más joven que nunca: el boom demográfico de la juventud.</label>
<label class="lblcheckins" for="field18"><input type="checkbox" name="field18" id="field18" />Economía Global: los desafíos para México.</label>
<label class="lblcheckins" for="field19"><input type="checkbox" name="field19" id="field19" />Educación, Ciencia e Innovación: Ejes claves del capital Human.o</label>
<label class="lblcheckins" for="field10"><input type="checkbox" name="field20" id="field20" />El Imperio de las TIC y la necesidad de su acceso universal.</label>
<label class="lblcheckins" for="field21"><input type="checkbox" name="field21" id="field21" />Nuevos Modelos sociales: Como combatir la delincuencia y la inseguridad en México.</label>
<label class="lblcheckins" for="field22"><input type="checkbox" name="field22" id="field22" />El Emponderamiento de la Mujer: Claves del desarrollo.</label>
<label class="lblcheckins" for="field23"><input type="checkbox" name="field23" id="field23" />Cambio Climático y Desarrollo sostenible: México responsable.</label>