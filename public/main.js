$(document).ready(function() {
  function createItem(text) {
    $('#tasks').append(`
      <li>${text}</li>
    `);
  }

  function refetchTasks(fn) {
    $.getJSON('/api/tasks', function(response) {
      fn(null, response);
    })
      .fail(function(jqXHR, textStatus, error) {
        fn(error, null);
      });    
  }

  refetchTasks((err, data) => {
    if(err) throw new Error("Exception");

    data.items.forEach(it => {
      // createItem(it);
    });
  });
});