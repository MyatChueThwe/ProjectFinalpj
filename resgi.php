<?php

include "./nav.php";

?>

    <!-- navbar end -->
    <section class="login-section">
        <div class="login-container">
            <!-- Image Section (Left side on larger screens, top on smaller screens) -->
            <div class="image-section">
                <img src="./registration form pg.jpg" alt="" width="100%" height="100%">
            </div>
    
            <!-- Form Section (Right side on larger screens, bottom on smaller screens) -->
            <div class="form-section">
                <h2 class="text-3xl font-bold mb-6 text-center ">Booking Form</h2>
                
    
                <form>
                    <div class="mb-2">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="your name ......">
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" placeholder="your email .....">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" placeholder="your password _">
                    </div>
                    
                    <div class="mb-2">
                        <label for="password" class="form-label">Phone No :</label>
                        <input type="password" class="form-control" id="phone" placeholder="your ph-num..">
                    </div>
                    <div class="mb-6">
                        <label class="form-label d-block">Choose Courses :</label>
                        <div class="row">
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="course1">
                                    <label class="form-check-label" for="course1">
                                        Course 1
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="course3">
                                    <label class="form-check-label" for="course3">
                                        Course 3
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="course5">
                                    <label class="form-check-label" for="course5">
                                        Course 5
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="course2">
                                    <label class="form-check-label" for="course2">
                                        Course 2
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="course4">
                                    <label class="form-check-label" for="course4">
                                        Course 4
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


<?php

include "./footer.php";

?>
