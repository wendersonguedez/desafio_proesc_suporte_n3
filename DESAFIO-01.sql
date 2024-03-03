# DESAFIO 1
SELECT pessoas.nome, pessoas.telefone,
       COUNT(parcelas.id) as quantidade_parcelas_nao_pagas,
       ROUND(SUM(parcelas.valor), 2) as total_nao_pago
FROM parcelas
         INNER JOIN debitos ON parcelas.debito_id = debitos.id
         INNER JOIN pessoas ON debitos.pessoa_id = pessoas.id
WHERE parcelas.pago = 0
GROUP BY pessoas.nome, pessoas.telefone;