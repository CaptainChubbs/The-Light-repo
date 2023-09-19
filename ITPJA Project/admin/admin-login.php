<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Login Page Title-->
    <title>Abahlengi Admin</title>

    <!--Importing Bootstrap and Linking CSS Styling-->
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Importing google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">

</head>
<!--Body Begins-->
<body>



    <!--Green Line Separating Navbar with Body Content-->
    <hr class=" border-3 opacity-100" style="color: #798A70; margin: 0;">

    <!--Nurse Portal Login Page Begins-->
    <section id="nurse-login">
        <div class="container-fluid d-flex align-items-center justify-content-center" style="padding: 50px 0">

            <!--Form Begins-->
            <form action="" method="post">
            <h1 class="h1 text-center"style="color: #798A70; margin: auto; padding-bottom:10px">Admin Portal</h1>
            <p class="text-center" style="padding-bottom: 30px;">Login to the Admin Portal</p>


            <!--Use this section to integrate the Microsoft account sign-in-->
            <div class="container-fluid">

            </div>


            <!--Email Address Entry-->
            <div class="mb-3">
                <label for="email-login" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="email-login">
              </div>
              <!--Password Entry-->
              <div class="mb-3">
                <label for="password-login" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password-login">
              </div>
              <!--Submit Button-->
              <div class="text-center" style="padding-bottom: 20px;">
                <button class="btn" type="submit">Login</button>
              </div>

            </form>
        </section>

</section>

    <!--Bootstrap Scripting-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>