<?php

$conn = mysqli_connect("localhost", "root", "", "hospital");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)

$name    = mysqli_real_escape_string($conn, $_POST['name']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$number    = mysqli_real_escape_string($conn, $_POST['number']);

// We are going to insert the data into our sampleDB table
$sql = "INSERT INTO contact_form VALUES ('$name',
            '$email','$number')";

// Check if the query is successful
if (mysqli_query($conn, $sql)) {
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";

    echo nl2br("\n$name\n $email\n "
        . "$number\n ");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="import" href="footer.html">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header section starts  -->
<!-- 
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>IMSRM</strong></a>

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="index.html#about">about us</a>
            <a href="index.html#courses">courses</a>
            <a href="index.html#faculty">faculty</a>
            <a href="index.html#review">review</a>
            <!-- <a href="index.html#blogs">blogs</a> -->
            <a href="form.html" class="btn"> Enroll Now</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </header> -->

    <!-- header section ends -->
    <section class="appointment" id="appointment">

        <!-- <h1 class="heading"> <span>contact</span> now </h1> -->

        <div class="row" style="margin-top: 10rem;">

            <div class="image">
                <img src="image/appointment-img.svg" alt="">
            </div>


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<p class ="message">' . $message . '</p>';
                    }
                }
                ?>

                <h3 class="heading"><span>Enroll Now</span></h3>
                <div class="form-group fullname">
                    <p class="formtext">Name of Candidate <span>*</span></p>
                    <input type="text" id="fullname" name="name" placeholder="Enter your full name" class="box">
                </div>
                <div class="form-group email">
                    <p class="formtext">Email<span>*</span></p>
                    <input type="text" id="email" name="email" placeholder="Enter your email address" class="box">
                </div>
                <div class="form-group password">
                    <p class="formtext">Mobile No.<span>*</span></p>
                    <input type="number" id="mobileNumber" name="mobileNumber" placeholder="Enter your Mobile Number" class="box">
                </div>
                <!-- <div class="form-group password">
                    <p class="formtext">Aadhar number<span>*</span></p>
                    <input type="number" id="aadharNumber" name="aadharNumber" placeholder="Enter your Aadhar Number" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Age <span>*</span></p>
                    <input type="number" id="age" placeholder="Enter your Age" name="age" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Passing Year of Final Exam <span>*</span></p>
                    <input type="date" id="passingYear" name="passingYear" placeholder="Select Passing Year of Final Exam" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Marks Obtain in Final Exam <span>*</span></p>
                    <input type="number" id="marks" name="marks" placeholder="Enter your Age" class="box">
                </div>
                <div class="form-group gender">
                    <p class="formtext">Last Attended Degree<span>*</span></p>
                    <select id="degree" name="degree" class="box">
                        <option value="" selected disabled>Select your Last Attended Degree</option>
                        <option value="MBBS">MBBS</option>
                        <option value="BHMS">BHMS</option>
                        <option value="BUMS">BUMS</option>
                        <option value="BAMS">BAMS</option>
                    </select>
                </div>
                <div class="form-group gender">
                    <p class="formtext">Application for course<span>*</span></p>
                    <select id="course" name="course" class="box">
                        <option value="" selected disabled>Select course applying for</option>
                        <option value="CCH">CCH</option>
                        <option value="CGO">CGO</option>
                        <option value="CSD">CSD</option>
                        <option value="CVD">CVD</option>
                    </select>
                </div>
                <div class="form-group date">
                    <p class="formtext">Final Year Marksheet <span>*</span></p>
                    <input accept="application/pdf,application/jpg" type="file" id="marksheet" name="marksheet" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Provisional/Permanent Registration <span>*</span></p>
                    <input accept="application/pdf,application/jpg" type="file" id="registration" name="registration" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Passport Size Photo <span>*</span></p>
                    <input accept="application/jpg" type="file" id="photo" name="photo" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Aadhar Card <span>*</span></p>
                    <input accept="application/jpg,application/pdf" type="file" id="aadharCard" name="aadharCard" class="box">
                </div>
                <div class="form-group date">
                    <p class="formtext">Application Fees Recipt <span>*</span></p>
                    <input accept="application/pdf, application/jpg" type="file" id="feesReceipt" name="feesReceipt" class="box">
                </div> -->
                <div class="form-group submit-btn">
                    <input type="submit" name="submit" value="Enroll ">
                </div>
            </form>

        </div>

    </section>



    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Institute of Medical Science And Research, Mumbai</h3>
                <a> <i class="fas fa-map-marker-alt"></i>Regional Center: 3rd Floor, Rahat Hospital Campus, Near Center
                    Naka, Opp. MGM School , Main Road New Baijipura, 431001.</a>
                <a><i class="fas fa-map-marker-alt"></i>Regi. Off. : 303, 3rd Floor, Parth Solitaire, Kalamboli, Sector
                    9E Navi Mumbai -410218(MH). </a>
            </div>

            <div class="box">
                <h3>Certificate Courses</h3>
                <a href="CertificateCourses/CSVD.html"> <i class="fas fa-chevron-right"></i> Skin And Venereal Disease
                    (CSVD) </a>
                <a href="CertificateCourses/ChildHealth.html"> <i class="fas fa-chevron-right"></i> Child Health </a>
                <a href="CertificateCourses/CGO.html"> <i class="fas fa-chevron-right"></i> Gynecology And Obstetrics
                    (CGO) </a>
                <!-- <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a> -->
            </div>

            <div class="box">
                <h3>Contact info</h3>
                <a> <i class="fas fa-phone"></i> 0240-2300200 </a>
                <a> <i class="fas fa-phone"></i> +91 9595950180 </a>
                <a> <i class="fas fa-envelope"></i> adagfgas@gmail.com </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a> <i class="fab fa-twitter"></i> twitter </a>
                <a> <i class="fab fa-instagram"></i> instagram </a>
                <a> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>

        <div class="credit"> created by <span>Rajesh</span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->

    <script src="js/script.js"></script>

    <!-- <script>
        // form validation start

        // Selecting form and input elements
        const form = document.querySelector("form");
        // const passwordInput = document.getElementById("password");
        // const passToggleBtn = document.getElementById("pass-toggle-btn");

        // Function to display error messages
        const showError = (field, errorText) => {
            field.classList.add("error");
            const errorElement = document.createElement("small");
            errorElement.classList.add("error-text");
            errorElement.innerText = errorText;
            field.closest(".form-group").appendChild(errorElement);
        }

        // Function to handle form submission
        const handleFormData = (e) => {
            e.preventDefault();

            // Retrieving input elements
            const fullnameInput = document.getElementById("fullname");
            const emailInput = document.getElementById("email");
            const mobileNumberInput = document.getElementById("mobileNumber");
            const aadharNumberInput = document.getElementById("aadharNumber");
            const ageInput = document.getElementById("age");
            const passingYearInput = document.getElementById("passingYear");
            const marksInput = document.getElementById("marks");
            const degreeInput = document.getElementById("degree");
            const courseInput = document.getElementById("course");
            const marksheetInput = document.getElementById("marksheet");
            const registrationInput = document.getElementById("registration");
            const photoInput = document.getElementById("photo");
            const aadharCardInput = document.getElementById("aadharCard");
            const feesReceiptInput = document.getElementById("feesReceipt");

            // Getting trimmed values from input fields
            const fullname = fullnameInput.value.trim();
            const email = emailInput.value.trim();
            const mobileNumber = mobileNumberInput.value.trim();
            const aadharNumber = aadharNumberInput.value;
            const age = ageInput.value;
            const passingYear = passingYearInput.value;
            const marks = marksInput.value;
            const degree = degreeInput.value;
            const course = courseInput.value;
            const marksheet = marksheetInput.value;
            const registration = registrationInput.value;
            const photo = photoInput.value;
            const aadharCard = aadharCardInput.value;
            const feesReceipt = feesReceiptInput.value;

            // Regular expression pattern for email validation
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            // Clearing previous error messages
            document.querySelectorAll(".form-group .error").forEach(field => field.classList.remove("error"));
            document.querySelectorAll(".error-text").forEach(errorText => errorText.remove());

            // Performing validation checks
            if (fullname === "") {
                showError(fullnameInput, "Enter your full name");
            }
            if (!emailPattern.test(email)) {
                showError(emailInput, "Enter a valid email address");
            }
            if (mobileNumber === "") {
                showError(mobileNumberInput, "Enter your Mobile Number");
            }
            if (age === "") {
                showError(ageInput, "Enter your Age");
            }
            if (passingYear === "") {
                showError(passingYearInput, "Enter your passing Year");
            }
            if (marks === "") {
                showError(marksInput, "Enter your marks");
            }
            if (degree === "") {
                showError(degreeInput, "select last attended degree");
            }
            if (course === "") {
                showError(courseInput, "select course want to apply");
            }
            if (marksheet === "") {
                showError(marksheetInput, "Upload Marksheet");
            }
            if (registration === "") {
                showError(registrationInput, "Upload registration file");
            }
            if (photo === "") {
                showError(photoInput, "Upload photo");
            }
            if (aadharCard === "") {
                showError(aadharCardInput, "Upload Aadhar Card");
            }
            if (feesReceipt === "") {
                showError(feesReceiptInput, "Upload fees Receipt");
            }
            if (aadharNumber === "") {
                showError(aadharNumberInput, "Enter aadhar Number");
            }

            // Checking for any remaining errors before form submission
            const errorInputs = document.querySelectorAll(".form-group .error");
            if (errorInputs.length > 0) return;

            // Submitting the form
            form.submit();
        }

        // Handling form submission event
        form.addEventListener("submit", handleFormData);

        // form validation end
    </script> -->
</body>

</html>