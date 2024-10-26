<!DOCTYPE html>
<html lang="en">
  <head>
    <title>medibook</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .uoj-logo {
            height: 100px;
            padding-left: 20px;
        }
        .nav-links {
            float: left;
            list-style: none;
            margin-right: 50px;

        }
        .nav-links .link {
            display: inline-block;
            margin: 20px;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
        }

        .nav-links .link.active {
            color: #0d6efd;
            font-weight: bold;
        }
        <?php 
            if(isset($_GET['path'])) {
                $path = $_GET['path'];
            }
        
        ?>
    </style>
    <header>
        <nav class="navbar navbar-light bg-light justify-content-between">
        <img class="card-img-left uoj-logo" src="../assets/images/uoj_logo.png" alt="log image uoj">
        <ul class="nav-links">
            <li class="link <?php echo (empty($path)) ? 'active': "" ?>" data-url = "home">Home</li>
            <li class="link <?php echo ($path === "about") ? 'active': "" ?>" data-url="about">About</li>
            <li class="link <?php echo ($path === "staff") ? 'active': "" ?>" data-url="staff">Staff</li>
            <li class="link <?php echo ($path === "login") ? 'active': "" ?>" data-url="login">Sign In</li>
            <li class="link <?php echo ($path === "signup") ? 'active': "" ?>" data-url="signup">Singn Up</li>
        </ul>
        </nav>  
    </header>

    <script>
        const links =document.querySelectorAll(".link");
        links.forEach(element => {
            element.addEventListener('click', (e)=> {
                const path =element.getAttribute('data-url');
                window.location.href = '?path='+ path;
            })
        });

    </script>
