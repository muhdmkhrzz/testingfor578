<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = http_build_query([
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ]);

  $opts = ['http' =>
    [
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $data
    ]
  ];

  $context = stream_context_create($opts);
  $result = file_get_contents('https://your-node-api.onrender.com/api/login', false, $context);

  echo $result;
}
?>

<form method="POST">
  <input type="text" name="username" required>
  <input type="password" name="password" required>
  <button type="submit">Login</button>
</form>
