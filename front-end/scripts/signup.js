const signupForm = document.getElementById("signup");

signupForm.addEventListener("click", function (event) {
  event.preventDefault();

  const username = document.getElementById("username").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (username.trim() === "" || email.trim() === "" || password.trim() === "") {
    alert("Username, Email, and Password are required!");
    return;
  }

  const formData = new FormData();
  formData.append("username", username);
  formData.append("email", email);
  formData.append("password", password);

  fetch("http://localhost/todo-list-backend/back-end/create_user.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.message === "user created") {
        localStorage.setItem("username", username);
        window.location.href = `http://127.0.0.1:5500/front-end/pages/todo.html?username=${encodeURIComponent(username)}`;
      } else if (data.message === "user allready exist") {
        alert("Username or email already exists. Please choose another.");
      } else {
        alert("Failed to create account. Please try again.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred. Please try again later.");
    });
});
