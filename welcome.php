<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['userlogin'])) {
    header("Location: index.php");
    exit();
}

// Retrieve username
$username = $_SESSION['userlogin'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
html, body {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/*Body color*/
body 
{
	background: linear-gradient(#FF9404, #04C6FF);
	background-repeat: no-repeat;
	background-size: cover;
}
/*Nav bar color*/
.topnav {
  overflow: hidden;
  background-color: #353535;
}

/* Navigation bar properties */
.topnav a {
  float: left;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #898989;
  color: white;
}
.topnav .icon {
	float:right;
}
/* Hamburger button color */
.topnav .icon i {
  color: white;
}
/* Dropdown button properties */
.dropbtn {
  float: right;
  font-size: 24px;
  background: none;
  border: none;
  cursor: pointer;
}

/* Dropdown container properties */
.dropdown {
  float: right;
  position: relative;
  display: inline-block;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  z-index: 1;
}

/* Dropdown content links */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Dropdown content links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu when the dropdown button is clicked */
.show {
  display: block;
}
.dropdown-content a {
  color: white; /* Change this color to the one you want */
}


// Logout button alignment
.logout-form {
  float: right;
  margin-right: 20px; /* Adjust the margin as needed */
}

.logout-btn {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 17px;
  color: white;
}

.logout-btn:hover {
  background-color: #ddd;
  color: black;
}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" onclick="logout()">Logout</a>  <div class="dropdown">
    <button class="dropbtn" onclick="toggleDropdown()">☰</button>
    <div class="dropdown-content" id="myDropdown">
    </div>
  </div>
</div>

<form id="logoutForm" method="post" action="endsession.php">

<script>

// Logout function
function logout() 
{
  var confirmation = confirm("Are you sure you want to logout?");
  
  if (confirmation) 
  {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'endsession.php', true); 
    xhr.onreadystatechange = function () 
    {
      if (xhr.readyState === 4 && xhr.status === 200) 
      {
        window.location.href = 'index.php'; // Redirect to index after logout
      }
    };
    xhr.send();
  }
}

var dropdownVisible = false;

function toggleDropdown() 
{
  var dropdown = document.getElementById("myDropdown");
  
  if (dropdownVisible) 
  {
    dropdown.style.display = "none";
  } 
  else 
  {
    dropdown.style.display = "block";
  }
  
  dropdownVisible = !dropdownVisible;
}

</script>


<div style="padding-left:16px">
  <h1 style="text-align: center;">Welcome, <?php echo $username; ?></h1>  <p>Frodo : I can’t do this, Sam.<p>
  <p>Sam : I know. It’s all wrong
By rights we shouldn’t even be here.
But we are.
It’s like in the great stories Mr. Frodo.
The ones that really mattered.
Full of darkness and danger they were,
and sometimes you didn’t want to know the end.
Because how could the end be happy.
How could the world go back to the way it was when so much bad happened.
But in the end, it’s only a passing thing, this shadow.
Even darkness must pass.
A new day will come.
And when the sun shines it will shine out the clearer.
Those were the stories that stayed with you.
That meant something.
Even if you were too small to understand why.
But I think, Mr. Frodo, I do understand.
I know now.
Folk in those stories had lots of chances of turning back only they didn’t.
Because they were holding on to something.</p>

<p>Frodo : What are we holding on to, Sam?</p>

<p>Sam : That there’s some good in this world, Mr. Frodo. And it’s worth fighting for.</p>
</div>

</body>
</html>
