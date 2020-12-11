create table time (
	id serial not null primary key,
	nome varchar(100) not null,
	cidade varchar(50) not null,
	estado varchar(2) not null,
	pais varchar(20) not null,
	data_criacao date not null,
	esporte varchar(50) not null,
	modalidade varchar(100) not null
);


create table tecnico (
	id serial not null primary key,
	nome varchar(100) not null,
	sexo varchar(10) not null,
	data_nascimento date not null,
	permissao int not null,
	login varchar(30) not null,
	senha varchar(20) not null,
	id_time int not null references time(id)
);


create table jogador (
	id serial not null primary key,
	nome varchar(100) not null,
	sexo varchar(10) not null,
	data_nascimento date not null,
	posicao varchar(20) not null,
	numero_camisa int not null,
	permissao int not null,
	login varchar(30) not null,
	senha varchar(20) not null,
	id_time int not null references time(id)
);


create table equipamento (
	id serial not null primary key,
	nome varchar(100) not null,
	descricao varchar(255),
	quantidade int default 1,
	id_time int not null references time(id)
);


create table treino (
	id serial not null primary key,
	local varchar(255) not null,
	data date not null,
	hora time not null,
	id_tecnico int not null references tecnico(id)
);


create table mensalidade (
	id serial not null primary key,
	valor float not null,
	data_vencimento date not null
);


create table treino_possui_jogador (
	id_treino int not null references time(id) on update cascade on delete cascade,
	id_jogador int not null references jogador(id) on update cascade on delete cascade
);


create table jogador_paga_mensalidade (
	id_jogador int not null references jogador(id) on update cascade on delete cascade,
	id_mensalidade int not null references mensalidade(id) on update cascade on delete cascade,
	primary key (id_jogador, id_mensalidade)
);

insert into time(nome, cidade, estado, pais, data_criacao, esporte, modalidade) values
('CG Warriors', 'Campo Grande', 'RN', 'Brasil', '2018/02/27', 'Flag Football', '5x5 Masculino'),
('Espartanas', 'Natal', 'RN', 'Brasil', '2019/09/07', 'Flag Football', '5x5 Feminino'),
('Cabugi Goats', 'Lajes', 'RN', 'Brasil', '2015/08/18', 'Flag Football', '5x5 Masculino'),
('Octopus', 'Olinda', 'PE', 'Brasil', '2018/12/18', 'Flag Football', '5x5 Masculino'),
('Teresina Warriors', 'Teresina', 'PI', 'Brasil', '2018/12/09', 'Flag Football', '5x5 Masculino'),
('Antares', 'Rio de Janeiro', 'RJ', 'Brasil', '2017/02/27', 'Flag Football', '5x5 Feminino'),
('Crimson Fox', 'São Paulo', 'SP', 'Brasil', '2017/12/10', 'Flag Football', '5x5 Masculino');

insert into tecnico(nome, sexo, data_nascimento, permissao, login, senha, id_time) values
('Lamarck', 'Masculino', '1987/05/06', 0, 'lamar', 'lamarck123', 1),
('Galega', 'Feminino', '1979/07/31', 0, 'gal', 'galega456', 2),
('Tenísio', 'Masculino', '1977/03/19', 0, 'tenisio', 'tns77', 3),
('Wellington', 'Masculino', '1970/10/20', 0, 'bigodinho', '70well70', 4),
('Rafael', 'Masculino', '1990/11/01', 0, 'rafa', '123456789', 5);


insert into jogador(nome, sexo, data_nascimento, posicao, numero_camisa, permissao, login, senha, id_time) values
('Guilherme', 'Masculino', '2000/06/08', 'Blitz', 11, 1, 'augusto', 'gass123', 1),
('Igor', 'Masculino', '1997/01/05', 'Quarterback', 9, 1, 'igao', 'qb1997', 1),
('Eduardo', 'Masculino', '2000/04/28', 'Wide Receiver', 8, 1, 'dudu', 'abcdd', 1),
('Abraão', 'Masculino', '2001/12/03', 'Running Back', 7, 1, 'Lincoln', 'abr12032001', 1),
('Eric', 'Masculino', '1998/09/16', 'Cornerback', 6, 1, 'ericks', '@eric#', 1),
('Ryan', 'Masculino', '1996/03/18', 'Safety', 5, 1, 'ryan96', 'safe$$', 1),
('Rawan', 'Masculino', '1999/02/23', 'Center', 4, 1, 'rawan_ebs', '159753', 1),
('Gabriel', 'Masculino', '1998/05/01', 'Cornerback', 3, 1, '_biel_', 'pensador', 1),
('Joaquim', 'Masculino', '2000/11/09', 'Wide Receiver', 2, 1, 'Quimwide', '789receiver', 1),
('Renato', 'Masculino', '2001/10/10', 'Wide Receiver', 1, 1, 'gaucho', 'gremio', 1);


insert into equipamento(nome, descricao, quantidade, id_time) values
('Conjunto de Flag', 'Pares de Flag', 12, 1),
('Bola', 'Bola de Futebol Americano da Marca Wilson', 2, 1),
('Cones', 'Cones Chapéu Chinês', 12, 1),
('Escada de Agilidade', null, 1, 1);


insert into treino(local, data, hora, id_tecnico) values
('Beira Rio', '2021/01/02', '16:00', 1),
('AABB', '2021/01/03', '18:00', 1),
('Quadra dos Escoteiros', '2021/01/05', '10:00', 1),
('Beira Rio', '2021/01/06', '16:00', 1),
('Ginásio Raimundo Amorim', '2021/01/07', '17:00', 1),
('Quadra dos Escoteiros', '2021/01/08', '16:30', 1),
('Beira Rio', '2021/01/09', '16:00', 1),
('Quadra de Esportes José Ricardo', '2021/02/01', '16:00', 1),
('AABB', '2021/03/02', '18:00', 1),
('Ginásio Raimundo Amorim', '2021/04/02', '07:00', 1);


insert into mensalidade( valor, data_vencimento ) values
(5.00, '2020/12/01'),
(5.00, '2021/01/01'),
(5.00, '2021/02/01'),
(5.00, '2021/03/01'),
(5.00, '2021/04/01'),
(5.00, '2021/05/01'),
(5.00, '2021/06/01'),
(5.00, '2021/07/01'),
(5.00, '2021/08/01'),
(5.00, '2021/09/01');


insert into treino_possui_jogador( id_treino, id_jogador ) values
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10);


insert into jogador_paga_mensalidade( id_jogador, id_mensalidade ) values
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1);

alter table Time add column caixa float;

update Jogador set numero_camisa=42 WHERE nome='Gabriel';

alter table Jogador rename column nome to nome_completo;
alter table Tecnico rename column nome to nome_tecnico;

alter table Time drop column caixa;

alter table Treino alter column local type varchar(100);

alter table Equipamento rename to Equipamentos;

drop table treino_possui_jogador;

alter table Equipamentos alter column quantidade set default 1;

alter table Jogador add check (numero_camisa <= 90);

alter table Time add constraint chk_time check (pais='Brasil' and esporte='Flag Football');

alter table Jogador add check (numero_camisa < 100);

alter table Time drop constraint chk_time;

update jogador set data_nascimento='1997/01/22' where id=2;

delete from Jogador where nome_completo='Guilherme';

update Mensalidade set id = 11 where id = 1;

select id, nome_completo from jogador;

select nome_completo from jogador where id_time=1;

select id, nome_completo from jogador order by nome_completo desc;

select distinct posicao from Jogador;

select 
	max (numero_camisa) as maior_camisa,
	min (numero_camisa) as menor_camisa,
	avg (numero_camisa) as media_camisas,
	count (id) as quantidade_jogadores,
	sum (numero_camisa) as total_camisas
from Jogador;

select * from Treino where hora between '16:00' and '18:00';
select * from Treino where hora not between '16:00' and '18:00';

select * from Treino where local in ('AABB', 'Beira Rio');
select * from Treino where local not in ('AABB', 'Beira Rio');

select nome_completo, numero_camisa*2 as dobro_camisa from Jogador;

select nome_completo from Jogador where nome_completo like '%o';
select nome_completo from Jogador where nome_completo not like '%a%';
select nome_completo from Jogador where nome_completo like '_____';

select * from Jogador where length (nome_completo) <= 6 and 
	data_nascimento < '2000/01/01';
select * from Jogador where nome_completo not like '%o%' or 
	data_nascimento > '2000/12/31';
	
select nome_completo, numero_camisa,
       case
            when numero_camisa > 20 then 'Numeração elevada'
            when numero_camisa < 5 then 'Numeração baixa'
            else 'Numeração mediana'
      end as Numeracao
from Jogador;

select * from Jogador cross join Mensalidade;


select * from Jogador inner join Mensalidade using (id);

select * from Time left join Equipamentos on Time.id = Equipamentos.id_time;

select * from Time right join Equipamentos on Time.id = Equipamentos.id_time;


select nome_completo from Jogador union 
select nome_tecnico from Tecnico;

select id from Time intersect
select id_time from Tecnico;

select id from Time except
select id_time from Tecnico;

select nome from Time where id in (select id_time from Tecnico);
select nome from Time as Ti where not exists (select * from Tecnico where Tecnico.id_time = Ti.id);


select local from treino where data='2021/01/02' AND hora='16:00';
select data, hora from Treino where local='Quadra de Esportes José Ricardo';

create view Escalacao as (select id, nome_completo, posicao, numero_camisa from jogador);

select nome_completo, posicao, numero_camisa from Escalacao;
update Escalacao set posicao = 'Blitz' where posicao = 'Safety';
insert into Jogador values (20, 'Paulo', 'Masculino', '2000/10/30', 'Quarterback', 45, 1, 1);

create view Tecnicos_RN as
select time.nome, tecnico.nome_tecnico
from Time, Tecnico
where time.id = tecnico.id_time and time.estado='RN';


drop table equipamentos;
drop table jogador;
drop table jogador_paga_mensalidade;
drop table mensalidade;
drop table tecnico;
drop table time;
drop table treino;


-----------------------------
------------VIEWS------------
-----------------------------

create view Times_de_Flag
	(
		select nome 
		from time as T
		where T.esporte = 'FlagFootball'
		);

-----------------------------
------------REGRAS-----------
-----------------------------
-- Exemplo de rule

--create  or replace rule NomedaRule AS ON DELETE 
	--TO TABELA WHERE(condição logica) 
	--DO [also | insteade] {nothing | comando| Comando}

-- Rule real

CREATE TABLE log_entrada_equipamento(
	nome varchar(50),
	usuario  varchar(50),
	data date);

create  or replace rule log_entrada_equipamento AS ON INSERT 
	TO equipamento WHERE(condição logica) 
	DO also insert into log_entrada_equipamento
	values(NEW.nome, current.user, now());



-----------------------------
-----------FUNÇÕES-----------
-----------------------------



CREATE FUNCTION Conta_jogadores(@time_nome varchar(100))  --Nome da Função
RETURNS varchar as
	begin
			select
			T.nome, count(J.sexo), J.sexo
			from time as T, jogador as J
			where T.id = J.id_time
			order by J.sexo
			returns select;	  
	end
-----------------------------
----------GATILHOS-----------
-----------------------------
-- Um gatilho aciona uma função, por isso é preciso criar uma
CREATE table log_sistema(
	data date,
	usuario varchar(50),
	modificação varchar(50);
	);

CREATE LANGUAGE plpgsql;

create function funcao_log() 
	returns trigger as
	$$
	begin
		insert into log_sistema(data, usuario, modificação)
			values (now(), current.user, TG_OP);
		return new;
	end;
	$$ LANGUAGE 'plpgsql';

-- Esse é o gatilho

CREATE TRIGGER teste_log
AFTER INSERT OR UPDATE OR DELETE ON *
FOR EACH ROW EXECUTE PROCEDURE funcao_log();