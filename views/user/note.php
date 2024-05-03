<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../assets/css/user/data.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Responsive Registration Form </title>
</head>
<body>
    <div class="container">
        <header>Registration</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" placeholder="Permanent or Temporary" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" placeholder="Enter nationality" required>
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input type="text" placeholder="Enter your state" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form third">
                <div class="details additional">
                    <span class="title">Additional Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Additional Field 1</label>
                            <input type="text" placeholder="Enter additional field 1" required>
                        </div>
                        <div class="input-field">
                            <label>Additional Field 2</label>
                            <input type="text" placeholder="Enter additional field 2" required>
                        </div>
                        <div class="input-field">
                            <label>Additional Field 3</label>
                            <input type="text" placeholder="Enter additional field 3" required>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="../../assets/js/data.js"></script>
</body>
</html>
