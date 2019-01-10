<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>naujas</title>
    <style>
    body {
      background-color: rgb(168, 214, 174);
    }
      form {
        background-color: rgb(70, 131, 93);
        padding: 13px;
        width: 30%;
        margin: 7% auto;
        border-radius: 4px;
        text-align: center;
      }
      input {
        padding: 10px;
        border-radius: 4px;
      }

    </style>
  </head>
  <body>
    <form action="duomenys.php" method="POST">
      <h1>
        Koks Jusu KMI?
      </h1>
      <label>Ugis (cm.)</label><br />
      <input type="text" name="ugis" min="0" required/><br /><br />
      <label>Svoris (kg.)</label><br />
      <input type="text" name="svoris" min="0" required/><br /><br />
      <input type="submit" name="submit" value="Skaiciuoti KMI"/>
    </form>
  </body>
</html>
