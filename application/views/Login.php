<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Production System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f9f9f9;
      background-image: radial-gradient(#d3d3d3 1px, transparent 1px);
      background-size: 20px 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-box {
      display: flex;
      width: 100%;
      max-width: 1000px;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .login-form {
      flex: 1;
      padding: 50px;
    }

    .login-form h3 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .login-form p {
      color: #666;
      font-size: 14px;
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 40px 12px 40px;
      font-size: 15px;
    }

    .form-group {
      position: relative;
    }

    .form-group .fa {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #888;
    }

    .form-group .toggle-password {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
    }

    .btn-login {
      width: 100%;
      border-radius: 8px;
      padding: 12px;
      font-weight: bold;
      background: linear-gradient(45deg, #007bff, #0056d2);
      border: none;
      color: #fff;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: linear-gradient(45deg, #0056d2, #007bff);
      transform: scale(1.02);
    }

    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-logo img {
      width: 70px;
      margin-bottom: 10px;
    }

    /* Banner slideshow */
    .login-banner {
      flex: 1.3;
      position: relative;
      overflow: hidden;
    }

    .login-banner img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .login-banner img.active {
      opacity: 1;
    }

    @media (max-width: 992px) {
      .login-box {
        flex-direction: column;
      }

      .login-banner {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <!-- LEFT SIDE FORM -->
      <div class="login-form">
        <div class="login-logo">
          <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="Logo">
          <h4>Production System</h4>
        </div>
        <h3>Login</h3>
        <p>Enter your username and password</p>
        <form action="<?= site_url('login/'); ?>" method="post">
          <div class="form-group">
            <i class="fa fa-user"></i>
            <input type="text" class="form-control" name="username" placeholder="Enter username" autofocus>
          </div>
          <div class="form-group">
            <input id="password-field" type="password" class="form-control" name="password" placeholder="Enter password">
            <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
          </div>
          <button type="submit" class="btn btn-login">Login</button>
        </form>
      </div>

      <!-- RIGHT SIDE SLIDESHOW (2 gambar) -->
      <div class="login-banner">
        <img src="https://www.inchcape.com/~/media/images/i/inchcape/corp/templates/news/content/year-2024/ocean-road-at-night1-1440x700.jpg" class="active">
        <img src="https://assets.pikiran-rakyat.com/crop/116x41:1124x636/720x0/webp/photo/2023/04/27/1991537516.jpeg">
      </div>
    </div>
  </div>

  <script>
    // Slideshow (2 gambar)
    let slides = document.querySelectorAll('.login-banner img');
    let index = 0;
    setInterval(() => {
      slides[index].classList.remove('active');
      index = (index + 1) % slides.length;
      slides[index].classList.add('active');
    }, 4000);

    // Show/Hide password
    function togglePassword() {
      let passwordField = document.getElementById("password-field");
      let toggleIcon = document.querySelector(".toggle-password");
      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>
</body>

</html>
