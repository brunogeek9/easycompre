	<div id="login">

		<form action="javascript:void(0);" method="post">
			<br/>
			<span class="fontawesome-user"></span><input type="text" required value="E-mail" onBlur="if(this.value=='')this.value='email'" onFocus="if(this.value=='Email')this.value='' "> <!-- JS because of IE support; better: placeholder="Username" -->
			<span class="fontawesome-lock"></span><input type="password" required value="Password" onBlur="if(this.value=='')this.value='senha'" onFocus="if(this.value=='Password')this.value='' "> <!-- JS because of IE support; better: placeholder="Password" -->
			<input type="submit" value="Conecte-se">
			<br>
			<br>
			<p class="change_link">
									Ainda não é membro?
									<a href="#" class="anc" id="cadastrar">Cadastre-se</a>
								</p>

		</form>

	</div>
