<?php


 class Signup
 {
 	private $error ="";
 	public function evaluate($data)
 	{

 		foreach ($data as $key => $value) {
 			// code...
 			if (empty($value)) 
 			{
 				$this->error = $this->error. $key ." is empty!<br>";	
 			}

            if ($key=="email") 
            {   
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
                     $this->error = $this->error." Invalid email Address!<br>";
                }
                   
            }

            if ($key=="fullname") 
            {   
                if(is_numeric($value)){
                     $this->error = $this->error." First name can't be a number!<br>";
                }  

                if(strstr($value, " ")){
                     $this->error = $this->error." First name can't have spaces!<br>";
                } 




            }

            if ($key=="username") 
            {   
                if(is_numeric($value)){
                     $this->error = $this->error." Last name can't be a number!<br>";

                }

                if(strstr($value, " ")){
                     $this->error = $this->error." Last name can't have spaces!<br>";
                } 

                   
            }



 		}
 		if($this->error == "")
 		{
 			$this->create_user($data);
 		} else 
 		{
 			return $this->error;
 		}

 	}
 	public function create_user($data)
 {
 	$fullname = ucfirst($data['fullname']);
 	$username = ucfirst($data['username']);
 	$email = $data['email'];
 	$gender = $data['gender'];
 	$password = $data['pass'];
 	$cpassword = $data['cpass'];
 	
 	$url_address = strtolower($fullname) . "." .strtolower($username);
 	$userid = $this->create_userid();

 	$query = "insert into users 
        (fullname,username,email,password,cpassword,gender) 
        values 
        ('$fullname','$username',,'$email','$password','$cpassword','$gender')";


 	
 	$DB = new Database();
 	$DB->save($query);
 }



 private function create_userid()
 {

 	$length = rand(4,19);
        $number = "";
        for ($i=0; $i < $length; $i++) { 
            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }
 	return $number;

 }

 }




?>