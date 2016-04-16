function validateForm()
{
var x=document.forms["myForm"]["opassword"].value;
var y=document.forms["myForm"]["npassword"].value;
var z=document.forms["myForm"]["cpassword"].value;

if (x==null || x=="")
  {
  alert("Old Password must be filled out!");
  return false;
  }

  if (y==null || y=="")
  {
  alert("New Password must be filled out!");
  return false;
  }

  if (z==null || z=="")
  {
  alert("Confirm Password must be filled out!");
  return false;
  }

  if (y != z)
  {
  alert("Your new passwords don't match!");
  return false;
  }
}