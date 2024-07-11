<?php
session_start();

//check if properly signin
$mysqli = require __DIR__ . "/database.php"; 
if(isset($_SESSION["usrId"])){

  $sql = "SELECT * FROM db_login WHERE usr_name = '{$_SESSION['usrId']}'";
  
  $resulta=mysqli_query($mysqli,$sql);

  $row=mysqli_fetch_assoc($resulta);

  $namu=$row['usr_name'];

  //echo($namu);
}

require "loginchecker.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
 
</head>
<body>

  <!-- Modal for add item-->
<div class="modal fade" id="addbutton" tabindex="-1" aria-labelledby="addbuttonLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addbuttonLabel">Add Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_tab.php" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="addN" id="addN" class="form-control" placeholder="Enter User Name"required>
        </div>

         <div class="form-group">
          <label>User ID</label>
          <input type="text" name="usrid" id="usrid" class="form-control" placeholder="Enter User Name" required>
        </div>

        <div class="form-group">
          <label>User Status</label>
          <br>
          <select id="usrsts" name="usrsts" tabindex="1" size="1" style="width: 240px;" required>
          <option id="sts_0" selected value=""></option>
          <option id="sts_1" value="Return">Return</option>
          <option id="sts_2" value="Return-resign">Return-resign</option>
          <option id="sts_3" value="Surrender">Surrender</option>
          <option id="sts_4" value="Replacement">Replacement</option>
        </select>
        </div>

        <div class="form-group">
          <label>Item Name</label>
          <input type="text" name="additm" id="additm" class="form-control" placeholder="Enter Item Name"required>
        </div>

        <div class="form-group">
          <label>Serial Number</label>
          <input type="text" name="addsrnm" id="addsrnm" class="form-control" placeholder="Enter Item Serial"required>
        </div>

        <div class="form-group">
          <label>Comment</label>
          <input type="text" name="addcm" id="addcm" class="form-control" placeholder="Enter Comment">
        </div>

      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="addbtn" id="addbtn" value="Add Data">
        </form>

      </div>
    </div>
  </div>
</div>



<!-- Modal for edit item-->
<div class="modal fade" id="editB" tabindex="-1" aria-labelledby="editBLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="update_tab.php" method="post">

        <!--id for item-->
        <input type="hidden" name="edtid" id="edtid">

      <div class="modal-body">
        <!--for itm to edit id-->
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter User Name">
        </div>

        <div class="form-group">
          <label>User Status</label>
          <input type="text" name="ustat" id="ustat" class="form-control" placeholder="Enter User status">
        </div>

        <div class="form-group">
          <label>Item Name</label>
          <input type="text" name="itname" id="itname" class="form-control" placeholder="Enter Item Name">
        </div>

        <div class="form-group">
          <label>Serial Number</label>
          <input type="text" name="snum" id="snum" class="form-control" placeholder="Enter Item Serial">
        </div>

        <div class="form-group">
          <label>Comment</label>
          <input type="text" name="Cname" id="Cname" class="form-control" placeholder="Enter Comment">
        </div>

      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit"  name="btn_edt" id="btn_edt" class="btn btn-primary" values="Edit Data">
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal for delete item-->
<div class="modal fade" id="deletemod" tabindex="-1" aria-labelledby="deletemodLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletemodLabel">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="dlt_tab.php" method="post">

        <input type="hidden" name="dltid" id="dltid">
      <div class="modal-body">
        
        <h4>Are you sure you want to delete?</h4>


      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <input type="submit" name="btn_dlt" id="btn_dlt" class="btn btn-primary" value="Yes">
        </form>

      </div>
    </div>
  </div>
</div>

<nav>
  <ul>
    <li><a href="" class="">Home</a></li>
    <li><a href="logout.php" class="">Logout</a></li> 
  </ul>
</nav>

<!--for table -->
<div class="container"> 

<div class="">
 
  <div class="table_header" >
    <p><h1>User Table</h1></p>
</div>
<div class="" style="padding: 50px;">
  <div class="">

 <!--modal add button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbutton">
  Add Data</button>
  <br>
  <br>

<!--Table-->   
    <table width='100%' border="0" id="tabledata">
      <thead>
      <tr>
        <th>User Name</th>
        <th>User ID</th>
        <th>User Status</th>
        <th>Item Name</th>
        <th>Serial Number</th>
        <th>Date Created</th>
        <th>Date Update</th>
        <th>Comment</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
      <?php

        $query = "SELECT * FROM user_table";
        $result= mysqli_query($mysqli,$query);
        
        if($result){
          foreach($result as $row){
            $usr_n=$row['user_name'];
            $id_us=$row['id_user'];
            $user_s=$row['user_status'];
            $itemname=$row['item_name'];
            $serialnum=$row['serial_num'];
            $date_c=$row['date_created'];
            $date_u=$row['date_updated'];
            $comm=$row['comment'];


            //
            $table="
                <tbody>
                      <tr>
                        <td>$usr_n</td>
                        <td>$id_us</td>
                        <td>$user_s</td>
                        <td>$itemname</td>
                        <td>$serialnum</td>
                        <td>$date_c</td>
                        <td>$date_u</td>
                        <td>$comm</td>
                        <td><button type='button' class='btn btn-success editbtn'>Edit</button></td>
                        <td><button type='button' class='btn btn-danger deletebtn'>delete</button></td>
                      </tr>
              </tbody>


            ";

            echo($table);
          }
        }
      

    ?>
    </table>
            </div>
          </div>
      </div>
  </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery. dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.min.js"></script>

<script>
  
  //for table pagination
  $(document).ready(function(){
    $('#tabledata').DataTable({
      "pagingType":"full_numbers",
      "lengthMenu":[
        [10,20,50,-1],
        [10,25,50, "All"]
            ],
      responsive: true,
      language:{
        search: "_INPUT_",
        searchPlaceholder:"Search Data",
          }
    });
          
  })


</script>


<script>
//for edit modal buton
  $(document).ready(function(){

    $('.editbtn').on('click',function(){

      $('#editB').modal('show');


      //show data printed for edit
        $tr=$(this).closest('tr');

        var data = $tr.children("td").map(function(){

            return $(this).text();
        }).get();


        console.log(data);

        //[0]array for data printed
        $('#uname').val(data[0]);
        $('#edtid').val(data[1]);//user id/dataid
        $('#ustat').val(data[2]);
        $('#itname').val(data[3]);
        $('#snum').val(data[4]);
        $('#Cname').val(data[7]);




    });

  });
  

</script>


<script>
//for delete modal buton
  $(document).ready(function(){

    $('.deletebtn').on('click',function(){

      $('#deletemod').modal('show');


      //show data printed for edit
        $tr=$(this).closest('tr');

        var data = $tr.children("td").map(function(){

            return $(this).text();
        }).get();


        console.log(data);

        //[0]array for data printed
        $('#dltid').val(data[1]);//user id/dataid


    });

  });
  

</script>


</body>
</html>