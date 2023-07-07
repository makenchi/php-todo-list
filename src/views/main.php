<?php
  fetch('TodoController:get', 'tasks')
?>

<html>
  <head></head>
  <body>
    <ul>
      <?=forEach('tasks')?>
        <li><?=item('text')?></li>
      <?=endForEach('tasks')?>
  </body>
</html>