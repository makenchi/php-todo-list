function fetchTasks(fn) {
  $.getJSON('/api/tasks', function(response) {
    fn(null, response);
  })
    .fail(function(jqXHR, textStatus, error) {
      fn(error, null);
    });
}

function createTask(text, fn) {
  $.ajax({
    url: '/api/tasks',
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({ text }),
    success: function(response) {
      fn(null, response);
    },
    error: function(jqXHR, textStatus, error) {
      fn(error, null)
    }
  });
}

function updateTask(id, newText) {

}

function removeTask(id, fn) {
  if(confirm("Tem certeza que deseja apagar essa tarefa? Essa ação não poderá ser revertida")) {
    $.ajax({
      url: '/api/tasks/'+id,
      type: 'DELETE',
      success: function(response) {
        fn(null, response);
      },
      error: function(xhr, status, error) {
        fn(error, null);
      }
    });
  }
}

function mapFormData(form) {
  const formData = new FormData(form);
  let payload = {};

  for (let pair of formData.entries()) {
    payload[pair[0]] = pair[1];
  }

  return payload;
}