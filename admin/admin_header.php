<!DOCTYPE html>
<html lang="en">
  <head>
    <title>medibook</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .input-icon i {
            margin-right: 10px;
            line-height: 1.5;
        }
        h2 {
            padding: 20px;
        }

        .admin-form{
            width: 500px
        }

        .admin-form>form>div{
            padding: 10px;
        }

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
        <?php  if(!isset($_SESSION['admin-username'])) { ?>
        .navbar {
            position: absolute;
            width: 100%;
        }

        <?php } ?>
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
            <?php  if(isset($_SESSION['admin-username'])) { ?>
            <li class="link <?php echo (empty($path)) ? 'active': "" ?>" data-url = "Appointments">Appointments</li>
            <li class="link <?php echo ($path === "doctor") ? 'active': "" ?>" data-url="doctor">Doctor</li>
            <li class="link <?php echo ($path === "logout") ? 'active': "" ?>" data-url="logout">Logout</li>
            <?php } ?>
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