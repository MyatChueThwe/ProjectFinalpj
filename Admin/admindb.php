<?php

include "./Navbar.php";

?>

        <div class="col-lg-10">
            
                <div class="row mx-2 gap-4 text-center">

                    <div class="col-lg-2 border border-secondary card p-2 m-3 ">
                        <i class="bi bi-people-fill fs-3 text-center"></i>
                        <h6 class="text-secondary fw-bold fs-4">10</h6>
                        <h5>Total Students</h5>  
                         
                    </div>
                    <div class="col-lg-2 border border-secondary card p-2 m-3">
                        <i class="bi bi-card-checklist fs-3 text-center"></i>
                        <h6 class="text-secondary fs-4">5</h6>
                        <h5>Course</h5>
                      </div>
                    <div class="col-lg-2 border border-secondary card p-2 m-3">
                        <i class="bi bi-person-check-fill fs-3 text-center"></i>
                        <h6 class="text-secondary fs-4">20</h6>
                        <h5>Login List</h5>
                        
                    </div>
                    <div class="col-lg-2 border border-secondary card p-2 m-3">
                        <i class="bi bi-ui-checks fs-3 text-center"></i>
                        <h6 class="text-secondary fs-4">10</h6>
                        <h5>Registration list</h5>
                        
                    </div>

                    <!-- table section -->
                    <div class="custom-table">
                      <table class="table mb-0 table-hover table-bordered">
                          <thead>
                              <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Student ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Course Fees</th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>1</td>
                                  <td>Nils</td>
                                  <td>100000</td>
                                  <td><button class="btn btn-success">Accept</button></td>
                                  <td><button class="btn btn-danger">Delete</button></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>2</td>
                                  <td>Jason</td>
                                  <td>250000</td>
                                  <td><button class="btn btn-success">Accept</button></td>
                                  <td><button class="btn btn-danger">Delete</button></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>

                  
              </div>
           
        </div>

    </div>

        
    

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>