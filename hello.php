<html> 
<head> 
<title>Bookstore</title> 
<link rel="stylesheet" href="/Users/lisasinn/.bitnami/stackman/machines/xampp/volumes/root/htdocs/hellostyles.css?v=<?php echo time(); ?>">

</head> 
<body> 
<center><h1> Bookstore </h1></center>
 
<h3> <center>Welcome to the bookstore system!</center> </h3> 
<form action = "hello.php" method = "GET"> 
<p>Find entries with: </p>
<p><strong>Author:</strong> <input type = "text" name = "author" /> </p>

<p><strong>Title:</strong> <input type = "text" name = "title"  /> </p>

<p><strong>ISBN:</strong> <input type = "text" name = "isbn"  /> </p>

<p><strong>Year:</strong> 
<select name = "select"> 
<option value=""/></option> 
<option value=2005/>2005</option> 
<option value=2007/>2007</option> 
<option value=2009/>2009</option> 
<option value=2010/>2010</option> 
</select> </p> 

<input type="submit" class="button" name="submit" value="Search"/> 
</form> 

</body> 
</html> 
<?php 
session_start(); 
 
if($_GET){ 
 $author = $_GET['author']; 
 $title = $_GET['title']; 
 $select = $_GET['select']; 
 $isbn = $_GET['isbn'];

 $connect = mysqli_connect("localhost", "root", "","mysql") or die(mysql_error()); 
  
 if($connect) 
 { 
  $query = "SELECT * FROM bookstore WHERE author='" . $author . "' or Title='" . 
$title . "' ";   
  $query2 = "SELECT * FROM bookstore WHERE Year = '" . $select ."' "; 
  $query3 =  "SELECT * FROM bookstore WHERE isbn = '" . $isbn ."' ";

  $result = mysqli_query($connect,$query) or die(mysql_error()); 
  $result2 = mysqli_query($connect,$query2) or die(mysql_error()); 
  $result3 = mysqli_query($connect,$query3) or die(mysql_error()); 

  while($row = mysqli_fetch_array($result)){  
   echo $row['ISBN'] . "<br/>" . $row['Title'] . "<br/>" . $row['Author'] . 
"<br/>" . $row['Publisher'] . "<br/>" . $row['Year'] . "<br/>";    
  } 
  while($row2 = mysqli_fetch_array($result2)){ 
   echo $row2['ISBN'] . "<br/>" . $row2['Title'] . "<br/>" . $row2['Author'] . 
"<br/>" . $row2['Publisher'] . "<br/>" . $row2['Year'] . "<br/>"; 
  } 
while($row3 = mysqli_fetch_array($result3)){ 
   echo $row3['ISBN'] . "<br/>" . $row3['Title'] . "<br/>" . $row3['Author'] . 
"<br/>" . $row3['Publisher'] . "<br/>" . $row3['Year'] . "<br/>"; 
  } 
 } else { 
  die(mysql_error()); 
 } 
 
 mysqli_free_result($result); 
 mysqli_close($connect); 
} 
 
?> 