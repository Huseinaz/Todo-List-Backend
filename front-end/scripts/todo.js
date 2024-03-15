const btn = document.getElementById("btn");
const container = document.getElementById("container");
const todoInput = document.getElementById("todoInput");

function generateHTML(task) {
  
  const element = `<div class="todo-item">
                    <p>${task.description}</p>
                    <button class="delete-btn">Delete</button>
                    <button class="done-btn">Done</button>
                  </div>`;

  container.insertAdjacentHTML("beforeend", element);
  todoInput.value = "";
}

async function createTodo() {
    const todoForm = new FormData();
    todoForm.append("description", todoInput.value);

    const user_id = parseInt(localStorage.getItem("authenticatedUser"));

    todoForm.append("user_id", user_id);

    try {
        const response = await axios.post("http://localhost/todo-list-backend/back-end/create_task.php", todoForm);
        console.log(response);
    } catch (error) {
        
    }
}

btn.addEventListener("click", (event) => {
    event.preventDefault();
    createTodo();
});
