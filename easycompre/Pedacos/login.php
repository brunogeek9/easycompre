
	<div id="login">
		<a href="#"><img id="fec" src="icones/botao_fechar.png"/> <a/>
		<form action="paginas.php?acao=logar" method="post">
			<br/>
			<span class="fontawesome-user"></span><input type="text" placeholder="email" name="email"> <!-- JS because of IE support; better: placeholder="Username" -->
			<span class="fontawesome-lock"></span><input type="password" placeholder="*******" name="senha"> <!-- JS because of IE support; better: placeholder="Password" -->
			<input type="submit" value="Conecte-se">
			<br>
			<br>
			<p class="change_link">
				Ainda não é membro?
				<a href="#" class="anc" id="cadastrar">Cadastre-se</a>
			</p>

		</form>

	</div>