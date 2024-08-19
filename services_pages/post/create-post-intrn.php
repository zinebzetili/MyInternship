<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-post.css">
</head>
<body>
    <form action="post/estab_post_submit.php" method ="post">
         <label for="field" > field : </label>
         <input type="text" name="field" id="field"  placeholder="Ex : talk , internship " >
         <label for="title"> title : </label>
         <input type="text" name="title" id="title" >
         <label for="description">Description</label> 
         <textarea name="description" id="description" cols="30" rows="10" ></textarea>
         <label for="link">website link : </label> 
         <input type="text" name="link" id="link" >
         <label for="location "> location : </label> 
         <input type="text" name="location" id="location" >
         <label for="start-date">start date : </label>
         <input type="date" name="start-date" id="start-date" > 
         <label for="end-date">end date : </label>
         <input type="date" name="end-date" id="end-date" > 
         <label for="salary">salary : </label>
         <input type="number"name="salary" id="salary" > 
         <input type="submit" name="submit_field" value="post "> 
    </form>
  
</body>
</html>