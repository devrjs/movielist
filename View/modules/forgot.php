<div class="background-image"></div>
<div class="text-center ct">
<form class="form-signin">
<h1 class="h3 mb-3 font-weight-normal text-white">Recuperar Senha</h1>

<body>
    <section class="container main">


        <form method="POST" action="./forgot">
        
        <?php if(!empty($flash)): ?>
            <div class="flash"><?php echo $flash; ?></div>
         <?php endif; ?>

            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input class="button" type="submit" value="Enviar" /></br>

            <a href="./">Já tem conta? Faça o login</a>
        </form>
    </section>


</body>

</html>