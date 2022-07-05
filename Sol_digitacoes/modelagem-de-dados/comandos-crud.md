# Comandos CRUD SQL

## Resumo da sigla CRUD
- C -> Create ( INSERT, que é inserir dados )
- R -> Read ( SELECT, leitura de dados )
- U -> UPDATE ( UPDATE, atualizar dados )
- D -> DELETE ( DELETE, excluir dados )

## INSERT fabricantes
INSERT INTO fabricantes(nome) VALUES('Asus');
INSERT INTO fabricantes(nome) VALUES('Dell');
INSERT INTO fabricantes(nome) VALUES('Apple');
INSERT INTO fabricantes(nome) VALUES('LG');

## INSERT fabricantes (varios)
INSERT INTO fabricantes(nome)
VALUES('Samsung'),('Microsoft'),('Brastemp');

## INSERT produtos 
INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id)
VALUES('TV Led', 2000, 5, 'Tv de ultima geração', 5);

INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id)
VALUES('iPhone XYZ', 5500.79, 8, 'Smartphone caro pra caramba', 3);

## INSERT produtos (varios)

INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES
(
    'Geladeira',
    1500,
    10,
    'Refrigerador Frost-free com acesso à Internet das Coisas e bla bla bla',
    7 -- Brastemp
),
(
    'iPad Mini',
    5000,
    8,
    'Tablet Apple com tela retina display de 4k, memória interna de 64GB, acesso ao iCloud.',
    3 -- Apple
),
(
    'Xbox',
    2500,
    6,
    'Console de última geração com acesso aos melhores jogos e bla bla',
    6 -- Microsoft
),
(
    'Ultrabook',
    4500.68,
    12,
    'Equipamento com processador AMD Ryzen5, 12GB de RAM, placa de vídeo RTX',
    1 -- Asus
),
(
    'Headset',
    120,
    9,
    'Fone de ouvido USB com alta qualidade',
    6 -- Microsoft
),
(
    'Tablet Android',
    4999,
    3,
    'Tablet com a versão 12 do sistema operacional da Google, possui tela de 10 polegadas e armazenamento de 64GB.',
    5 -- Samsung
);

## SELECT
SELECT nome, preco FROM produtos;

## SELECT (com filtros - WHERE)
SELECT nome, preco FROM produtos WHERE preco < 3000;

## SELECT (com 2 filtros - and / WHERE)
SELECT nome, preco FROM produtos 
WHERE preco < 3000 AND preco > 2000;

## SELECT (com 2 filtros - OR / WHERE)
SELECT nome, preco FROM produtos 
WHERE fabricante_id = 3 OR fabricante_id = 1;

## SELECT (ordenar crescente)
SELECT nome, descricao FROM produtos
ORDER BY nome;

## SELECT (ordenar decrescente)
SELECT nome, descricao FROM produtos
ORDER BY nome DESC;

## SELECT (trazendo como resultado fabricante_id - com referencia id)
SELECT nome, preco, quantidade, fabricante_id
FROM produtos;

## SELECT (trazendo como resultado fabricante_id - com nome)
SELECT 
    fabricantes.nome AS Fabricante, 
    produtos.nome AS Produto,
    produtos.preco AS Preço, 
    produtos.quantidade AS Quantidade
FROM produtos INNER JOIN fabricantes
ON produtos.fabricante_id = fabricantes.id;

-- ------------------------------------------------------------------
-- INNER JOIN: Comando que permite juntar duas ou mais tabelas ------
-- ON: Comando para indicar a maneira como as tabelas são juntadas --
-- AS: Comando que permite dar apelidos aos titulos das colunas -----
-- ------------------------------------------------------------------

## UPDATE
UPDATE fabricantes SET nome = 'LG do Brasil'
WHERE id = 4;    

-- ----------------------------
-- -- colocar condição WHERE --
-- ----------------------------

## DELETE (produto)
DELETE FROM produtos 
WHERE id = 5;

-------------------------------
-- id = 5 refere-se ao XBOX ---
-- ----------------------------
-- -- colocar condição WHERE --
-- ----------------------------
