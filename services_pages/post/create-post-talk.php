<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-post.css"> 
</head>
<body>
    <h1>add a talk: </h1><br>
    <form action="post-talk-submit.php" method ="post">
         <label for="field" > field : </label>
         <input type="text" name="field" id="field" placeholder="Ex : talk , internship " required>
         <label for="name"> name: </label>
         <input type="text" name="name" id="name" required>
         <label for="description">Description</label> 
         <textarea name="description" id="description" cols="30" rows="10" required></textarea>
         <label for="link">website link : </label> 
         <input type="text" name="link" id="link" required>
         <label for="location "> location : </label> 
         <input type="text" name="location" id="location" required>
         <label for="talk-date">talk date : </label>
         <input type="date" name="talk-date" id="talk-date" required> 
         <input type="submit" name="submit_field" value="post "> 
    </form>
    <button><a href="../newtalks.php">back</a></button>
  
</body>
</html>