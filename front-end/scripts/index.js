const btn = document.getElementById("btn");
const container = document.getElementById("container");
const todoInput = document.getElementById("todoInput");

btn.addEventListener("click", function () {
  const element = `<div class="todo-item">
                    <p>${todoInput.value}</p>
                    <button class="delete-btn">Delete</button>
                    <button class="done-btn">Done</button>
                  </div>`;

  container.innerHTML += element;
  todoInput.value = "";

  const deleteBtns = document.querySelectorAll(".delete-btn");
  deleteBtns.forEach(btn => {
    btn.addEventListener("click", function () {
      btn.parentNode.remove();
    });
  });

  const doneBtns = document.querySelectorAll(".done-btn");
  doneBtns.forEach(btn => {
    btn.addEventListener("click", function () {
      const todoItem = btn.parentNode;
      const todoText = todoItem.querySelector("p");
      todoText.textContent += " is Completed";

      btn.disabled = true;
    });
  });
})