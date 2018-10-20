<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Usuario</title>
</head>
<body>
    <form method="post" action="/api/cadastrar" >
        {{csrf_field()}}
        <input type="text" name="first_name" placeholder="Nome...">
        <input type="text" name="last_name" placeholder="Sobrenome...">
        <input type="email" name="email" placeholder="Email...">
        <input type="password" name="password" placeholder="Senha...">
        <input type="text" name="city" placeholder="Cidade...">
        <input type="text" name="state" placeholder="Estado...">
        <input type="submit" value="Inserir">
    </form>
</body>
</html>