<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #dee7f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        .about-us {
            text-align: center;
            padding: 50px 0;
        }

        .about-us h2 {
            color: #2763db;
            font-size: 60px;
            margin-bottom: 20px;
        }

        .about-us .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .about-us .text {
            flex: 1;
            padding-right: 40px;
            text-align: left;
        }

        .about-us .text h1 {
            color: #303133;
            font-size: 35px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .about-us .text p {
            color: #5c6368;
            font-size: 16px;
            line-height: 1.6;
        }

        .about-us .image {
            flex: 1;
        }

        .about-us .image img {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <section class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <br><br>
            <div class="content">
                <div class="text">
                    <h1>We Take Care Of Your Healthy Life</h1>
                    <br>
                    <p>
                        The University Health Service was organized to help the students and staff of the university 
                        to lead an active life free from disease. Initially, all registered university students were 
                        entitled to free consultations and laboratory services, and the service was set up solely for 
                        the benefit of the student body. It was believed that timely treatment and care of even mild 
                        ailments could prevent the occurrence of more serious diseases, minimize the rate of absenteeism 
                        from classes, and control the spread of infection to others.
                    </p>
                </div>
                <div class="image">
                    <img src="../assets/images/medical-team.jpg" alt="Medical Staff">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
