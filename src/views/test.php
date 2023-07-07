<html>
  <head>
    <link rel="stylesheet" href="/public/main.css" />
  </head>
  <body>
    <main class="todo">
      <div class="container">
        <h1 class="todo__title"><?=text('DAMN.')?></h1>
        
        <ul class="todo__tasks" id="tasks">
          <li class="change-from">
            <input type="checkbox" class="checkbox" id="checkbox" />
            <label for="checkbox">Open the door, leave me with arms exposed, oh. Outside, I saw where I belong</label>
            <div>
              Edit | Remove
            </div>
          </li>

          <li class="change-from">
            <input type="checkbox" class="checkbox" id="checkbox-1" />
            <label for="checkbox-1">Open the door, leave me with arms exposed, oh. Outside, I saw where I belong</label>
            <div>
              Edit | Remove
            </div>
          </li>
        </ul>
      </div>
    </main>
    <aside class="create-item">
      <form class="create-item__form">
        <h2 class="create-item__subtitle">Escreva qualquer merda de 255 characteres</h2>

        <textarea>As melhores xoxotas estão sempre juntas com as mulheres mais dificeis</textarea>

        <button type="submit" class="create-item__create-btn">
          Criar tarefa
        </button>
      </form>
    </aside>

      
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="/public/main.js" defer></script>
  </body>
</html>