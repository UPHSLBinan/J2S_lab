<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Information Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .jumbotron {
        background-color: #f8f9fa;
        color: #343a40;
        text-align: center;
        padding: 100px 25px;
        margin-bottom: 0;
      }
      form {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        margin: 50px;
      }
      input[type="text"],
      input[type="age"],
      input[type="email"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: black;
      }
    </style>
  </head>
  <body>
    <div class="jumbotron">
      <h1>User Information Form</h1>
      <p>Fill out the form below to submit your information.</p>
    </div>
    <form>
      <div class="form-group">
        <label for="name">First Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your First Name" required>
      </div>
      <div class="form-group">
        <label for="name">Last Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your Last Name" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="age" class="form-control" id="age" placeholder="Enter your Age" required>
      </div>
      <div class="form-group">
        <label for="Email">Email::</label>
        <input type="Email" class="form-control" id="age" placeholder="Enter your Email" required>
      </div>
      <div class="form-group">
        <label for="Details">Details:</label>
        <textarea class="form-control" id="Details" rows="5" placeholder="Enter Details" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>

    