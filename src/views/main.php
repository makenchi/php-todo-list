<?php
  $tasks = fetch('tasks', 'todo@TodoController');
?>

<html>
  <head>
    <link rel="stylesheet" href="/public/main.css?v=5" />
  </head>
  <body>
    <main class="todo">
      <div class="container">
        <h1 class="todo__title">Tasker.</h1>
        
        <ul class="todo__tasks" id="tasks">
          <?php foreach($tasks as $task) { ?>
            <li data-id="<?=$task['id']?>">
              <input type="checkbox" class="checkbox" id="checkbox-<?=$task['id']?>" <?=($task['completed'] == 0 ? '' : 'checked') ?> data-id="<?=$task['id']?>" />
              <label for="checkbox-<?=$task['id']?>"><?=$task['text']?></label>
              <div>
                <span title="Edit Task" class="icon edit-task" data-id="<?=$task['id']?>">
                  <img src="/public/assets/edit.svg" alt="Edit Task" />
                </span>
                <span title="Remove Task" class="icon remove-task" data-id="<?=$task['id']?>">
                  <img src="/public/assets/delete.svg" alt="Remove Task" />
                </span>
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" defer></script>
    <script src="/public/task-manager.js?v=5" defer></script>
    <script src="/public/requests.js?v=5" defer></script>
    <script src="/public/main.js?v=5" defer></script>
  </body>
</html>