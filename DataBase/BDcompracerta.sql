/*---CRIA O DE BANCO DE DADOS--*/

create database compracerta;

/*---CRIA A TABELA USUARIO--*/
use compracerta;

create table usuarios (
	id_usuario int AUTO_INCREMENT PRIMARY key,
	nome varchar(30),
	telefone varchar(20),
	email varchar (50) unique,
	senha varchar(30),
	endereco varchar(200),
	numcard int(11),
	valcard date,
	cvv int(3)
);

create table produtos (
	id_produto int AUTO_INCREMENT PRIMARY key,
	nome varchar(30),
	valor decimal(14,2)
);

create table carrinho (
	id_carrinho int AUTO_INCREMENT PRIMARY key,
	fk_produtos int,
	fk_pedidos int
);

alter table carrinho
add constraint fk_carrinho_produtos foreign key(fk_produtos)
references produtos(id_produto);

create table pedidos (
	id_pedido int AUTO_INCREMENT PRIMARY key,
	valortotal decimal (14,2),
	estado varchar(20),
	fk_usuarios int
);

alter table carrinho
add constraint fk_carrinho_pedidos foreign key(fk_pedidos)
references pedidos(id_pedido);

alter table pedidos
add constraint fk_pedidos_usuarios foreign key(fk_usuarios)
references usuarios(id_usuario);

/* procedure para o funcionário ver os pedidos dos clientes */
delimiter $$
create procedure visaofuncionariosobrepedidos()
begin
	select PE.id_pedido, PE.valortotal, PE.estado, PR.nome
	FROM usuarios U
	INNER JOIN pedidos PE
	ON U.id_usuario = PE.fk_usuarios
	INNER JOIN carrinho C
	ON PE.id_pedido = C.fk_pedidos
	INNER JOIN produtos PR
	ON C.fk_produtos = PR.id_produto
	ORDER BY PE.id_pedido;
end $$
delimiter ;

/* procedure para criar um produto */
delimiter $$
create procedure criarProduto(in nomeprod varchar(30), in valorprod decimal(14,2))
begin
	insert into produtos (nome, valor) values (nomeprod, valorprod);
end $$
delimiter ;


call criarProduto('Biscoito Trakinas', 3.00);
call criarProduto('Conjunto de panelas Tramontina', 120.00);
call criarProduto('Colcha Casal', 279.90);
call criarProduto('Toalha de Banho Santista', 11.99);
call criarProduto('Tênis Adidas Feminino', 145.00);