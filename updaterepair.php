<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body>
<ul class="nav nav-pills nav-fill bg-dark">
  <li class="nav-item">
    <a class="nav-link" href="glavnoe_menu_logged.php">Menu</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Вагоны</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="addwagon.php">Add</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="wagonlist.php">List</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Ремонты</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="addrepair.php">Add</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="repairlist.php">List</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Рабочие</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="addworker.php">Add</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="workerlist.php">List</a>
    </div>
  </li>
  <?php
    if(isset($_COOKIE["login"])) {
        echo"<li class='nav-item'>
    <a class='nav-link active' href='logout.php'>Выход</a>
  </li>";
    } else {
    echo"<li class='nav-item'>
    <a class='nav-link active' href='login.php'>Вход</a>
  </li>";
    }
?>
</ul>
<ol>


<?php
    $id = intval($_GET['G']);
    $link = new mysqli('localhost', 'root', '', 'r_w');
    $result = $link->query("SELECT * FROM repair where repair_id={$id}");
    $r = $result->fetch_assoc();
    echo'<form class="forms" method="post">
 <br>
 Результат:<p><input type="text" name="result" value="'.$r['result'].'"></p>
 Причина:<p><input type="text" name="reason" value="'.$r['reason'].'"></p>
 Стоиомость:<p><input type="text" name="cost" value="'.$r['cost'].'"></p>
 Начало ремонта:<p><input type="date" name="rep_start" value="'.$r['day_start'].'"></p>
 Окончание ремонта:<p><input type="date" name="rep_end" value="'.$r['day_stop'].'"></p>
 Вагон:<p><input type="text" name="wagon" value="'.$r['wagon'].'"></p>
 Тип ремонта:<p><input type="text" name="type" value="'.$r['type_repair'].'"></p>
 <p><input type="submit" name="pend" value="Обновить"></p>
</form>';
    if(isset($_POST["pend"])) {
    $result = $_POST["result"];
    $reason = $_POST["reason"];
    $cost = $_POST["cost"];
    $rep_start = $_POST["rep_start"];
    $type = $_POST["type"];
    $rep_end = $_POST["rep_end"];
    $wagon = $_POST["wagon"];
    
	
	$link->query("update repair set result='{$result}', reason='{$reason}', cost='{$cost}', day_start='{$rep_start}', day_stop='{$rep_end}', type_repair='{$type}', wagon='{$wagon}' where repair_id={$id}");
    $link->close();  
    header("Location: repairlist.php");
    }
?>
</ol>
</body>