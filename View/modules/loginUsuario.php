<div class="background-image"></div>
<div class="text-center ct">
    <form class="form-signin" method="POST" action="./login">
        <h1 class="h3 mb-3 font-weight-normal text-white">Login</h1>
        
        <?php if (!empty($flash)): ?>
            <div class="flash"><?php echo $flash; ?></div>
        <?php endif; ?>

        <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

        <input placeholder="Digite sua senha" class="input" type="password" name="password" /></br>

        <input class="button" type="submit" value="Entrar" /></br>

        <a href="./cadastro">Ainda não tem conta? Cadastre-se</a></br>
        <a href="./forgot">Esqueci minha senha</a>
    </form>
</div>
<p class="mt-5 mb-3 text-white">&copy; 2023</p>