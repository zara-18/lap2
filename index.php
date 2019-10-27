<html>
    <title>PHP Assignment</title>
    <body>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      
    </script>
        <?php 
          
		  $con = mysqli_connect('localhost', 'root', '', 'zara');
		  if(!$con){
	die('Connection Error');
}

            $query='select * from info';
            $data= mysqli_query($con, $query);
    //        $row = mysqli_fetch_assoc($data);
                $first_name='';
                $last_name='';
                $age='';
                $email='';
				$msg='';
                if(isset($_POST['check'])) // if(!empty($_POST)) // if(isset($_POST['check']))
                {
                    if(isset($_POST['first_name']))
                        $first_name=trim($_POST['first_name']);
                    if(isset($_POST['last_name']))
                        $last_name=trim($_POST['last_name']);
                    if(isset($_POST['email']))
                        $email=trim($_POST['email']);
					if(isset($_POST['age']))
						$age=$_POST['age'];
					

                    if($first_name=='')
                    {
                        $msg='Please enter student name';
                    }
                    else if($last_name=='')
                    {
                        $msg='Please enter father name';
                    }
                    else if($email=='')
                    {
                        $msg='Please enter email';
                    }
                    else if($age=='')
                    {
                        $msg='Please enter age';
                    }
                    else
                    {
                        mysqli_query($con, "insert into info (first_name, last_name, email, age) Values ('$first_name', '$last_name', '$email', $age )") ;
                        //echo 'Done Succesfully';
                    }
                }
                echo $msg;
            ?>
        
        
        <table border="1">
            <thead>
				    <th></th>
                    <th>S.No</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Email</th>
					<th>Age</th>
					
                </tr>
            </thead>
            <tbody>
                <?php 
				    $i=1;
                    while($row = mysqli_fetch_assoc($data))
                    {
                ?>
                <tr>
				    <td><input type="checkbox" name="cb"/>
					<input type="submit" name='edit' value="Edit"/>
                    <input type='submit' name="delete" value="Delete"/></td>
				    <td><?php echo $i++; ?></td>
                    <td><?php print_r($row['first_name']); ?></td>
                    <td><?php print_r($row['last_name']); ?></td>
                    <td><?php print_r($row['email']); ?></td>
                    <td><?php print_r($row['age']); ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        
        
        <table border="1">
            <br><br><br>
            
            <br>
            <form method="post" action="index.php">
                <input name="first_name" type="text" placeholder="Enter First Name" value="<?php echo $first_name; ?>" /><br><br>
                <input name="last_name" type="text" placeholder="Enter Last Name" value="<?php echo $last_name; ?>"/>     <br><br>
                <input name="email" type="text" placeholder="Enter email" value="<?php echo $email; ?>"/>     <br><br>
                <input name="age" type="number" placeholder="Enter age" value="<?php echo $age; ?>"/>     <br><br>
                <input name="check" type="hidden" />     <br><br>
                <input id="sub" type="submit"/>
            </form>
           
        </table>  
    </body>
</html>