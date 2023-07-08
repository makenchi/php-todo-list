const TASK_TEMPLATE = ({
  id,
  completed,
  text,
}) => `
  <li data-id="${id}">
    <input type="checkbox" class="checkbox" id="checkbox-${id}" ${completed ? 'checked' : ''} data-id="${id}" />
    <label for="checkbox-${id}">${text}</label>
    <div>
      <span title="Edit Task" class="icon edit-task" data-id="${id}">
        <img src="/public/assets/edit.svg" alt="Edit Task" />
      </span>
      <span title="Remove Task" class="icon remove-task" data-id="${id}">
        <img src="/public/assets/delete.svg" alt="Remove Task" />
      </span>
    </div>
  </li>
`;


function TaskManager(root = '#tasks') {
  const rootContainer = $(root);
  let instances = new Map();

  function hydrate() {
    $(rootContainer).children().each(function(_, v) {
      const id = $(this).data('id');
      instances.set(id, v);
    });
  }

  function append(id, text) {
    const template = TASK_TEMPLATE({ id, text, completed: 0 });

    const el = $(rootContainer).append(template);
    instances.set(id, el);
  }

  function update(id, {
    text,
    completed,
  }) {

  }

  function remove(id) {
    const item = instances.get(id);
    if(item) $(item).remove();
  }

  hydrate();
  
  return {
    append,
    update,
    remove,
  }
}