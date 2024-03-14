const loginForm = document.getElementById("login");

loginForm.addEventListener("click", function (event) {
  event.preventDefault();

  const usernameOrEmail = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  const isEmail = usernameOrEmail.includes("@");

  if (usernameOrEmail.trim() === "" || password.trim() === "") {
    alert("Username/Email and Password are required!");
    return;
  }

  const formData = new FormData();

  if (isEmail) {
    formData.append("email", usernameOrEmail);
  } else {
    formData.append("username", usernameOrEmail);
  }

  formData.append("password", password);

  fetch("http://localhost/todo-list-backend/back-end/login.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.message === "logged in") {
        alert("Login successful!");
      } else {
        alert("Login failed. Please check your credentials.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred. Please try again later.");
    });
});
