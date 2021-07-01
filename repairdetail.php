<title>Repair detail</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
    <h3>Ремонт</h3>
<body>
<?php
$id = intval($_GET['G']);
$x = new mysqli('localhost', 'root', '', 'r_w');
$result = $x->query("SELECT * FROM repair");
$r = $result->fetch_assoc();
echo"<div class='card-group'>
  <div class='card' style='max-width: 14rem;'>
      <div class='card-header'>
        Результат
      </div>
      <ul class='list-group list-group-flush'>
      <li class='list-group-item'>Причина</li>
      <li class='list-group-item'>Стоимость</li>
      <li class='list-group-item'>Начало ремонта</li>
      <li class='list-group-item'>Окончание ремонта</li>
      <li class='list-group-item'>Тип ремонта</li>
      <li class='list-group-item'>Ремонтируемый вагон</li>
      </ul>
    </div>
  <div class='card' style='max-width: 20rem;'>
      <div class='card-header'>
        ".$r['result']."
      </div>
      <ul class='list-group list-group-flush'>
      <li class='list-group-item'>".$r['reason']."</li>
      <li class='list-group-item'>".$r['cost']."</li>
      <li class='list-group-item'>".$r['day_start']."</li>
      <li class='list-group-item'>".$r['day_stop']."</li>
      <li class='list-group-item'>".$r['type_repair']."</li>
      <li class='list-group-item'>".$r['wagon']."</li>
      </ul>
    </div>
</div>";
?>
    <a href="repairlist.php">Вернуться</a>
</body>
</ol>