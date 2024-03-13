const userName = document.getElementById("username");
const password = document.getElementById("password");

const logIn = document.getElementById("login")

logIn.addEventListener("click", function () {
    if (userName.value == "AdminSEF123" && password.value == "SeF@ctORy$$456") {
        window.location.href = "index.html";
    }
    else {
        alert("Incorrect Username or Password")
    }
})