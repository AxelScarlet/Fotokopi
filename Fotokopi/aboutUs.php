<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-gradient bg-warning">

    <?php include('partials/navbar.php');?>

    <br><br><br><br><br>

    <div class="container mt-3">
        <div class="mt-4 p-5 bg-light text-bg-light rounded">
            <h1>
                <img src="pic/Logo.png" alt="Company Logo" width="200px">
                About us
            </h1>
            <button type="button" class="btn btn-dark float-end" data-bs-toggle="collapse" data-bs-target="#moreInfo1">More Info</button>
            <br><br>
            <div id="moreInfo1" class="collapse">
                <h6>Luq's Chicken Kitchen is a family-owned company dedicated to providing high-quality, affordable chicken dishes. With fresh ingredients and unforgettable flavors, we create a welcoming atmosphere where families and friends can enjoy delicious meals together.</h6>
            </div>
        </div>
    </div>
    <br>

    <div class="container rounded">
        <div class="table-responsive rounded">
            <table class="table table-striped rounded">
                <thead class="table-dark rounded text-justify">
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Role Description</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Social Media</th>
                    </tr>
                </thead>
                <tbody class="table-light rounded">
                    <tr class= "align-middle">
                        <td><img src="pic/about_us/almas.jpg" alt="Almas Farid" class="rounded" width="150px" ></td>
                        <td>Almas Farid bin Mohamad Farid</td>
                        <td>Owner and Project Manager</td>
                        <td>The project manager is in charge of creating the blueprint for the project, outlining objectives, allocating resources, setting out communication strategies, and showing tests and preservation. They are in charge of ensuring constant testing, evaluation, and fixing at all stages of accomplishment, as well as tracking goals, outputs, and change requests. Have strong leadership qualities and the capacity to manage a team successfully.</td>
                        <td>0164105211</td>
                        <td>almasfrd7gmail.com</td>
                        <td>
                            <a href="https://www.instagram.com/anassh127/"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </td>
                    </tr>
                    <tr class = "align-middle">
                        <td><img src="pic/about_us/haziq.jpg" alt="Haziq Faruqi" class="rounded" width="150px"></td>
                        <td>Muhammad Haziq Faruqi bin Nazali</td>
                        <td>Designer</td>
                        <td>Responsible for the visual aesthetics, user experience, and overall design of the website. The designer combines their creativity, artistic skills, and understanding of user interface (UI) and user experience (UX) principles to create an engaging and visually appealing website.</td>
                        <td>01114398006</td>
                        <td>haziqfaruqi@gmail.com</td>
                        <td >
                            <a href="https://www.instagram.com/haziqfaruqi/"><i class="fa fa-instagram "></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td><img src="pic/about_us/aziem.jpg" alt="Aziem Danish" class = "rounded" width="150px"></td>
                        <td>Muhammad Aziem Danish bin Muhammad Mauluddin</td>
                        <td>Researcher</td>
                        <td>The role of a Researcher is to gather relevant information and insights to inform various aspects of the website development project. As a Researcher, the individual is responsible for conducting in-depth investigations and analysis to support decision-making and ensure the project's success. </td>
                        <td>0188728906</td>
                        <td>aziemnsh@gmail.com</td>
                        <td>
                            <a href="https://www.instagram.com/aziemdnish/"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td><img src="pic/about_us/danial.jpg" alt="Danial Fitri"class ="rounded" width="150px"></td>
                        <td>Mohamad Danial Fitri bin Mohamad Fared</td>
                        <td>Assistant Marketer</td>
                        <td>The Assistant Marketer plays a supporting role in the marketing efforts of the website development project. While not taking on the full responsibilities of a professional marketer, the Assistant Marketer assists in various marketing tasks to promote the website effectively. </td>
                        <td>01114261720</td>
                        <td>danial@gmail.com</td>
                        <td>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br><br>
</body>
<?php include('partials/footer.php');?>
