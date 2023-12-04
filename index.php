


<?php
  //initializing database details
  function connectionDB() {

        global $conn;
        $host = '127.0.0.1:4306';
        $user = 'root';
        $password = '';
        $dbname = 'crud_one_page_concept';
        $conn = mysqli_connect($host, $user, $password, $dbname);
        if(!$conn){
            die("Connection failed: " .mysqli_connecet_error());
        }

  }
  //execute database connection
  connectionDB();

 // close db connection
  function dbClose() {
    global $conn;
    mysqli_close($conn);
  
  }

  //get parameter from url
  function getParam($name) {
    if( isset($_REQUEST[$name]) ) {
        $name = $_REQUEST[$name];
        return $name;
    } else {
       $name = '';
    }

 }



 function form(){ // fuction form
		global $conn;
		$id = getParam('id'); // get id from url parameter

        if($id){
            $showData = "SELECT * FROM employee where id=$id"; // basic sql select operation
            $result = mysqli_query($conn, $showData);
            $result = mysqli_fetch_array($result);
        }
		
		if($id) { 
		  echo '<h1 class="center">Edit Employee : '.$result['name'].'</h1>';
		} else { 
		  echo '<h1 class="center">New Employee</h1>';
		} ?>
		
        <!-- PHP Form -->
		<form role="form" method="POST" action="">
			<div class="form-group">
				<label for="name" class="col-md-12 control-label">Name</label>
				<div class="col-md-12">
					<input id="name" type="text" class="form-control" name="name" value="<?php echo isset($result['name'])?$result['name']:'' ?>" required />
				</div>
			</div>

            <div class="form-group">
				<label for="age" class="col-md-12 control-label">Age</label>
				<div class="col-md-12">
					<input id="age" type="text" class="form-control" name="age" value="<?php echo isset($result['age'])?$result['age']:'' ?>" required />
				</div>
			</div>

            <div class="form-group">
				<label for="birthday" class="col-md-12 control-label">Birthday</label>
				<div class="col-md-12">
					<input id="birthday" type="text" class="form-control" name="birthday" value="<?php echo isset($result['birthday'])?$result['birthday']:'' ?>" required />
				</div>
			</div>

            <div class="form-group">
				<label for="email" class="col-md-12 control-label">Email</label>
				<div class="col-md-12">
					<input id="email" type="email" class="form-control" name="email" value="<?php echo isset($result['email'])?$result['email']:'' ?>" required />
				</div>
			</div>

            <div class="form-group">
				<label for="contact_number" class="col-md-12 control-label">Contact Number</label>
				<div class="col-md-12">
					<input id="contact_number" type="text" class="form-control" name="contact_number" value="<?php echo isset($result['contact_number'])?$result['contact_number']:'' ?>" required />
				</div>
			</div>


			<div class="form-group">
				<label for="notes" class="col-md-12 control-label">Notes</label>
				<div class="col-md-12">
					<textarea name="notes"  class="form-control" style="height:250px;" required><?php echo isset($result['notes'])?$result['notes']:'' ?></textarea>
					
				</div>
			</div>
			
			
			<div class="form-group flex-group">
				<div class="col-md-6">
					
						<input type="submit" value="Save" class="form-control btn btn-primary"/>
                        <input type="hidden" value="save" name="task"/>
                        <input type="hidden" value="<?php echo isset($result['id'])?$result['id']:'' ?>" name="id"/>
				</div>
				<div class="col-md-6">
					
					<a href="index.php" class="form-control btn btn-primary">Back</a>
				</div>
			</div>
		</form>
        <?php
 }

 function view(){ // view form

    global $conn; // calling our database connection globally
    ?>

    <h1>Employee</h1>
    
    <p><a href="index.php?task=new">Add New</a></p>
    <table class="employee-table" width="100%">
        <tr>
            <th width="10%">ID</th>
            <th width="15%">Name</th>
            <th width="12%">Age</th>
            <th width="12%">Birthday</th>
            <th width="12%">Email</th>
            <th width="5%">Contact Number</th>
            <th width="15%">Notes</th>
            <th width="15%">Action</th>
        </tr>
        <?php
        
        $showData = "SELECT* FROM  employee"; //execute select operation
           
        $result = mysqli_query($conn, $showData);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ //query loop
               ?>
                <tr>
                 
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['birthday']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['notes']; ?></td>
                  <td><a class="btn btn-primary" href="index.php?task=edit&id=<?php echo $row['id'];?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="index.php?task=delete&id=<?php echo $row['id'];?>">Delete</a> </td>
                </tr>
            <?php }
        } else {
            echo "<tr><td colspan='8'>";
              echo "<p>No results</p>";
            echo "</td></tr>";
        };
        ?>
    </table>
    <?php
 }

?>

<html>
    <head>
        <title>PHP - Basic CRUD One Page Concept</title>
        <meta name="description" content="PHP script with one page concept" />
        <style>
            * { 
                margin: 0 auto; 
                border: 0;
                padding: 0;
            }
            body {
                font-family: "Arial";
            }
            .main-wrapper {max-width: 800px;margin:0 auto; }

            h1 {text-align:center; margin-top:20px;margin-bottom:20px;}
            p { margin: 0 0 15px;}
            table.employee-table { width: 100%; padding: 10px;  border:1px solid #ccc;}
            table.employee-table th,
            table.employee-table td { padding: 10px; }

            /*form*/
            .form-group { display:block; margin: 0 0 20px; }
            .form-control { border:1px solid #ccc; width:100%;padding: 10px; }
            .form-group.flex-group { display:flex; max-width:400px; }
            .col-md-12 { width: 100%;}
            .col-md-6 { width: 50%; display: flex; text-align: center;}
            .btn.btn-primary { background-color:green;color:#fff; padding:10px;     display: block; text-align:center; margin: 0 0 5px;}
            .btn.btn-danger { background-color:red;color:#fff; padding:10px;      display: block; text-align:center;}

        </style>
    </head>
<body>
    <div class="main-wrapper">
        <?php

        $task = getParam('task');

        switch($task){
	
           
            case 'new':
            case 'edit':

                form();

            break;
            
            
            
            case 'save': //save
                
                
                $id = getParam('id');
                $name = getParam('name');
                $age = getParam('age');
                $birthday = getParam('birthday');
                $email = getParam('email');
                $contact_number = getParam('contact_number');
                $notes = getParam('notes');

            
                if($id){
                    
                    //update if id is set
                   $sql = "UPDATE employee 
                   
                    SET name='".$name."',
                    age='".$age."',
                    birthday='".$birthday."',
                    email='".$email."',
                    contact_number='".$contact_number."',
                    notes='".$notes."' 
                    WHERE id=".$id;
                    
                 
                   
                } else {
                  
                  // insert if id is null
                  $sql = "INSERT INTO employee (name,age,birthday,email,contact_number,notes) 
                  VALUES ('".$name."','".$age."','".$birthday."','".$email."','".$contact_number."','".$notes."')";
                }
                
                var_dump( $sql);
                if ( !mysqli_query($conn, $sql) ) {
                    die('Error insert record!');
                } 
                header('location:index.php'); //redirect to default views
                
             
            break;
            
            case 'delete':
                
                
                $id = getParam('id');
               // $sql = "UPDATE employee SET is_deleted='yes'  WHERE id=".$id;

               $sql = "DELETE FROM  employee  WHERE id=".$id;
                if ( !mysqli_query($conn, $sql) ) {
                    die('Error deleted record!');
                } 
                //redirect to default dispaly
                header('location:index.php'); //redirect to default views
                
            
            break;
        
            default:
                view();
            break;
        
        }
        

        ?>
    </div>
</body>

</html>
