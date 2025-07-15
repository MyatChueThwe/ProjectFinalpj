<?php

include "./Navbar.php";

?>



       <!-- admin add section -->
        <div class="col-lg-10">
            
              <div class="row">

                 <h3 class="p-4">User List</h3>

                 <form id="userForm" class="w-50 ms-5 ">
                    <div class="form-group m-3">
                        <label for="name">Name:</label>
                        <input id="name" type="text" class="form-control border-2 border-black p-2" placeholder="name..." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="email">Email:</label>
                        <input id="email" type="text" class="form-control border-2 border-black p-2" placeholder="email..." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="password">Password:</label>
                        <input id="pass" type="password" class="form-control border-2 border-black p-2" placeholder="password...." required>
                    </div>
                    <button type="submit" class="btn btn_add mt-3 px-4">ADD</button>
                </form>

                <!-- admin table section -->
            <div class="custom-table mt-5 ">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="bg_th">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Jong</td>
                            <td>jong25@gmail.com</td>
                            <td>125673</td>
                            <td><button class="btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                            <td>JuJu</td>
                            <td>juju579@gmail.com</td>
                            <td>096654</td>
                            <td><button class="btn">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                
             
        </div>

    </div>

        
    

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>