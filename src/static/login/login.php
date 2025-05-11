<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> - Login - </title>
  <link rel="stylesheet" href="" />
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
  }
  
  body {
    background: url('./assets/images/BackgroundLogin.jpg') no-repeat center center fixed;
    background-size: cover;
    backdrop-filter: blur(8px);
    position: relative;
    overflow: hidden;
  }
  
  .header {
    background-color: #6a92f9;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
    font-size: 18px;
  }

  .title {
    font-size: 24px;
    font-weight: bolder;
  }
  
  .login-container {
    display: flex;
    justify-content: start;
    margin-left: 10vw;
    align-items: center;
    height: calc(100vh - 60px);
  }
  
  .login-box {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 400px;
    text-align: center;
  }
  
  .logo {
    color: #6a92f9;
    font-size: 36px;
    margin-bottom: 20px;
    margin-top: 30px;
  }
  
  input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
  }
  
  button {
    padding: 10px;
    background-color: #6a92f9;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  button:hover {
    background-color: #4c76d9;
  }
  
  a {
    font-size: 12px;
    color: gray;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  .help-button {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background-color: #6a92f9;
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 18px;
    width: 40px;
    height: 40px;
    cursor: pointer;
  }
  
  </style>
</head>
<body>
  <div class="header">
    <span class="title">Ridepo</span>
    <span class="tagline">Movilidad eficiente al alcance de tus manos</span>
  </div>

  <div class="login-container">
    <div>
        <form id="loginform" class="login-box">
          <img src="./assets/images/logo.png" alt="Ridepo" class="logo">
          <input type="text" name="user" placeholder="User" />
          <input type="password" name="password" placeholder="Password" />
          <button type="submit">Login</button>
          <a href="#">¿Forgot your password?</a>
        </form>
    </div>
  </div>
  <button class="help-button">?</button>
</body>
<script>
  const loginform = document.getElementById('loginform');
  loginform.addEventListener('submit', (e) => {
    e.preventDefault();
    const user = loginform.user.value;
    const password = loginform.password.value;

    // const xhr = new XMLHttpRequest();
    // xhr.open("POST", "/login", true);
    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
            
    //     }
    // };
    // xhr.send("user=" + encodeURIComponent(user) + "&password=" + encodeURIComponent(password));

  fetch('/login', {
  method: 'POST',
  body: new URLSearchParams({ user: user, password: password }),
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  }
  })
  .then(response => response.text())
  .then(data => {
    console.log("Respuesta del servidor:", data);
  })
  .catch(err => console.error("Error en la petición:", err));
  });
  
</script>
</html>
