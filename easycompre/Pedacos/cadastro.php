
<div id="cadastro" style="display: none;">
<form class="form-horizontal" action="paginas.php?acao=cadastroCliente" method="POST">
<br/>
  <fieldset>
<legend class="legend">Cadastre-se</legend>
</fieldset>
<input type="text" name="nome" placeholder="Nome Completo:"/>

<input type="text" name="cpf" placeholder="CPF" id="cpf"/>

<input type="text" name="telefone_residencial" placeholder="Telefone Residencial:"/>

<input type="text" name="telefone_celular" placeholder="Telefone Celular"/>

<input type="date" name="data_nascimento" placeholder="Data de Nascimento"/>

<input type="email" name="email" placeholder="Email"/>

<input type="password" name="senha" placeholder="Senha"/>

<input type="password" name="confirmaSenha" placeholder="Confirmar Senha"/> 

<input type="submit" value="Cadastrar">
<p class="change_link">  
Já é membro?
<a href="#" class="anc" id="conectese"> Conecte-se </a>
</form>
</div>