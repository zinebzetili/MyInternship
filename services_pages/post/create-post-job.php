<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-post.css"> 
</head>
<body>
    <h1>add a job opportunity : </h1><br>
    <form action="post-job-submit.php" method ="post">
         <label for="field" > field : </label>
         <input type="text" name="field" id="field" placeholder="Ex : talk , internship "  required>
         <label for="title"> title : </label>
         <input type="text" name="title" id="title" required>
         <label for="description">Description</label> 
         <textarea name="description" id="description" cols="30" rows="10" required></textarea>
         <label for="link">website link : </label> 
         <input type="text" name="link" id="link" required>
         <label for="location "> location : </label> 
         <input type="text" name="location" id="location" required>
         <label for="start-date">start date : </label>
         <input type="date" name="start-date" id="start-date" required> 
         <label for="end-date">end date : </label>
         <input type="date" name="end-date" id="end-date" required> 
         <label for="position">position: </label>
         <input type="text" name="position" id="position" required> 
         <label for="company-name">comapny name: </label>
         <input type="text" name="company-name" id="company-name" required> 
         <input type="submit" name="submit_field" value="post "> 
    </form>
    <button><a href="../newjob.php">back</a></button>
  
</body>
</html>