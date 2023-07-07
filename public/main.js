$(document).ready(function() {
  $("#create-form").on('submit', (e) => {
    e.preventDefault();

    var payload = mapFormData(e.target);
    createTask(payload.text, (err, data) => {
      fetch();
    });
  });

  function createItem(text) {
    $('#tasks').append(`
      <li>${text}</li>
    `);
  }

  function fetch() {
    fetchTasks((err, data) => {
      if(err) throw new Error("Exception");
  
      data.forEach(it => {
        createItem(it.text);
      });
    });
  }
});