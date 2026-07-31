<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
<script>
    const isConnected = localStorage.getItem('isConnected');

    // a variavel isConnected simula uma API de login

    if(!isConnected){
        window.location.href = 'cadastro/cadastro.php'
    }

</script>
</html>