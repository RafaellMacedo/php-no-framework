use teste;

create table funcionario(
	id integer not null primary key auto_increment,
	setor varchar(200) not null,
	cargo varchar(200) not null,
	data_admissao date not null,
	salario_atual float(5,2)
);

create table faltas(
	id integer not null primary key auto_increment,
	funcionario_id integer not null,
	data_falta date not null,
	falta_justificada boolean
);
alter table faltas add constraint fk_funcionario_faltas foreign key (funcionario_id) references funcionario(id);

create table agenda_ferias(
	id integer not null primary key auto_increment,
	funcionario_id integer not null,
	ferias_inicio date not null,
	ferias_termino date not null,
	CONSTRAINT `fk_funcionario_ferias` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`)
);