<div class="background-image"></div>
<div class="text-center ct">
    <form class="form-signin" method="POST" action="./cadastroAction">
        <?php if(!empty($flash)): ?>
            <div class="flash"><?php echo $flash; ?></div>
        <?php endif; ?>

        <h1 class="h3 mb-3 font-weight-normal text-white">Cadastro</h1>

        <input placeholder="Digite seu nome de usuário" class="input" type="text" name="nome_completo" />

        <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

        <input placeholder="Digite sua password" class="input" type="password" name="password" /></br>

        <input class="button" type="submit" value="Cadastrar" /></br>

        <a href="./">Já tem conta? Faça o login</a>
    </form>
</div>

</html>