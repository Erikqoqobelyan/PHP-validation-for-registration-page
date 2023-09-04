<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #f2f2f2;
}
form {
  width: 22%;
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
h2 {
  text-align: center;
  margin-bottom: 20px;
}
label {
  font-weight: bold;
}
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="number"],
select {
  width: 95%;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}
select {
  height: 40px;
  width:100%;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  margin-top: 20px;
}
input[type="submit"]:hover {
  background-color: #45a049;
}
label{
  margin-top:15px;
  display: block;
  margin-bottom: 10px;
}
.error_firstname, .error_lastname, .error_age, .error_phone, .error_email, .error_option{
  border: 1px solid red !important;
}

@media (max-width: 1440px) and (min-width: 768px) {
  form{
    width: 45%;
  }
}
@media (max-width: 768px) and (min-width: 320px) {
  form{
    width: 55%;
    padding:100px;
  }
}

</style>
</head>
<body>

<?php
  $error_firstname_class = '';
  $error_lastname_class = '';
  $error_firstname_message = '';
  $error_lastname_message = '';
  $error_age_class = '';
  $error_age_message = '';
  $error_phone_class = '';
  $error_phone_message = '';
  $error_region_class = '';
  $error_region_message = '';
  $error_email_class = '';
  $error_email_message = '';
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
  $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
  $age = isset($_POST['age']) ? $_POST['age'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $select_region = isset($_POST['select_region']) ? $_POST['select_region'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($firstname)) {
      $error_firstname_class = 'error_firstname';
      $error_firstname_message = 'Firstname is empty';
    }else if(!preg_match('/^[a-zA-Z]*$/', $firstname)){
       $error_firstname_message = 'Write only letters';
       $error_firstname_class = 'error_firstname';
    }
    if(empty($lastname)){
      $error_lastname_message = 'Lastname is empty';
      $error_lastname_class = 'error_lastname';
    }else if(!preg_match('/^[a-zA-Z]*$/', $lastname)){
      $error_lastname_message = 'Write only letters';
      $error_lastname_class = 'error_lastname';
    }
    if(empty($age)){
      $error_age_message = 'Age is empty';
      $error_age_class = 'error_age';
    }else if(!is_numeric($age)){
      $error_age_message = 'Write only number';
      $error_age_class = 'error_age';
    }
    if(empty($phone)){
      $error_phone_message = 'Phone is empty';
      $error_phone_class = 'error_phone';
    }else if(!is_numeric($phone)){
      $error_phone_message = 'Write only number';
      $error_phone_class = 'error_phone';
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email_message = 'Invalid email format';
      $error_email_class = 'error_email';
    }
    if (empty($select_region)) {
      $error_region_message = 'Please select an option.';
      $error_region_class = 'error_option';
    }
  }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <h2>Registration Form</h2>

  <label for="firstname">First Name:</label>
  <input type="text" id="firstname" class ="<?php echo $error_firstname_class;?>" name="firstname" value="<?php echo $firstname; ?>">
  <p> <?php echo $error_firstname_message; ?> </p>

  <label for="lastname">Last Name:</label>
  <input type="text" id="lastname" name="lastname" class ="<?php echo $error_lastname_class;?>" value="<?php echo $lastname; ?>">
  <p> <?php echo $error_lastname_message; ?> </p>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age" class ="<?php echo $error_age_class;?>" value="<?php echo $age; ?>">
  <p> <?php echo $error_age_message; ?> </p>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" class ="<?php echo $error_phone_class;?>" value="<?php echo $phone; ?>">
  <p> <?php echo $error_phone_message; ?> </p>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email" class ="<?php echo $error_email_class;?>" value="<?php echo $email; ?>">
  <p> <?php echo $error_email_message; ?> </p>

  <label for="community">Community:</label>
  <select id="community" name="select_region" class ="<?php echo $error_region_class;?>">
    <option value="">Select Community</option>
    <option value="community1" <?php if ($select_region == 'community1') echo 'selected'; ?> >Community 1</option>
    <option value="community2" <?php if ($select_region == 'community2') echo 'selected'; ?> >Community 2</option>
    <option value="community3" <?php if ($select_region == 'community3') echo 'selected'; ?> >Community 3</option>
  </select>
  <p> <?php echo $error_region_message; ?> </p>
  <input type="submit" value="Submit">
</form>

</body>
</html>
