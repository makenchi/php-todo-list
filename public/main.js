$(document).ready(function() {
  const manager = TaskManager();

  $("#create-form").on('submit', (e) => {
    e.preventDefault();

    var payload = mapFormData(e.target);
    createTask(payload.text, (err, data) => {
      manager.append(data.id, data.text);
    });
  });

  $('.remove-task').on('click', function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    removeTask(id, (err, res) => {
      manager.remove(id);
    })
  });
});