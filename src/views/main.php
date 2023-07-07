<?php
  extract(fetch('tasks', 'todo@TodoController'));
?>

<html>
  <head>
    <link rel="stylesheet" href="/public/main.css" />
  </head>
  <body>
    <main class="todo">
      <div class="container">
        <h1 class="todo__title">Tasker.</h1>
        
        <ul class="todo__tasks" id="tasks">

        <?php foreach($tasks as $task) { ?>
          <li>
            <input type="checkbox" class="checkbox" id="checkbox" <?=($task['completed'] == 0 ? '' : 'checked') ?> />
            <label for="checkbox"><?=$task['text']?></label>
            <div>
              Editar | Remover
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </main>
    <aside class="create-item">
      <form class="create-item__form" id="create-form">
        <h2 class="create-item__subtitle">Escreva qualquer texto de 255 caracteres</h2>

        <textarea name="text">j'eu suis sa mosokona. ruchet de bous sobleu, que se apusizi lepou zi ne</textarea>

        <button type="submit" class="create-item__create-btn">
          Criar tarefa
        </button>
      </form>
    </aside>

      
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="/public/main.js?v=2" defer></script>
    <script src="/public/requests.js" defer></script>
  </body>
</html>