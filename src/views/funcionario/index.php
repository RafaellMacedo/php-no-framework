<?php
$data = [
	'nome' => '',
	'cargo' => '',
	'setor' => '',
	'data_admissao'=>'',
	'salario_atual' => ''
];
if(isset($notNull)){
	extract($notNull);
}

if(isset($postData)){
	$data=$postData;
}
?>
<div class='container'>
	<div class='jumbotron'>
		<div class="row">
			
			
			<div class='col-md-offset-3 col-md-6'>
			<h2>Cadastro de Funcionário</h2>

			    <form method='post' action='/funcionario'>
			        <div class="form-group <?=(isset($nome))? $nome : '';?>">
			      	    <label>Nome Completo</label>
			      	    <input class='form-control' type="hidden" name="id" 
			      	    	value='<?=array_key_exists('id', $data) ? $data['id'] : '';?>'>
			      	    <input class='form-control' type="text" name="nome" 
			      	    	value='<?=array_key_exists('nome', $data) ? $data['nome'] : '';?>'>
			        </div>
			        <div class="form-group <?=(isset($setor))? $setor : '';?>">
			      	    <label>Setor</label>
			      	    <input class='form-control' type="text" name="setor"
			      	    	value='<?=array_key_exists('setor', $data) ? $data['setor'] : '';?>'>
			        </div>
			        <div class="form-group <?=(isset($cargo))? $cargo : '';?>">
			      	    <label>Cargo</label>
			      	    <input class='form-control' type="text" name="cargo"
			      	    	value='<?=array_key_exists('cargo', $data) ? $data['cargo'] : '';?>'>
			        </div>
			        <div class="form-group <?=(isset($data_admissao))? $data_admissao : '';?>">
			      	    <label>Data Admissão</label>
			      	    <input class='form-control' type="text" name="data_admissao"
			      	    	value='<?=array_key_exists('data_admissao', $data) ? $data['data_admissao'] : '';?>'>
			        </div>
			        <div class="form-group <?=(isset($salario_atual))? $salario_atual : '';?>">
			      	    <label>Salário atual</label>
			      	    <input class='form-control' type="text" name="salario_atual"
			      	    	value='<?=array_key_exists('salario_atual', $data) ? $data['salario_atual'] : '';?>'>
			        </div>
			        <div class="form-group">
			      	    <button class='btn btn-success'>Salvar</button>
			        </div>
			    </form>
		    </div>
		</div>

<?php if(isset($funcionariosList)){ ?>
		
		
				<table class='table '>
					<thead>
						<tr>
							<th>Nome </th>
							<th>Setor</th>
							<th>Cargo</th>
							<th>Data de Admissão</th>
							<th>Salário Atual</th>
							<th>Ações</th>
						</tr>
						
					</thead>
					<tbody>
						
						<?php if(count($funcionariosList) > 0) { 
							  	foreach ($funcionariosList as $item) { ?>
							  		<tr>
								
										<td><?=$item['nome']?></td>
										<td><?=$item['setor']?></td>
										<td><?=$item['cargo']?></td>
										<td><?=$item['data_admissao']?></td>
										<td><?=$item['salario_atual']?></td>
										<td>
											<a href='/funcionario/editar/<?=$item['id']?>'>Editar</a>
											<a href='/funcionario/delete/<?=$item['id']?>'>Remover</a>
										</td>
									</tr>
								<?php } ?>
						
						<?php }else{ ?>
								<td>Nenhum Funcionário Encontrado</td>
						<?php	} ?>
						</tr>
					</tbody>
				</table>
		
		
<?php } ?>
</div>