
<?php

  header('Access-Control-Allow-Origin: *');

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



 function getEdit(){ // get customer by id
		global $conn;
		$id = getParam('id'); // get id from url parameter
        if($id){
            $showData = "SELECT * FROM customers where id=$id"; // basic sql select operation
            $result = mysqli_query($conn, $showData);
            $result = mysqli_fetch_array($result);
            echo json_encode($result);
        }
 }

 function gets(){ // get Records

        global $conn; // calling our database connection global
        $showData = "SELECT* FROM  customers"; //execute select operation
        $result = mysqli_query($conn, $showData);
        $data = array();
        $n = 0;
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result)){ //query loop
              
                 
                  $data[] = array(
                        'id'=>$row['id'],
                        'completename'=>$row['complete_name'],
                        'phonenumber'=>$row['phone'],
                        'address'=>$row['address']
                    
                    );

                    $n++;
    
                 
            } 
            
            //return $dataArray;
        } 

        //header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        //echo json_encode( array('result'=>'success','data_fallback'=>$data,'length'=>$n ) );
        //die();
        //echo 'test';
        //return $data;
        //return array('data'=>$data,'msg'=>'success');
        //return ( array('data'=>$dataArray ) );
 }


 // Script flow here!!!!
$task = getParam('task');

switch($task){

    
    case 'get':
        getEdit();
    break;
    
    case 'save': //save
        $id = getParam('cust_id');
        $complete_name = getParam('completename');
        $phone = getParam('phonenumber');
        $address = getParam('address');

        if($id){
            
            //update if id is set
            $sql = "UPDATE customers 
            SET complete_name='".$complete_name."',
            phone='".$phone."',
            address='".$address."'
            WHERE id=".$id;

            echo 'Success';
            
        } else {
            
            // insert if id is null
            $sql = "INSERT INTO customers (complete_name,phone,address) 
            VALUES ('".$complete_name."','".$phone."','".$address."')";

             echo 'Success';
            //json_decode('message'=>'success');
            //return  'tester';
        }
        
        //var_dump( $sql);
        if ( !mysqli_query($conn, $sql) ) {
            //die('Error insert record!');
            echo 'Failed';
        }  
    break;
    
    case 'delete':

        $id = getParam('id');
        $sql = "DELETE FROM  customers  WHERE id=".$id;
        if ( !mysqli_query($conn, $sql) ) {
            die('Error deleted record!');
            echo json_encode(array('msg'=>'Error!'));
        } else {
           // echo 'Deleted';
            echo json_encode(array('msg'=>'Succesfully Deleted!'));
        }
    
    break;

    default:
        gets();
    break;

}


?>