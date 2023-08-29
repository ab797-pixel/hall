<html>
<head>
<title>Internal css</title>
<!--<link rel="stylesheet" href="practical_1.css">-->
<style>
button {
  background-color: green;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
.container {
  padding: 16px;
  text-align:center;
  width:50%;
  margin: 5% auto 15% auto;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  box-sizing: border-box;
}
</style>
</head>
<body>
<div class="container">
<h1><u>college detail</u></h1>
<form method="post" action="#">
 <label for="uname"><b>CLg's Name</b></label>
    <input type="text" placeholder="Enter college name" name="college_name" required>

    <label for="sem"><b>current sem</b></label>
    <input type="text" placeholder="Enter current sem" name="sem" required>

    <label for="term"><b>current Term</b></label>
    <input type="text" placeholder="Enter current sem" name="term" required>

    <button type="submit">Login</button>
</form>
  </div>
</body>
</html>