<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cfop;

class CfopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                "cfop"=> "1.101",
                "descricao"=> "Compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.102",
                "descricao"=> "Compra para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.111",
                "descricao"=> "Compra para industrialização de mercadoria recebida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as compras efetivas de mercadorias a serem utilizadas em processo de industrialização, recebidas anteriormente a título de consignação industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.113",
                "descricao"=> "Compra para comercialização, de mercadoria recebida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as compras efetivas de mercadorias recebidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.116",
                "descricao"=> "Compra para industrialização ou produção rural originada de encomenda para recebimento futuro.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural, quando da entrada real da mercadoria, cuja aquisição tenha sido classificada no código \"1.922 - Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.117",
                "descricao"=> "Compra para comercialização originada de encomenda para recebimento futuro.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, quando da entrada real da mercadoria, cuja aquisição tenha sido classificada no código “1.922 - Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.118",
                "descricao"=> "Compra de mercadoria para comercialização pelo adquirente originário, entregue pelo vendedor remetente ao destinatário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias já comercializadas, que, sem transitar pelo estabelecimento do adquirente originário, sejam entregues pelo vendedor remetente diretamente ao destinatário, em operação de venda à ordem, cuja venda seja classificada, pelo adquirente originário, no código “5.120 - Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.120",
                "descricao"=> "Compra para industrialização, em venda à ordem, já recebida do vendedor remetente.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização, em vendas à ordem, já recebidas do vendedor remetente, por ordem do adquirente originário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.121",
                "descricao"=> "Compra para comercialização, em venda à ordem, já recebida do vendedor remetente.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, em vendas à ordem, já recebidas do vendedor remetente por ordem do adquirente originário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.122",
                "descricao"=> "Compra para industrialização em que a mercadoria foi remetida pelo fornecedor ao industrializador sem transitar pelo estabelecimento adquirente",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização, remetidas pelo fornecedor para o industrializador sem que a mercadoria tenha transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.124",
                "descricao"=> "Industrialização efetuada por outra empresa.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias industrializadas por terceiros, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial. Quando a industrialização efetuada se referir a bens do ativo imobilizado ou de mercadorias para uso ou consumo do estabelecimento encomendante, a entrada deverá ser classificada nos códigos “1.551 - Compra de bem para o ativo imobilizado” ou “1.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.125",
                "descricao"=> "Industrialização efetuada por outra empresa quando a mercadoria remetida para utilização no processo de industrialização não transitou pelo estabelecimento adquirente da mercadoria.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias industrializadas por outras empresas, em que as mercadorias remetidas para utilização no processo de industrialização não transitaram pelo estabelecimento do adquirente das mercadorias, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial. Quando a industrialização efetuada se referir a bens do ativo imobilizado ou de mercadorias para uso ou consumo do estabelecimento encomendante, a entrada deverá ser classificada nos códigos “1.551 - Compra de bem para o ativo imobilizado” ou “1.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.126",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ICMS.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ICMS.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.128",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ISSQN.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ISSQN.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.131",
                "descricao"=> "Entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, decorrente de operação de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias, com previsão de posterior ajuste ou fixação de preço, proveniente de cooperado, bem como proveniente de outra cooperativa, em que a saída tenha sido classificada no código “5.131 - Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.132",
                "descricao"=> "Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, em ato cooperativo, para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas para comercialização referentes a fixação de preço de produção do estabelecimento do produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo cuja saída tenha sido classificada no código “5.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.135",
                "descricao"=> "Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, em ato cooperativo, para industrialização.",
                "observacao"=> "Classificam-se neste código as entradas para industrialização referentes a fixação de preço de produção do estabelecimento do produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo cuja saída tenha sido classificada no código “5.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.151",
                "descricao"=> "Transferência para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.152",
                "descricao"=> "Transferência para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.153",
                "descricao"=> "Transferência de energia elétrica para distribuição.",
                "observacao"=> "Classificam-se neste código as entradas de energia elétrica recebida em transferência de outro estabelecimento da mesma empresa, para distribuição.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.154",
                "descricao"=> "Transferência para utilização na prestação de serviço.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem utilizadas nas prestações de serviços.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.159",
                "descricao"=> "Entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as entradas decorrentes de fornecimento de produtos ou mercadorias por estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujo fornecimento tenha sido classificado no código \"5.159 - Fornecimento de produção do estabelecimento de ato cooperativo” ou “5.160 - Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.201",
                "descricao"=> "Devolução de venda de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas tenham sido classificadas como \"Venda de produção do estabelecimento\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.202",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros, ou qualquer devolução de mercadoria efetuada pelo MEI com exceção das classificadas nos códigos 1.503, 1.504, 1.505 e 1.506.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de industrialização no estabelecimento, cujas saídas tenham sido classificadas como “Venda de mercadoria adquirida ou recebida de terceiros”. Também serão classificadas neste código quaisquer devoluções de mercadorias efetuadas pelo MEI com exceção das classificadas nos códigos “1.503 - Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento”, “1.504 - Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros”, “1.505 - Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “1.506 - Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.203",
                "descricao"=> "Devolução de venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas foram classificadas no código \"5.109 - Venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio”. Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.204",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, cujas saídas foram classificadas no código “5.110 - Venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio”. Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.205",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.206",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.207",
                "descricao"=> "Anulação de valor relativo à venda de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de venda de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.208",
                "descricao"=> "Devolução de produção do estabelecimento, remetida em transferência.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, transferidos para outros estabelecimentos da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.209",
                "descricao"=> "Devolução de mercadoria adquirida ou recebida de terceiros, remetida em transferência.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas ou recebidas de terceiros, transferidas para outros estabelecimentos da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.212",
                "descricao"=> "Devolução de venda no mercado interno de mercadoria industrializada e insumo importado sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados e insumos importados pelo estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.213",
                "descricao"=> "Devolução de remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, em ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de remessa que tenham sido classificadas no código “5.131 - Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.214",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de produção do estabelecimento produtor cuja saída tenha sido classificada no código “5.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.215",
                "descricao"=> "Devolução de fornecimento de produção do estabelecimento de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de fornecimentos de produtos industrializados ou produzidos pelo próprio estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujas saídas tenham sido classificadas no código “5.159 - Fornecimento de produção do estabelecimento de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.216",
                "descricao"=> "Devolução de fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de fornecimentos de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento de cooperativa, destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujas saídas tenham sido classificadas no código “5.160 - Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.251",
                "descricao"=> "Compra de energia elétrica para distribuição ou comercialização.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada em sistema de distribuição ou comercialização. Também serão classificadas neste código as compras de energia elétrica por cooperativas para distribuição aos seus cooperados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.252",
                "descricao"=> "Compra de energia elétrica por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada no processo de industrialização. Também serão classificadas neste código as compras de energia elétrica utilizada por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.253",
                "descricao"=> "Compra de energia elétrica por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento comercial. Também serão classificadas neste código as compras de energia elétrica utilizada por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.254",
                "descricao"=> "Compra de energia elétrica por estabelecimento prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento prestador de serviços de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.255",
                "descricao"=> "Compra de energia elétrica por estabelecimento prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.256",
                "descricao"=> "Compra de energia elétrica por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.257",
                "descricao"=> "Compra de energia elétrica para consumo por demanda contratada.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica para consumo por demanda contratada, que prevalecerá sobre os demais códigos deste subgrupo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.301",
                "descricao"=> "Aquisição de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.302",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento industrial. Também serão classificadas neste código as aquisições de serviços de comunicação utilizados por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.303",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento comercial. Também serão classificadas neste código as aquisições de serviços de comunicação utilizados por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.304",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento prestador de serviço de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.305",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.306",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.351",
                "descricao"=> "Aquisição de serviço de transporte para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.352",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.353",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.354",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.355",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.356",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.360",
                "descricao"=> "Aquisição de serviço de transporte por contribuinte substituto em relação ao serviço de transporte.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte quando o adquirente for o substituto tributário do imposto decorrente da prestação dos serviços.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.401",
                "descricao"=> "Compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural, decorrentes de operações com mercadorias sujeitas ao regime de substituição tributária. Também serão classificadas neste código as compras por estabelecimento industrial ou produtor rural de cooperativa de mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.403",
                "descricao"=> "Compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, decorrentes de operações com mercadorias sujeitas ao regime de substituição tributária. Também serão classificadas neste código as compras de mercadorias sujeitas ao regime de substituição tributária em estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.406",
                "descricao"=> "Compra de bem para o ativo imobilizado cuja mercadoria está sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de bens destinados ao ativo imobilizado do estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.407",
                "descricao"=> "Compra de mercadoria para uso ou consumo cuja mercadoria está sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias destinadas ao uso ou consumo do estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.408",
                "descricao"=> "Transferência para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem industrializadas ou consumidas na produção rural no estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.409",
                "descricao"=> "Transferência para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas, decorrentes de operações sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.410",
                "descricao"=> "Devolução de venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas tenham sido classificadas como \"Venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.411",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, cujas saídas tenham sido classificadas como “Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.414",
                "descricao"=> "Retorno de produção do estabelecimento, remetida para venda fora do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as entradas, em retorno, de produtos industrializados ou produzidos pelo próprio estabelecimento, remetidos para vendas fora do estabelecimento, inclusive por meio de veículos, em operações com produtos sujeitos ao regime de substituição tributária, e não comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.415",
                "descricao"=> "Retorno de mercadoria adquirida ou recebida de terceiros, remetida para venda fora do estabelecimento em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as entradas, em retorno, de mercadorias adquiridas ou recebidas de terceiros remetidas para vendas fora do estabelecimento, inclusive por meio de veículos, em operações com mercadorias sujeitas ao regime de substituição tributária, e não comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.451",
                "descricao"=> "Entrada de animal - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas de animais pelo sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as entradas do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.452",
                "descricao"=> "Entrada de insumo - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas de insumos pelo sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as entradas do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.453",
                "descricao"=> "Retorno do animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes ao retorno da produção, bem como dos animais criados, recriados ou engordados pelo produtor no sistema integrado e de produção animal, cujas saídas tenham sido classificadas no código “5.453 - Retorno de animal ou da produção - Sistema de Integração e Parceria Rural”. Também serão classificados neste código as entradas referentes ao retorno do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.454",
                "descricao"=> "Retorno simbólico do animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes ao retorno simbólico da produção, bem como dos animais criados, recriados ou engordados pelo produtor no sistema integrado e de produção animal, cujas saídas tenham sido classificadas no código “5.454 - Retorno simbólico de animal ou da produção - Sistema de Integração e Parceria Rural”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.455",
                "descricao"=> "Retorno de insumo não utilizado na produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes ao retorno de insumos não utilizados pelo produtor na criação, recriação ou engorda de animais pelo sistema integrado e de produção animal, inclusive em sistema de confinamento, cujas saídas tenham sido classificadas no código “5.455 - Retorno de insumos não utilizados na produção - Sistema de Integração e Parceria Rural”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.456",
                "descricao"=> "Entrada referente a remuneração do produtor no Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas da parcela da produção do produtor realizadas em sistema de integração e produção animal, quando da entrega ao integrador ou parceiro. Também serão classificadas neste código as entradas decorrentes de “ato cooperativo”, inclu-sive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.501",
                "descricao"=> "Entrada de mercadoria recebida com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias em estabelecimento de trading com-pany, empresa comercial exportadora ou outro estabelecimento do remetente, com fim específico de exportação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.503",
                "descricao"=> "Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, remetidos a trading company, a empresa comercial exportadora ou a outro estabelecimento do remetente, com fim específico de exportação, cujas saídas tenham sido classificadas no código \"5.501 - Remessa de produção do estabelecimento, com fim específico de exportação\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.504",
                "descricao"=> "Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas ou recebidas de terceiros remetidas a trading company, a empresa comercial exportadora ou a outro estabelecimento do remetente, com fim específico de exportação, cujas saídas tenham sido classificadas no código “5.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.505",
                "descricao"=> "Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas ou físicas de mercadorias, bem como o retorno de mercadorias não entregues, remetidas para formação de lote de exportação cujas saídas tenham sido classificadas no código “5.504 - Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.506",
                "descricao"=> "Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação.",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas ou físicas de mercadorias, bem como o retorno de mercadorias não entregues, remetidas para formação de lote de exportação em armazéns alfandegados, entrepostos aduaneiros ou outros estabelecimentos que venham a ser regulamentados pela legislação tributária de cada Unidade Federada, efetuadas pelo estabelecimento depositário, cujas saídas tenham sido classificadas no código “5.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de ex-portação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.551",
                "descricao"=> "Compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as compras de bens destinados ao ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.552",
                "descricao"=> "Transferência de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as entradas de bens destinados ao ativo imobilizado recebidos em transferência de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.553",
                "descricao"=> "Devolução de venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de bens do ativo imobilizado, cujas saídas tenham sido classificadas no código “5.551 - Venda de bem do ativo imobilizado”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.554",
                "descricao"=> "Retorno de bem do ativo imobilizado remetido para uso fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas por retorno de bens do ativo imobilizado remetidos para uso fora do estabelecimento, cujas saídas tenham sido classificadas no código “5.554 - Remessa de bem do ativo imobilizado para uso fora do estabelecimento”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.555",
                "descricao"=> "Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas de bens do ativo imobilizado de terceiros, remetidos para uso no estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.556",
                "descricao"=> "Compra de material para uso ou consumo.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias destinadas ao uso ou consumo do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.557",
                "descricao"=> "Transferência de material para uso ou consumo.",
                "observacao"=> "Classificam-se neste código as entradas de materiais para uso ou consumo recebidos em transferência de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.601",
                "descricao"=> "Recebimento, por transferência, de crédito de ICMS.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de créditos de ICMS, recebidos por transferência de outras empresas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.602",
                "descricao"=> "Recebimento, por transferência, de saldo credor de ICMS de outro estabelecimento da mesma empresa, para compensação de saldo devedor de ICMS.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da transferência de saldos credores de ICMS recebidos de outros estabelecimentos da mesma empresa, destinados à compensação do saldo devedor do estabelecimento, inclusive no caso de apuração centralizada do imposto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.603",
                "descricao"=> "Ressarcimento de ICMS retido por substituição tributária.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de ressarcimento de ICMS retido por substituição tributária a contribuinte substituído, efetuado pelo contribuinte substituto, ou, ainda, quando o ressarcimento for apropriado pelo próprio contribuinte substituído, nas hipóteses previstas na legislação aplicável.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.604",
                "descricao"=> "Lançamento do crédito relativo à compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da apropriação de crédito de bens do ativo imobilizado.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.605",
                "descricao"=> "Recebimento, por transferência, de saldo devedor de ICMS de outro estabelecimento da mesma empresa.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da transferência de saldo devedor de ICMS recebido de outro estabelecimento da mesma empresa, para efetivação da apuração centralizada do imposto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.651",
                "descricao"=> "Compra de combustíveis ou lubrificantes para industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem utilizados em processo de industrialização do próprio produto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.652",
                "descricao"=> "Compra de combustíveis ou lubrificantes para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.653",
                "descricao"=> "Compra de combustíveis ou lubrificantes por consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem consumidos em processo de industrialização de outros produtos, na produção rural, na prestação de serviços ou por usuário final.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.657",
                "descricao"=> "Retorno de remessa de combustíveis ou lubrificantes para venda fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de combustíveis ou lubrificantes remetidos para venda fora do estabelecimento, inclusive por meio de veículos, e não comercializados",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.658",
                "descricao"=> "Transferência de combustíveis e lubrificantes para industrialização.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis e lubrificantes recebidas em transferência de outro estabelecimento da mesma empresa para serem utilizados em processo de industrialização do próprio produto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.659",
                "descricao"=> "Transferência de combustíveis e lubrificantes para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis e lubrificantes recebidas em transferência de outro estabelecimento da mesma empresa para serem comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.660",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes destinados à industrialização subsequente”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.661",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados à comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes para comercialização”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.662",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes por consumidor ou usuário final”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.663",
                "descricao"=> "Entrada de combustíveis ou lubrificantes para armazenagem.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis ou lubrificantes para armazenagem.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.664",
                "descricao"=> "Retorno de combustíveis ou lubrificantes remetidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as entradas, ainda que simbólicas, por retorno de combustíveis ou lubrificantes, remetidos para armazenagem.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.901",
                "descricao"=> "Entrada para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as entradas de insumos recebidos para industrialização por encomenda de outra empresa ou de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.902",
                "descricao"=> "Retorno de mercadoria remetida para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código o retorno dos insumos remetidos para industrialização por encomenda, incorporados ao produto final pelo estabelecimento industrializador.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.903",
                "descricao"=> "Entrada de mercadoria remetida para industrialização e não aplicada no referido processo.",
                "observacao"=> "Classificam-se neste código as entradas em devolução de insumos remetidos para industrialização e não aplicados no referido processo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.904",
                "descricao"=> "Retorno de remessa para venda fora do estabelecimento, ou qualquer entrada e retorno de remessa efetuada pelo MEI com exceção dos classificados nos códigos 1.202, 1.503, 1.504, 1.505 e 1.506.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias remetidas para venda fora do estabelecimento, inclusive por meio de veículos, e não comercializadas. Também serão classificadas neste código quaisquer entradas e retornos de remessa efetuadas pelo MEI com exceção dos classificados nos códigos “1.202 - Devolução de venda de mercadoria adquirida ou recebida de terceiros, ou qualquer devolução de mercadoria efetuada pelo MEI com exceção das classificadas nos códigos 1.503, 1.504, 1.505 e 1.506”,“1.503 - Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento”, “1.504 - Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros”, “1.505 - Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “1.506 - Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.905",
                "descricao"=> "Entrada de mercadoria recebida para depósito em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.906",
                "descricao"=> "Retorno de mercadoria remetida para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias remetidas para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.907",
                "descricao"=> "Retorno simbólico de mercadoria remetida para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas em retorno simbólico de mercadorias remetidas para depósito em depósito fechado ou armazém geral, quando as mercadorias depositadas tenham sido objeto de saída a qualquer título e que não tenham retornado ao estabelecimento depositante.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.908",
                "descricao"=> "Entrada de bem por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as entradas de bens recebidos em cumprimento de contrato de comodato ou locação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.909",
                "descricao"=> "Retorno de bem remetido por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as entradas de bens recebidos em devolução após cumprido o contrato de comodato ou locação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.910",
                "descricao"=> "Entrada de bonificação, doação ou brinde.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de bonificação, doação ou brinde.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.911",
                "descricao"=> "Entrada de amostra grátis.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de amostra grátis.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.912",
                "descricao"=> "Entrada de mercadoria ou bem recebido para demonstração ou mostruário.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias ou bens recebidos para demonstração ou mostruário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.913",
                "descricao"=> "Retorno de mercadoria ou bem remetido para demonstração, mostruário ou treinamento.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para demonstração, mostruário ou treinamento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.914",
                "descricao"=> "Retorno de mercadoria ou bem remetido para exposição ou feira.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para exposição ou feira.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.915",
                "descricao"=> "Entrada de mercadoria ou bem recebido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias ou bens recebidos para conserto ou reparo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.916",
                "descricao"=> "Retorno de mercadoria ou bem remetido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para conserto ou reparo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.917",
                "descricao"=> "Entrada de mercadoria recebida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.918",
                "descricao"=> "Devolução de mercadoria remetida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas por devolução de mercadorias remetidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.919",
                "descricao"=> "Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, remetida anteriormente em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas por devolução simbólica de mercadorias vendidas ou utilizadas em processo industrial, remetidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.920",
                "descricao"=> "Entrada de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "observacao"=> "Classificam-se neste código as entradas de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.921",
                "descricao"=> "Retorno de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.922",
                "descricao"=> "Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de simples faturamento decorrente de compra para recebimento futuro.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.923",
                "descricao"=> "Entrada de mercadoria recebida do vendedor remetente, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas do vendedor remetente, em vendas à ordem, cuja compra do adquirente originário, foi classificada nos códigos “1.120 - Compra para industrialização, em venda à ordem, já recebida do vendedor remetente” ou “1.121 - Compra para comercialização, em venda à ordem, já recebida do vendedor remetente”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.924",
                "descricao"=> "Entrada para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as entradas de insumos recebidos para serem industrializados por conta e ordem do adquirente, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente dos mesmos.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.925",
                "descricao"=> "Retorno de mercadoria remetida para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código o retorno dos insumos remetidos por conta e ordem do adquirente, para industrialização e incorporados ao produto final pelo estabelecimento industrializador, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.926",
                "descricao"=> "Lançamento efetuado a título de reclassificação de mercadoria decorrente de formação de kit ou de sua desagregação.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de reclassificação decorrente de formação de kit de mercadorias ou de sua desagregação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.931",
                "descricao"=> "Lançamento efetuado pelo tomador do serviço de transporte quando a responsabilidade de retenção do imposto for atribuída ao remetente ou alienante da mercadoria, pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "observacao"=> "Classificam-se neste código exclusivamente os lançamentos efetuados pelo tomador do serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação, onde iniciado o serviço, quando a responsabilidade pela retenção do imposto for atribuída ao remetente ou alienante da mercadoria.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.932",
                "descricao"=> "Aquisição de serviço de transporte iniciado em unidade da Federação diversa daquela onde inscrito o prestador.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte que tenham sido iniciados em unidade da Federação diversa daquela onde o prestador está inscrito como contribuinte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.933",
                "descricao"=> "Aquisição de serviço tributado pelo ISSQN.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços, de competência municipal, desde que informado sem Nota Fiscal modelo 1 ou 1-A.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.934",
                "descricao"=> "Entrada simbólica de mercadoria recebida para depósito em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas simbólicas de mercadorias recebidas para depósito em depósito fechado ou armazém geral, cuja remessa tenha sido classificada pelo remetente no código \"5.934 - Remessa simbólica de mercadoria depositada em armazém geral ou depósito fechado”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "1.949",
                "descricao"=> "Outra entrada de mercadoria ou prestação de serviço não especificada",
                "observacao"=> "Classificam-se neste código as outras entradas de mercadorias ou prestações de serviços que não tenham sido especificadas nos códigos anteriores.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "2.101",
                "descricao"=> "Compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.102",
                "descricao"=> "Compra para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.111",
                "descricao"=> "Compra para industrialização de mercadoria recebida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as compras efetivas de mercadorias a serem utilizadas em processo de industrialização, recebidas anteriormente a título de consignação industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.113",
                "descricao"=> "Compra para comercialização, de mercadoria recebida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as compras efetivas de mercadorias recebidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.116",
                "descricao"=> "Compra para industrialização ou produção rural originada de encomenda para recebimento futuro.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural, quando da entrada real da mercadoria, cuja aquisição tenha sido classificada no código \"2.922 - Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.117",
                "descricao"=> "Compra para comercialização originada de encomenda para recebimento futuro.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, quando da entrada real da mercadoria, cuja aquisição tenha sido classificada no código “2.922 - Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.118",
                "descricao"=> "Compra de mercadoria para comercialização pelo adquirente originário, entregue pelo vendedor remetente ao destinatário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias já comercializadas, que, sem transitar pelo estabelecimento do adquirente originário, sejam entregues pelo vendedor remetente diretamente ao destinatário, em operação de venda à ordem, cuja venda seja classificada, pelo adquirente originário, no código “6.120 - Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.120",
                "descricao"=> "Compra para industrialização, em venda à ordem, já recebida do vendedor remetente.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização, em vendas à ordem, já recebidas do vendedor remetente, por ordem do adquirente originário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.121",
                "descricao"=> "Compra para comercialização, em venda à ordem, já recebida do vendedor remetente.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, em vendas à ordem, já recebidas do vendedor remetente por ordem do adquirente originário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.122",
                "descricao"=> "Compra para industrialização em que a mercadoria foi remetida pelo fornecedor ao industrializador sem transitar pelo estabelecimento adquirente.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização, remetidas pelo fornecedor para o industrializador sem que a mercadoria tenha transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.124",
                "descricao"=> "Industrialização efetuada por outra empresa.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias industrializadas por terceiros, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial. Quando a industrialização efetuada se referir a bens do ativo imobilizado ou de mercadorias para uso ou consumo do estabelecimento encomendante, a entrada deverá ser classificada nos códigos “2.551 - Compra de bem para o ativo imobilizado” ou “2.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.125",
                "descricao"=> "Industrialização efetuada por outra empresa quando a mercadoria remetida para utilização no processo de industrialização não transitou pelo estabelecimento adquirente da mercadoria.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias industrializadas por outras empresas, em que as mercadorias remetidas para utilização no processo de industrialização não transitaram pelo estabelecimento do adquirente das mercadorias, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial. Quando a industrialização efetuada se referir a bens do ativo imobilizado ou de mercadorias para uso ou consumo do estabelecimento encomendante, a entrada deverá ser classificada nos códigos “2.551 - Compra de bem para o ativo imobilizado” ou “2.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.126",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ICMS.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ICMS.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.128",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ISSQN.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ISSQN.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.131",
                "descricao"=> "Entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, decorrente de operação de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias, com previsão de posterior ajuste ou fixação de preço, proveniente de cooperado, bem como proveniente de outra cooperativa, em que a saída tenha sido classificada no código “6.131 - Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.132",
                "descricao"=> "Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, em ato cooperativo, para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas para comercialização referentes à fixação de preço de produção do estabelecimento do produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo cuja saída tenha sido classificada no código “6.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.135",
                "descricao"=> "Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, em ato cooperativo, para industrialização.",
                "observacao"=> "Classificam-se neste código as entradas para industrialização referentes à fixação de preço de produção do estabelecimento do produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo cuja saída tenha sido classificada no código “6.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.151",
                "descricao"=> "Transferência para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.152",
                "descricao"=> "Transferência para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.153",
                "descricao"=> "Transferência de energia elétrica para distribuição.",
                "observacao"=> "Classificam-se neste código as entradas de energia elétrica recebida em transferência de outro estabelecimento da mesma empresa, para distribuição.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.154",
                "descricao"=> "Transferência para utilização na prestação de serviço.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem utilizadas nas prestações de serviços.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.159",
                "descricao"=> "Entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as entradas decorrentes de fornecimento de produtos ou mercadorias por estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujo fornecimento tenha sido classificado no código \"6.159 - Fornecimento de produção do estabelecimento de ato cooperativo” ou “6.160 - Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.201",
                "descricao"=> "Devolução de venda de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas tenham sido classificadas como \"6.101 - Venda de produção do estabelecimento\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.202",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros, ou qualquer devolução de mercadoria efetuada pelo MEI com exceção das classificadas nos códigos 2.503, 2.504, 2.505 e 2.506.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de industrialização no estabelecimento, cujas saídas tenham sido classificadas como “Venda de mercadoria adquirida ou recebida de terceiros”. Também serão classificadas neste código quaisquer devoluções de mercadorias efetuadas pelo MEI com exceção das classificadas nos códigos “2.503 - Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento”, “2.504 - Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros”, “2.505 - Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “2.506 - Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.203",
                "descricao"=> "Devolução de venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas foram classificadas no código \"6.109 - Venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio”. Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.204",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, cujas saídas foram classificadas no código “6.110 - Venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio”. Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.205",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.206",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.207",
                "descricao"=> "Anulação de valor relativo à venda de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de venda de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.208",
                "descricao"=> "Devolução de produção do estabelecimento, remetida em transferência.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, transferidos para outros estabelecimentos da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.209",
                "descricao"=> "Devolução de mercadoria adquirida ou recebida de terceiros, remetida em transferência.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas ou recebidas de terceiros, transferidas para outros estabelecimentos da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.212",
                "descricao"=> "Devolução de venda no mercado interno de mercadoria industrializada e insumo importado sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados e insumos importados pelo estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.213",
                "descricao"=> "Devolução de remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, em ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de remessa que tenham sido classificadas no código “6.131 - Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.214",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de produção do estabelecimento produtor cuja saída tenha sido classificada no código “6.132 - Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.215",
                "descricao"=> "Devolução de fornecimento de produção do estabelecimento de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de fornecimentos de produtos industrializados ou produzidos pelo próprio estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujas saídas tenham sido classificadas no código “6.159 - Fornecimento de produção do estabelecimento de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.216",
                "descricao"=> "Devolução de fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de fornecimentos de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento de cooperativa, destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujas saídas tenham sido classificadas no código “6.160 - Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.251",
                "descricao"=> "Compra de energia elétrica para distribuição ou comercialização.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada em sistema de distribuição ou comercialização. Também serão classificadas neste código as compras de energia elétrica por cooperativas para distribuição aos seus cooperados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.252",
                "descricao"=> "Compra de energia elétrica por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada no processo de industrialização. Também serão classificadas neste código as compras de energia elétrica utilizada por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.253",
                "descricao"=> "Compra de energia elétrica por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento comercial. Também serão classificadas neste código as compras de energia elétrica utilizada por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.254",
                "descricao"=> "Compra de energia elétrica por estabelecimento prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento prestador de serviços de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.255",
                "descricao"=> "Compra de energia elétrica por estabelecimento prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.256",
                "descricao"=> "Compra de energia elétrica por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.257",
                "descricao"=> "Compra de energia elétrica para consumo por demanda contratada.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica para consumo por demanda contratada, que prevalecerá sobre os demais códigos deste subgrupo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.301",
                "descricao"=> "Aquisição de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.302",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento industrial. Também serão classificadas neste código as aquisições de serviços de comunicação utilizados por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.303",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento comercial. Também serão classificadas neste código as aquisições de serviços de comunicação utilizados por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.304",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizado por estabelecimento prestador de serviço de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.305",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.306",
                "descricao"=> "Aquisição de serviço de comunicação por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.351",
                "descricao"=> "Aquisição de serviço de transporte para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.352",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.353",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.354",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.355",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.356",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.401",
                "descricao"=> "Compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural, decorrentes de operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.403",
                "descricao"=> "Compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas, decorrentes de operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.406",
                "descricao"=> "Compra de bem para o ativo imobilizado cuja mercadoria está sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de bens destinados ao ativo imobilizado do estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.407",
                "descricao"=> "Compra de mercadoria para uso ou consumo cuja mercadoria está sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias destinadas ao uso ou consumo do estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.408",
                "descricao"=> "Transferência para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem industrializadas ou consumidas na produção rural no estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.409",
                "descricao"=> "Transferência para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas, decorrentes de operações sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.410",
                "descricao"=> "Devolução de venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas tenham sido classificadas como \"Venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.411",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, cujas saídas tenham sido classificadas como “Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.414",
                "descricao"=> "Retorno de produção do estabelecimento, remetida para venda fora do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as entradas, em retorno, de produtos industrializados ou produzidos pelo próprio estabelecimento, remetidos para vendas fora do estabelecimento, inclusive por meio de veículos, em operações com produtos sujeitos ao regime de substituição tributária, e não comercializadas",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.415",
                "descricao"=> "Retorno de mercadoria adquirida ou recebida de terceiros, remetida para venda fora do estabelecimento em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as entradas, em retorno, de mercadorias adquiridas ou recebidas de terceiros remetidas para vendas fora do estabelecimento, inclusive por meio de veículos, em operações com mercadorias sujeitas ao regime de substituição tributária, e não comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.451",
                "descricao"=> "Entrada de animal - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas de animais pelo sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as entradas do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.452",
                "descricao"=> "Entrada de insumo - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas de insumos pelo sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as entradas do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.453",
                "descricao"=> "Retorno do animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes ao retorno da produção, bem como dos animais criados, recriados ou engordados pelo produtor no sistema integrado e de produção animal, cujas saídas tenham sido classificadas no código “6.453 - Retorno de animal ou da produção - Sistema de Integração e Parceria Rural”. Também serão classificados neste código as entradas referentes aos retornos do sistema de integração e produção animal decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.454",
                "descricao"=> "Retorno simbólico do animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes ao retorno simbólico da produção, bem como dos animais criados, recriados ou engordados pelo produtor no sistema integrado e de produção animal, cujas saídas tenham sido classificadas no código “6.454 - Retorno simbólico de animal ou da produção - Sistema de Integração e Parceria Rural”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.455",
                "descricao"=> "Retorno de insumo não utilizado na produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas referentes aos retornos de insumos não utilizados pelo produtor na criação, recriação ou engorda de animais pelo sistema integrado e de produção animal, cujas saídas tenham sido classificadas no código “6.455 - Retorno de insumos não utilizados na produção - Sistema de Integração e Parceria Rural”, inclusive as o-perações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.456",
                "descricao"=> "Entrada referente a remuneração do produtor no Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as entradas da parcela da produção do produtor realizadas em sistema de integração e produção animal, quando da entrega ao integrador ou parceiro. Também serão classificadas neste código as entradas decorrentes de “ato cooperativo”, inclu-sive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.501",
                "descricao"=> "Entrada de mercadoria recebida com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias em estabelecimento de trading com-pany, empresa comercial exportadora ou outro estabelecimento do remetente, com fim específico de exportação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.503",
                "descricao"=> "Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções de produtos industrializados ou produzidos pelo próprio estabelecimento, remetidos a trading company, a empresa comercial exportadora ou a outro estabelecimento do remetente, com fim específico de exportação, cujas saídas tenham sido classificadas no código \"6.501 - Remessa de produção do estabelecimento, com fim específico de exportação\".",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.504",
                "descricao"=> "Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas ou recebidas de terceiros remetidas a trading company, a empresa comercial exportadora ou a outro estabelecimento do remetente, com fim específico de exportação, cujas saídas tenham sido classificadas no código “6.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.505",
                "descricao"=> "Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas ou físicas de mercadorias, bem como o retorno de mercadorias não entregues, remetidas para formação de lote de exportação, cujas saídas tenham sido classificadas no código “6.504 - Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.506",
                "descricao"=> "Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação.",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas ou físicas de mercadorias, bem como o retorno de mercadorias não entregues, remetidas para formação de lote de exportação em armazéns alfandegados, entrepostos aduaneiros ou outros estabelecimentos que venham a ser regulamentados pela legislação tributária de cada Unidade Federada, efetuadas pelo estabelecimento depositário, cujas saídas tenham sido classificadas no código “6.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de ex-portação”.”",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.551",
                "descricao"=> "Compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as compras de bens destinados ao ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.552",
                "descricao"=> "Transferência de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as entradas de bens destinados ao ativo imobilizado recebidos em transferência de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.553",
                "descricao"=> "Devolução de venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de bens do ativo imobilizado, cujas saídas tenham sido classificadas no código “6.551 - Venda de bem do ativo imobilizado”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.554",
                "descricao"=> "Retorno de bem do ativo imobilizado remetido para uso fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas por retorno de bens do ativo imobilizado remetidos para uso fora do estabelecimento, cujas saídas tenham sido classificadas no código “6.554 - Remessa de bem do ativo imobilizado para uso fora do estabelecimento”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.555",
                "descricao"=> "Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas de bens do ativo imobilizado de terceiros, remetidos para uso no estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.556",
                "descricao"=> "Compra de material para uso ou consumo.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias destinadas ao uso ou consumo do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.557",
                "descricao"=> "Transferência de material para uso ou consumo.",
                "observacao"=> "Classificam-se neste código as entradas de materiais para uso ou consumo recebidos em transferência de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.603",
                "descricao"=> "Ressarcimento de ICMS retido por substituição tributária.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de ressarcimento de ICMS retido por substituição tributária a contribuinte substituído, efetuado pelo contribuinte substituto, nas hipóteses previstas na legislação aplicável.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.651",
                "descricao"=> "Compra de combustíveis ou lubrificantes para industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem utilizados em processo de industrialização do próprio produto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.652",
                "descricao"=> "Compra de combustíveis ou lubrificantes para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.653",
                "descricao"=> "Compra de combustíveis ou lubrificantes por consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem consumidos em processo de industrialização de outros produtos, na produção rural, na prestação de serviços ou por usuário final.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.657",
                "descricao"=> "Retorno de remessa de combustíveis ou lubrificantes para venda fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de combustíveis ou lubrificantes remetidos para venda fora do estabelecimento, inclusive por meio de veículos, e não comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.658",
                "descricao"=> "Transferência de combustíveis e lubrificantes para industrialização.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis e lubrificantes recebidas em transferência de outro estabelecimento da mesma empresa para serem utilizados em processo de industrialização do próprio produto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.659",
                "descricao"=> "Transferência de combustíveis e lubrificantes para comercialização.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis e lubrificantes recebidas em transferência de outro estabelecimento da mesma empresa para serem comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.660",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes destinados à industrialização subsequente”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.661",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados à comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes para comercialização”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.662",
                "descricao"=> "Devolução de venda de combustíveis ou lubrificantes destinados a consumidor ou usuário final",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de combustíveis ou lubrificantes, cujas saídas tenham sido classificadas como “Venda de combustíveis ou lubrificantes por consumidor ou usuário final”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.663",
                "descricao"=> "Entrada de combustíveis ou lubrificantes para armazenagem.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis ou lubrificantes para armazenagem.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.664",
                "descricao"=> "Retorno de combustíveis ou lubrificantes remetidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as entradas, ainda que simbólicas, por retorno de combustíveis ou lubrificantes, remetidos para armazenagem.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.901",
                "descricao"=> "Entrada para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as entradas de insumos recebidos para industrialização por encomenda de outra empresa ou de outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.902",
                "descricao"=> "Retorno de mercadoria remetida para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código o retorno dos insumos remetidos para industrialização por encomenda, incorporados ao produto final pelo estabelecimento industrializador.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.903",
                "descricao"=> "Entrada de mercadoria remetida para industrialização e não aplicada no referido processo.",
                "observacao"=> "Classificam-se neste código as entradas em devolução de insumos remetidos para industrialização e não aplicados no referido processo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.904",
                "descricao"=> "Retorno de remessa para venda fora do estabelecimento, ou qualquer entrada e retorno de remessa efetuada pelo MEI com exceção dos classificados nos códigos 2.202, 2.503, 2.504, 2.505 e 2.506.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias remetidas para venda fora do estabelecimento, inclusive por meio de veículos, e não comercializadas. Também serão classificadas neste código quaisquer entradas e retornos de remessa efetuadas pelo MEI com exceção dos classificados nos códigos “2.202 - Devolução de venda de mercadoria adquirida ou recebida de terceiros, ou qualquer devolução de mercadoria efetuada pelo MEI com exceção das classificadas nos códigos 2.503, 2.504, 2.505 e 2.506”,“2.503 - Entrada decorrente de devolução de produto remetido com fim específico de exportação, de produção do estabelecimento”, “2.504 - Entrada decorrente de devolução de mercadoria remetida com fim específico de exportação, adquirida ou recebida de terceiros”, “2.505 - Entrada decorrente de devolução de mercadorias remetidas para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “2.506 - Entrada decorrente de devolução de mercadorias, adquiridas ou recebidas de terceiros, remetidas para formação de lote de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.905",
                "descricao"=> "Entrada de mercadoria recebida para depósito em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.906",
                "descricao"=> "Retorno de mercadoria remetida para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias remetidas para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.907",
                "descricao"=> "Retorno simbólico de mercadoria remetida para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas em retorno simbólico de mercadorias remetidas para depósito em depósito fechado ou armazém geral, quando as mercadorias depositadas tenham sido objeto de saída a qualquer título e que não tenham retornado ao estabelecimento depositante.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.908",
                "descricao"=> "Entrada de bem por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as entradas de bens recebidos em cumprimento de contrato de comodato ou locação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.909",
                "descricao"=> "Retorno de bem remetido por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as entradas de bens recebidos em devolução após cumprido o contrato de comodato ou locação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.910",
                "descricao"=> "Entrada de bonificação, doação ou brinde.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de bonificação, doação ou brinde.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.911",
                "descricao"=> "Entrada de amostra grátis.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de amostra grátis.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.912",
                "descricao"=> "Entrada de mercadoria ou bem recebido para demonstração ou mostruário.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias ou bens recebidos para demonstração ou mostruário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.913",
                "descricao"=> "Retorno de mercadoria ou bem remetido para demonstração, mostruário ou treinamento.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para demonstração, mostruário ou treinamento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.914",
                "descricao"=> "Retorno de mercadoria ou bem remetido para exposição ou feira.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para exposição ou feira.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.915",
                "descricao"=> "Entrada de mercadoria ou bem recebido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias ou bens recebidos para conserto ou reparo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.916",
                "descricao"=> "Retorno de mercadoria ou bem remetido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de mercadorias ou bens remetidos para conserto ou reparo.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.917",
                "descricao"=> "Entrada de mercadoria recebida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.918",
                "descricao"=> "Devolução de mercadoria remetida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas por devolução de mercadorias remetidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.919",
                "descricao"=> "Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, remetida anteriormente em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as entradas por devolução simbólica de mercadorias vendidas ou utilizadas em processo industrial, remetidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.920",
                "descricao"=> "Entrada de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "observacao"=> "Classificam-se neste código as entradas de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.921",
                "descricao"=> "Retorno de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "observacao"=> "Classificam-se neste código as entradas em retorno de embalagens, bombonas, vasilhames, sacarias, pallets ou assemelhados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.922",
                "descricao"=> "Lançamento efetuado a título de simples faturamento decorrente de compra para recebimento futuro.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de simples faturamento decorrente de compra para recebimento futuro.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.923",
                "descricao"=> "Entrada de mercadoria recebida do vendedor remetente, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias recebidas do vendedor remetente, em vendas à ordem, cuja compra do adquirente originário, foi classificada nos códigos “2.120 - Compra para industrialização, em venda à ordem, já recebida do vendedor remetente” ou “2.121 - Compra para comercialização, em venda à ordem, já recebida do vendedor remetente”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.924",
                "descricao"=> "Entrada para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as entradas de insumos recebidos para serem industrializados por conta e ordem do adquirente, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente dos mesmos.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.925",
                "descricao"=> "Retorno de mercadoria remetida para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código o retorno dos insumos remetidos por conta e ordem do adquirente, para industrialização e incorporados ao produto final pelo estabelecimento industrializador, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.931",
                "descricao"=> "Lançamento efetuado pelo tomador do serviço de transporte quando a responsabilidade de retenção do imposto for atribuída ao remetente ou alienante da mercadoria, pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "observacao"=> "Classificam-se neste código exclusivamente os lançamentos efetuados pelo tomador do serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação, onde iniciado o serviço, quando a responsabilidade pela retenção do imposto for atribuída ao remetente ou alienante da mercadoria.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.932",
                "descricao"=> "Aquisição de serviço de transporte iniciado em unidade da Federação diversa daquela onde inscrito o prestador.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte que tenham sido iniciados em unidade da Federação diversa daquela onde o prestador está inscrito como contribuinte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.933",
                "descricao"=> "Aquisição de serviço tributado pelo ISSQN.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços, de competência municipal, desde que informado sem Nota Fiscal modelo 1 ou 1-A.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.934",
                "descricao"=> "Entrada simbólica de mercadoria recebida para para depósito em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as entradas simbólicas de mercadorias recebidas para depósito em depósito fechado ou armazém geral, cuja remessa tenha sido classificada pelo remetente no código \"6.934 - Remessa simbólica de mercadoria depositada em armazém geral ou depósito fechado.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "2.949",
                "descricao"=> "Outra entrada de mercadoria ou prestação de serviço não especificado.",
                "observacao"=> "Classificam-se neste código as outras entradas de mercadorias ou prestações de serviços que não tenham sido especificados nos códigos anteriores.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "3.101",
                "descricao"=> "Compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.102",
                "descricao"=> "Compra para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem comercializadas.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.126",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ICMS",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ICMS.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.127",
                "descricao"=> "Compra para industrialização sob o regime de “drawback”",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem utilizadas em processo de industrialização e posterior exportação do produto resultante, cujas vendas serão classificadas no código “7.127 - Venda de produção do estabelecimento sob o regime de “drawback””.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.128",
                "descricao"=> "Compra para utilização na prestação de serviço sujeita ao ISSQN.",
                "observacao"=> "Classificam-se neste código as entradas de mercadorias a serem utilizadas nas prestações de serviços sujeitas ao ISSQN.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.129",
                "descricao"=> "Compra para industrialização sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as compras de mercadorias a serem submetidas a operações de industrialização de produtos, partes ou peças destinados à exportação ou ao mercado interno sob o amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.201",
                "descricao"=> "Devolução de venda de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, cujas saídas tenham sido classificadas como \"Venda de produção do estabelecimento\". Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.202",
                "descricao"=> "Devolução de venda de mercadoria adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de industrialização no estabelecimento, cujas saídas tenham sido classificadas como “Venda de mercadoria adquirida ou recebida de terceiros”. Também serão classificados neste código os retornos de mercadorias não entregues ao destinatário.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.205",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.206",
                "descricao"=> "Anulação de valor relativo à prestação de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de prestações de serviços de transporte.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.207",
                "descricao"=> "Anulação de valor relativo à venda de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes de venda de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.211",
                "descricao"=> "Devolução de venda de produção do estabelecimento sob o regime de “drawback”.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados pelo estabelecimento sob o regime de “drawback”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.212",
                "descricao"=> "Devolução de venda no mercado externo de mercadoria industrializada sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de produtos industrializados pelo estabelecimento, cujas saídas tenham sido classificadas como “Venda de produção do estabelecimento ao mercado externo de mercadoria industrializada sob o amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped)”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.251",
                "descricao"=> "Compra de energia elétrica para distribuição ou comercialização.",
                "observacao"=> "Classificam-se neste código as compras de energia elétrica utilizada em sistema de distribuição ou comercialização. Também serão classificadas neste código as compras de energia elétrica por cooperativas para distribuição aos seus cooperados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.301",
                "descricao"=> "Aquisição de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de comunicação utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.351",
                "descricao"=> "Aquisição de serviço de transporte para execução de serviço da mesma natureza",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados nas prestações de serviços da mesma natureza.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.352",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.353",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial. Também serão classificadas neste código as aquisições de serviços de transporte utilizados por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.354",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.355",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.356",
                "descricao"=> "Aquisição de serviço de transporte por estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as aquisições de serviços de transporte utilizados por estabelecimento de produtor rural.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.503",
                "descricao"=> "Devolução de mercadoria exportada que tenha sido recebida com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias exportadas por trading company, empresa comercial exportadora ou outro estabelecimento do remetente, recebidas com fim específico de exportação, cujas saídas tenham sido classificadas no código “7.501 - Exportação de mercadorias recebidas com fim específico de exportação”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.551",
                "descricao"=> "Compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as compras de bens destinados ao ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.552",
                "descricao"=> "Entrada de produtos destinados ao uso ou consumo de bordo, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior.",
                "observacao"=> "Classificam-se neste código as entradas de produtos destinados ao uso ou consumo de bordo, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior, cuja operação tenha sido equiparada a uma exportação classificada no código “7.552 - Saída de produtos destinados ao uso ou consumo de bordo, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.553",
                "descricao"=> "Devolução de venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de vendas de bens do ativo imobilizado, cujas saídas tenham sido classificadas no código “7.551 - Venda de bem do ativo imobilizado”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.556",
                "descricao"=> "Compra de material para uso ou consumo.",
                "observacao"=> "Classificam-se neste código as compras de mercadorias destinadas ao uso ou consumo do estabelecimento.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.651",
                "descricao"=> "Compra de combustíveis ou lubrificantes para industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem utilizados em processo de industrialização do próprio produto.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.652",
                "descricao"=> "Compra de combustíveis ou lubrificantes para comercialização.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem comercializados.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.653",
                "descricao"=> "Compra de combustíveis ou lubrificantes por consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as compras de combustíveis ou lubrificantes a serem consumidos em processo de industrialização de outros produtos, na produção rural, na prestação de serviços ou por usuário final.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.667",
                "descricao"=> "Entrada de combustíveis ou lubrificantes para consumo final, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior.",
                "observacao"=> "Classificam-se neste código as entradas de combustíveis ou lubrificantes para consumo final, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior, cuja operação tenha sido equiparada a uma exportação classificada no código “7.667 - Venda de combustíveis ou lubrificantes a consumidor ou usuário final”.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.930",
                "descricao"=> "Lançamento efetuado a título de entrada de bem sob amparo de regime especial aduaneiro de admissão temporária.",
                "observacao"=> "Classificam-se neste código os lançamentos efetuados a título de entrada de bens amparada por regime especial aduaneiro de admissão temporária.",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "3.949",
                "descricao"=> "Outra entrada de mercadoria ou prestação de serviço não especificado.",
                "observacao"=> "DAS SAÍDAS DE MERCADORIAS, BENS OU PRESTAÇÃO DE SERVIÇOS",
                "tipooperacao"=> "ENTRADA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "5.101",
                "descricao"=> "Venda de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.102",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, ou qualquer venda de mercadoria efetuada pelo MEI com exceção das saídas classificadas nos códigos 5.501, 5.502, 5.504 e 5.505.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento. Também serão classificadas neste código quaisquer vendas de mercadorias efetuadas pelo MEI com exceção das saídas classificadas nos códigos “5.501 - Remessa de produção do estabelecimento, com fim específico de exportação”, “5.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação”, “5.504 - Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “5.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.103",
                "descricao"=> "Venda de produção do estabelecimento, efetuada fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas efetuadas fora do estabelecimento, inclusive por meio de veículo, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.104",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, efetuada fora do estabelecimento",
                "observacao"=> "Classificam-se neste código as vendas efetuadas fora do estabelecimento, inclusive por meio de veículo, de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.105",
                "descricao"=> "Venda de produção do estabelecimento que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento, armazenados em depósito fechado, armazém geral ou outro sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.106",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, armazenadas em depósito fechado, armazém geral ou outro, que não tenham sido objeto de qualquer processo industrial no estabelecimento sem que haja retorno ao estabelecimento depositante. Também serão classificadas neste código as vendas de mercadorias importadas, cuja saída ocorra do recinto alfandegado ou da repartição alfandegária onde se processou o desembaraço aduaneiro, com destino ao estabelecimento do comprador, sem transitar pelo estabelecimento do importador.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.109",
                "descricao"=> "Venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, destinados à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.110",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, destinadas à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.111",
                "descricao"=> "Venda de produção do estabelecimento remetida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de produtos industrializados no estabelecimento remetidos anteriormente a título de consignação industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.112",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros remetida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas anteriormente a título de consignação industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.113",
                "descricao"=> "Venda de produção do estabelecimento remetida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de produtos industrializados no estabelecimento remetidos anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.114",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros remetida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.115",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, recebida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, recebidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.116",
                "descricao"=> "Venda de produção do estabelecimento originada de encomenda para entrega futura.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento, quando da saída real do produto, cujo faturamento tenha sido classificado no código \"5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura\".",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.117",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, originada de encomenda para entrega futura.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, quando da saída real da mercadoria, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.118",
                "descricao"=> "Venda de produção do estabelecimento entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de produtos industrializados pelo estabelecimento, entregues ao destinatário por conta e ordem do adquirente originário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.119",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, entregues ao destinatário por conta e ordem do adquirente originário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.120",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, entregues pelo vendedor remetente ao destinatário, cuja compra seja classificada, pelo adquirente originário, no código “1.118 - Compra de mercadoria para comercialização pelo adquirente originário, entregue pelo vendedor remetente ao destinatário, em venda à ordem”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.122",
                "descricao"=> "Venda de produção do estabelecimento remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento, remetidos para serem industrializados em outro estabelecimento, por conta e ordem do adquirente, sem que os produtos tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.123",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas para serem industrializadas em outro estabelecimento, por conta e ordem do adquirente, sem que as mercadorias tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.124",
                "descricao"=> "Industrialização efetuada para outra empresa.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias industrializadas para terceiros, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.125",
                "descricao"=> "Industrialização efetuada para outra empresa quando a mercadoria recebida para utilização no processo de industrialização não transitar pelo estabelecimento adquirente da mercadoria.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias industrializadas para outras empresas, em que as mercadorias recebidas para utilização no processo de industrialização não tenham transitado pelo estabelecimento do adquirente das mercadorias, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.129",
                "descricao"=> "Venda de insumo importado e de mercadoria industrializada sob o amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as vendas de insumos importados e de produtos industrializados pelo próprio estabelecimento sob amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.131",
                "descricao"=> "Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as saídas de produção de cooperativa, de estabelecimento de cooperado, com previsão de posterior ajuste ou fixação de preço.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.132",
                "descricao"=> "Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código a fixação de preço de produção do estabelecimento do produtor, inclusive quando cuja remessa anterior tenha sido classificada no código “5.131 - Remessa de produção do estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.151",
                "descricao"=> "Transferência de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código os produtos industrializados ou produzidos pelo estabelecimento em transferência para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.152",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as mercadorias adquiridas ou recebidas de terceiros para industrialização, comercialização ou para utilização na prestação de serviços e que não tenham sido objeto de qualquer processo industrial no estabelecimento, transferidas para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.153",
                "descricao"=> "Transferência de energia elétrica.",
                "observacao"=> "Classificam-se neste código as transferências de energia elétrica para outro estabelecimento da mesma empresa, para distribuição.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.155",
                "descricao"=> "Transferência de produção do estabelecimento, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de produtos industrializados no estabelecimento que tenham sido remetidos para armazém geral, depósito fechado ou outro, sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.156",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial, remetidas para armazém geral, depósito fechado ou outro, sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.159",
                "descricao"=> "Fornecimento de produção do estabelecimento de ato cooperativo.",
                "observacao"=> "Classificam-se neste código os fornecimentos de produtos industrializados ou produzidos pelo próprio estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.160",
                "descricao"=> "Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo.",
                "observacao"=> "Classificam-se neste código os fornecimentos de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento de cooperativa, destinados a seus cooperados ou a estabelecimento de outra cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.201",
                "descricao"=> "Devolução de compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização ou produção rural, cujas entradas tenham sido classificadas como \"1.101 - Compra para industrialização ou produção rural\".",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.202",
                "descricao"=> "Devolução de compra para comercialização, ou qualquer devolução de mercadorias efetuada pelo MEI com exceção das classificadas no código 5.503.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem comercializadas, cujas entradas tenham sido classificadas como “Compra para comercialização”. Também serão classificadas neste código quaisquer devoluções de mercadorias efetuadas pelo MEI com exceção das classificadas no código “5.503 - Devolução de mercadoria recebida com fim específico de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.205",
                "descricao"=> "Anulação de valor relativo a aquisição de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.206",
                "descricao"=> "Anulação de valor relativo a aquisição de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.207",
                "descricao"=> "Anulação de valor relativo à compra de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes da compra de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.208",
                "descricao"=> "Devolução de mercadoria recebida em transferência para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas em transferência de outros estabelecimentos da mesma empresa, para serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.209",
                "descricao"=> "Devolução de mercadoria recebida em transferência para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.210",
                "descricao"=> "Devolução de compra para utilização na prestação de serviço.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para utilização na prestação de serviços, cujas entradas tenham sido classificadas nos códigos “1.126 - Compra para utilização na prestação de serviço sujeita ao ICMS” e “1.128 - Compra para utilização na prestação de serviço sujeita ao ISSQN”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.213",
                "descricao"=> "Devolução de entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, em ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de entradas que tenham sido classificadas no código “1.131 - Entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, decorrente de operação de ato cooperativo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.214",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de mercadorias do estabelecimento produtor cuja entrada para comercialização tenha sido classificada no código “1.132 - Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para comercialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.215",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para industrialização.",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de mercadorias do estabelecimento produtor cuja entrada para industrialização tenha sido classificada no código “1.135 - Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para industrialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.216",
                "descricao"=> "Devolução de entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de entradas decorrentes de fornecimento de produtos ou mercadorias por estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujo fornecimento tenha sido classificado no código 1.159 - Entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.251",
                "descricao"=> "Venda de energia elétrica para distribuição ou comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica destinada à distribuição ou comercialização. Também serão classificadas neste código as vendas de energia elétrica destinada a cooperativas para distribuição aos seus cooperados.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.252",
                "descricao"=> "Venda de energia elétrica para estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento industrial. Também serão classificadas neste código as vendas de energia elétrica destinada a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.253",
                "descricao"=> "Venda de energia elétrica para estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento comercial. Também serão classificadas neste código as vendas de energia elétrica destinada a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.254",
                "descricao"=> "Venda de energia elétrica para estabelecimento prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de prestador de serviços de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.255",
                "descricao"=> "Venda de energia elétrica para estabelecimento prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de prestador de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.256",
                "descricao"=> "Venda de energia elétrica para estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.257",
                "descricao"=> "Venda de energia elétrica para consumo por demanda contratada.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por demanda contratada, que prevalecerá sobre os demais códigos deste subgrupo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.258",
                "descricao"=> "Venda de energia elétrica a não contribuinte.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.301",
                "descricao"=> "Prestação de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação destinados às prestações de serviços da mesma natureza.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.302",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento industrial. Também serão classificados neste código os serviços de comunicação prestados a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.303",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento comercial. Também serão classificados neste código os serviços de comunicação prestados a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.304",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento prestador de serviço de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.305",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.306",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.307",
                "descricao"=> "Prestação de serviço de comunicação a não contribuinte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.351",
                "descricao"=> "Prestação de serviço de transporte para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte destinados às prestações de serviços da mesma natureza.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.352",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento industrial. Também serão classificados neste código os serviços de transporte prestados a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.353",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento comercial. Também serão classificados neste código os serviços de transporte prestados a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.354",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.355",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.356",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.357",
                "descricao"=> "Prestação de serviço de transporte a não contribuinte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.359",
                "descricao"=> "Prestação de serviço de transporte a contribuinte ou a não contribuinte quando a mercadoria transportada está dispensada de emissão de nota fiscal.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a contribuintes ou a não contribuintes, exclusivamente quando não existe a obrigação legal de emissão de nota fiscal para a mercadoria transportada.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.360",
                "descricao"=> "Prestação de serviço de transporte a contribuinte substituto em relação ao serviço de transporte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a contribuinte ao qual tenha sido atribuída a condição de substituto tributário do imposto sobre a prestação dos serviços.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.401",
                "descricao"=> "Venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária, na condição de contribuinte substituto.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento em operações com produtos sujeitos ao regime de substituição tributária, na condição de contribuinte substituto.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.402",
                "descricao"=> "Venda de produção do estabelecimento de produto sujeito ao regime de substituição tributária, em operação entre contribuintes substitutos do mesmo produto.",
                "observacao"=> "Classificam-se neste código as vendas de produtos sujeitos ao regime de substituição tributária industrializados no estabelecimento, em operações entre contribuintes substitutos do mesmo produto",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.403",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária, na condição de contribuinte substituto.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, na condição de contribuinte substituto, em operação com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.405",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária, na condição de contribuinte substituído.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros em operação com mercadorias sujeitas ao regime de substituição tributária, na condição de contribuinte substituído.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.408",
                "descricao"=> "Transferência de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código os produtos industrializados ou produzidos no próprio estabelecimento em transferência para outro estabelecimento da mesma empresa de produtos sujeitos ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.409",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de mercadorias adquiridas ou recebidas de terceiros que não tenham sido objeto de qualquer processo industrial no estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.410",
                "descricao"=> "Devolução de compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização ou produção rural cujas entradas tenham sido classificadas como \"Compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.411",
                "descricao"=> "Devolução de compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem comercializadas, cujas entradas tenham sido classificadas como “Compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.412",
                "descricao"=> "Devolução de bem do ativo imobilizado, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de bens adquiridos para integrar o ativo imobilizado do estabelecimento, cuja entrada tenha sido classificada no código “1.406 - Compra de bem para o ativo imobilizado cuja mercadoria está sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.413",
                "descricao"=> "Devolução de mercadoria destinada ao uso ou consumo, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para uso ou consumo do estabelecimento, cuja entrada tenha sido classificada no código “1.407 - Compra de mercadoria para uso ou consumo cuja mercadoria está sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.414",
                "descricao"=> "Remessa de produção do estabelecimento para venda fora do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as remessas de produtos industrializados ou produzidos pelo próprio estabelecimento para serem vendidos fora do estabelecimento, inclusive por meio de veículos, em operações com produtos sujeitos ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.415",
                "descricao"=> "Remessa de mercadoria adquirida ou recebida de terceiros para venda fora do estabelecimento, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias adquiridas ou recebidas de terceiros para serem vendidas fora do estabelecimento, inclusive por meio de veículos, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.451",
                "descricao"=> "Remessa de animal - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes à remessa de animais para criação, recriação, produção ou engorda em estabelecimento de produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento. Também serão classificadas neste código as remessas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.452",
                "descricao"=> "Remessa de insumo - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes à remessa de insumos para utilização em estabelecimento de produtor no sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as remessas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.453",
                "descricao"=> "Retorno de animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno da produção, bem como dos animais criados ou engordados pelo produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento. Também serão classificados neste código os retornos decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.454",
                "descricao"=> "Retorno simbólico de animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno simbólico da produção, bem como de animais criados ou engordados pelo produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.455",
                "descricao"=> "Retorno de insumos não utilizados na produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno de insumos não utilizados em estabelecimento de produtor no sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento e nas operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.456",
                "descricao"=> "Saída referente a remuneração do produtor - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas da parcela da produção do produtor realizadas em sistema de integração e produção animal, quando da entrega ao integrador ou parceiro. Também serão classificadas neste código as saídas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.501",
                "descricao"=> "Remessa de produção do estabelecimento, com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as saídas de produtos industrializados ou produzidos pelo próprio estabelecimento, remetidos com fim específico de exportação a trading company, empresa comercial exportadora ou outro estabelecimento do remetente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.502",
                "descricao"=> "Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias adquiridas ou recebidas de terceiros, remetidas com fim específico de exportação a trading company, empresa comercial exportadora ou outro estabelecimento do remetente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.503",
                "descricao"=> "Devolução de mercadoria recebida com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as devoluções efetuadas por trading company, empresa comercial exportadora ou outro estabelecimento do destinatário, de mercadorias recebidas com fim específico de exportação, cujas entradas tenham sido classificadas no código “1.501 - Entrada de mercadoria recebida com fim específico de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.504",
                "descricao"=> "Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.505",
                "descricao"=> "Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.551",
                "descricao"=> "Venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as vendas de bens integrantes do ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.552",
                "descricao"=> "Transferência de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código os bens do ativo imobilizado transferidos para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.553",
                "descricao"=> "Devolução de compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de bens adquiridos para integrar o ativo imobilizado do estabelecimento, cuja entrada foi classificada no código “1.551 - Compra de bem para o ativo imobilizado”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.554",
                "descricao"=> "Remessa de bem do ativo imobilizado para uso fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de bens do ativo imobilizado para uso fora do estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.555",
                "descricao"=> "Devolução de bem do ativo imobilizado de terceiro, recebido para uso no estabelecimento.",
                "observacao"=> "Classificam-se neste código as saídas em devolução, de bens do ativo imobilizado de terceiros, recebidos para uso no estabelecimento, cuja entrada tenha sido classificada no código “1.555 - Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.556",
                "descricao"=> "Devolução de compra de material de uso ou consumo.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias destinadas ao uso ou consumo do estabelecimento, cuja entrada tenha sido classificada no código “1.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.557",
                "descricao"=> "Transferência de material de uso ou consumo.",
                "observacao"=> "Classificam-se neste código os materiais para uso ou consumo transferidos para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.601",
                "descricao"=> "Transferência de crédito de ICMS acumulado.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da transferência de créditos de ICMS para outras empresas.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.602",
                "descricao"=> "Transferência de saldo credor de ICMS para outro estabelecimento da mesma empresa, destinado à compensação de saldo devedor de ICMS.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da transferência de saldos credores de ICMS para outros estabelecimentos da mesma empresa, destinados à compensação do saldo devedor do estabelecimento, inclusive no caso de apuração centralizada do imposto.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.603",
                "descricao"=> "Ressarcimento de ICMS retido por substituição tributária.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de ressarcimento de ICMS retido por substituição tributária a contribuinte substituído, efetuado pelo contribuinte substituto, nas hipóteses previstas na legislação aplicável.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.605",
                "descricao"=> "Transferência de saldo devedor de ICMS de outro estabelecimento da mesma empresa.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro da transferência de saldo devedor de ICMS para outro estabelecimento da mesma empresa, para efetivação da apuração centralizada do imposto.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.606",
                "descricao"=> "Utilização de saldo credor de ICMS para extinção por compensação de débitos fiscais.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de utilização de saldo credor de ICMS em conta gráfica para extinção por compensação de débitos fiscais desvinculados de conta gráfica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.651",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados à industrialização do próprio produto, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.652",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado à comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados à comercialização, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.653",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados a consumo em processo de industrialização de outros produtos, à prestação de serviços ou a usuário final, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.654",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados à industrialização do próprio produto, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.655",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado à comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados à comercialização, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.656",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados a consumo em processo de industrialização de outros produtos, à prestação de serviços ou a usuário final, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.657",
                "descricao"=> "Remessa de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros para venda fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de combustíveis ou lubrificantes, adquiridos ou recebidos de terceiros para serem vendidos fora do estabelecimento, inclusive por meio de veículos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.658",
                "descricao"=> "Transferência de combustíveis ou lubrificantes de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as transferências de combustíveis ou lubrificantes, industrializados no estabelecimento, para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.659",
                "descricao"=> "Transferência de combustíveis ou lubrificantes adquiridos ou recebidos de terceiro.",
                "observacao"=> "Classificam-se neste código as transferências de combustíveis ou lubrificantes, adquiridos ou recebidos de terceiros, para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.660",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos para industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para industrialização do próprio produto, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes para industrialização subsequente”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.661",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para comercialização, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes para comercialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.662",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos por consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para consumo em processo de industrialização de outros produtos, na prestação de serviços ou por usuário final, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes por consumidor ou usuário final”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.663",
                "descricao"=> "Remessa para armazenagem de combustíveis ou lubrificantes.",
                "observacao"=> "Classificam-se neste código as remessas para armazenagem de combustíveis ou lubrificantes.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.664",
                "descricao"=> "Retorno de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de combustíveis ou lubrificantes, recebidos para armazenagem.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.665",
                "descricao"=> "Retorno simbólico de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código os retornos simbólicos de combustíveis ou lubrificantes recebidos para armazenagem, quando as mercadorias armazenadas tenham sido objeto de saída a qualquer título e não devam retornar ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.666",
                "descricao"=> "Remessa por conta e ordem de terceiros de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as saídas por conta e ordem de terceiros, de combustíveis ou lubrificantes, recebidos anteriormente para armazenagem.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.667",
                "descricao"=> "Venda de combustíveis ou lubrificantes a consumidor ou usuário final estabelecido em outra unidade da Federação.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes a consumidor ou a usuário final estabelecido em outra unidade da Federação, cujo abastecimento tenha sido efetuado na unidade da Federação do remetente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.901",
                "descricao"=> "Remessa para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as remessas de insumos remetidos para industrialização por encomenda, a ser realizada em outra empresa ou em outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.902",
                "descricao"=> "Retorno de mercadoria utilizada na industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as remessas, pelo estabelecimento industrializador, dos insumos recebidos para industrialização e incorporados ao produto final, por encomenda de outra empresa ou de outro estabelecimento da mesma empresa. O valor dos insumos nesta operação deverá ser igual ao valor dos insumos recebidos para industrialização.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.903",
                "descricao"=> "Retorno de mercadoria recebida para industrialização e não aplicada no referido processo.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de insumos recebidos para industrialização e não aplicados no referido processo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.904",
                "descricao"=> "Remessa para venda fora do estabelecimento, ou qualquer remessa efetuada pelo MEI com exceção das classificadas nos códigos 5.502 e 5.505.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para venda fora do estabelecimento, inclusive por meio de veículos. Também serão classificadas neste código quaisquer remessas de mercadorias efetuadas pelo MEI com exceção das classificadas nos códigos “5.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação” e “5.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.905",
                "descricao"=> "Remessa para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.906",
                "descricao"=> "Retorno de mercadoria depositada em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código os retornos de mercadorias depositadas em depósito fechado ou armazém geral ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.907",
                "descricao"=> "Retorno simbólico de mercadoria depositada em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código os retornos simbólicos de mercadorias recebidas para depósito em depósito fechado ou armazém geral, quando as mercadorias depositadas tenham sido objeto de saída a qualquer título e que não devam retornar ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.908",
                "descricao"=> "Remessa de bem por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as remessas de bens para o cumprimento de contrato de comodato ou locação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.909",
                "descricao"=> "Retorno de bem recebido por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as remessas de bens em devolução após cumprido o contrato de comodato ou locação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.910",
                "descricao"=> "Remessa em bonificação, doação ou brinde.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de bonificação, doação ou brinde.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.911",
                "descricao"=> "Remessa de amostra grátis.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de amostra grátis.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.912",
                "descricao"=> "Remessa de mercadoria ou bem para demonstração, mostruário ou treinamento.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para demonstração, mostruário ou treinamento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.913",
                "descricao"=> "Retorno de mercadoria ou bem recebido para demonstração ou mostruário.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de mercadorias ou bens recebidos para demonstração ou mostruário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.914",
                "descricao"=> "Remessa de mercadoria ou bem para exposição ou feira.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para exposição ou feira.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.915",
                "descricao"=> "Remessa de mercadoria ou bem para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para conserto ou reparo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.916",
                "descricao"=> "Retorno de mercadoria ou bem recebido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de mercadorias ou bens recebidos para conserto ou reparo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.917",
                "descricao"=> "Remessa de mercadoria em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.918",
                "descricao"=> "Devolução de mercadoria recebida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.919",
                "descricao"=> "Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, recebida anteriormente em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas de mercadorias vendidas ou utilizadas em processo industrial, que tenham sido recebidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.920",
                "descricao"=> "Remessa de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados.",
                "observacao"=> "Classificam-se neste código as remessas de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados que sirvam para acondicionar mercadorias e produtos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.921",
                "descricao"=> "Devolução de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados.",
                "observacao"=> "Classificam-se neste código as devoluções de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados que sirvam para acondicionar mercadorias e produtos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.922",
                "descricao"=> "Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de simples faturamento decorrente de venda para entrega futura.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.923",
                "descricao"=> "Remessa de mercadoria por conta e ordem de terceiros, em venda à ordem ou em operações com armazém geral ou depósito fechado.",
                "observacao"=> "Também serão classificadas neste código as remessas, por conta e ordem de terceiros, de mercadorias depositadas ou para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.924",
                "descricao"=> "Remessa para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as saídas de insumos com destino a estabelecimento industrializador, para serem industrializados por conta e ordem do adquirente, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente dos mesmos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.925",
                "descricao"=> "Retorno de mercadoria recebida para industrialização por conta e ordem do adquirente da mercadoria, quando aquela não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as remessas, pelo estabelecimento industrializador, dos insumos recebidos, por conta e ordem do adquirente, para industrialização e incorporados ao produto final, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente. O valor dos insumos nesta operação deverá ser igual ao valor dos insumos recebidos para industrialização.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.926",
                "descricao"=> "Lançamento efetuado a título de reclassificação de mercadoria decorrente de formação de kit ou de sua desagregação.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de reclassificação decorrente de formação de kit de mercadorias ou de sua desagregação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.927",
                "descricao"=> "Lançamento efetuado a título de baixa de estoque decorrente de perda, roubo ou deterioração.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de baixa de estoque decorrente de perda, roubou ou deterioração das mercadorias.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.928",
                "descricao"=> "Lançamento efetuado a título de baixa de estoque decorrente do encerramento da atividade da empresa.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de baixa de estoque decorrente do encerramento das atividades da empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.929",
                "descricao"=> "Lançamento efetuado em decorrência de emissão de documento fiscal relativo a operação ou prestação também registrada em equipamento Emissor de Cupom Fiscal - ECF.",
                "observacao"=> "Classificam-se neste código os registros relativos aos documentos fiscais emitidos em operações ou prestações que também tenham sido registradas em equipamento Emissor de Cupom Fiscal - ECF.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.931",
                "descricao"=> "Lançamento efetuado em decorrência da responsabilidade de retenção do imposto por substituição tributária, atribuída ao remetente ou alienante da mercadoria, pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "observacao"=> "Classificam-se neste código exclusivamente os lançamentos efetuados pelo remetente ou alienante da mercadoria quando lhe for atribuída a responsabilidade pelo recolhimento do imposto devido pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.932",
                "descricao"=> "Prestação de serviço de transporte iniciada em unidade da Federação diversa daquela onde inscrito o prestador.",
                "observacao"=> "Classificam-se neste código as prestações de serviço de transporte que tenham sido iniciadas em unidade da Federação diversa daquela onde o prestador está inscrito como contribuinte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.933",
                "descricao"=> "Prestação de serviço tributado pelo ISSQN.",
                "observacao"=> "Classificam-se neste código as prestações de serviços, de competência municipal, desde que informado sem Nota Fiscal modelo 1 ou 1-A.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.934",
                "descricao"=> "Remessa simbólica de mercadoria depositada em armazém geral ou depósito fechado.",
                "observacao"=> "Classificam-se neste código as remessas simbólicas de mercadorias depositadas em depósito fechado ou armazém geral, efetuadas nas situações em que haja a transmissão de propriedade com a permanência das mercadorias em depósito ou quando a mercadoria tenha sido entregue pelo remetente diretamente a depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "5.949",
                "descricao"=> "Outra saída de mercadoria ou prestação de serviço não especificado.",
                "observacao"=> "Classificam-se neste código as outras saídas de mercadorias ou prestações de serviços que não tenham sido especificados nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERNA"
            ],
            [
                "cfop"=> "6.101",
                "descricao"=> "Venda de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.102",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, ou qualquer venda de mercadoria efetuada pelo MEI com exceção das saídas classificadas nos códigos 6.501, 6.502, 6.504 e 6.505.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento. Também serão classificadas neste código quaisquer vendas de mercadorias efetuadas pelo MEI com exceção das saídas classificadas nos códigos “6.501 - Remessa de produção do estabelecimento, com fim específico de exportação”, “6.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação”, “6.504 - Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento” e “6.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.103",
                "descricao"=> "Venda de produção do estabelecimento, efetuada fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas efetuadas fora do estabelecimento, inclusive por meio de veículo, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.104",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, efetuada fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas efetuadas fora do estabelecimento, inclusive por meio de veículo, de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.105",
                "descricao"=> "Venda de produção do estabelecimento que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento, armazenados em depósito fechado, armazém geral ou outro sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.106",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, armazenadas em depósito fechado, armazém geral ou outro, que não tenham sido objeto de qualquer processo industrial no estabelecimento sem que haja retorno ao estabelecimento depositante. Também serão classificadas neste código as vendas de mercadorias importadas, cuja saída ocorra do recinto alfandegado ou da repartição alfandegária onde se processou o desembaraço aduaneiro, com destino ao estabelecimento do comprador, sem transitar pelo estabelecimento do importador.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.107",
                "descricao"=> "Venda de produção do estabelecimento, destinada a não contribuinte.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos por estabelecimento de produtor rural, destinadas a não contribuintes. Quaisquer operações de venda destinadas a não contribuintes deverão ser classificadas neste código.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.108",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, destinada a não contribuinte.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento, destinadas a não contribuintes. Quaisquer operações de venda destinadas a não contribuintes deverão ser classificadas neste código.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.109",
                "descricao"=> "Venda de produção do estabelecimento, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzido pelo próprio estabelecimento, destinados à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.110",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, destinada à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, destinadas à Zona Franca de Manaus ou Áreas de Livre Comércio.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.111",
                "descricao"=> "Venda de produção do estabelecimento remetida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de produtos industrializados no estabelecimento remetidos anteriormente a título de consignação industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.112",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de Terceiros remetida anteriormente em consignação industrial.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas anteriormente a título de consignação industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.113",
                "descricao"=> "Venda de produção do estabelecimento remetida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de produtos industrializados no estabelecimento remetidos anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.114",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros remetida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas efetivas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.115",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, recebida anteriormente em consignação mercantil.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, recebidas anteriormente a título de consignação mercantil.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.116",
                "descricao"=> "Venda de produção do estabelecimento originada de encomenda para entrega futura.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzido pelo próprio estabelecimento, quando da saída real do produto, cujo faturamento tenha sido classificado no código \"6.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura\".",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.117",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, originada de encomenda para entrega futura.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, quando da saída real da mercadoria, cujo faturamento tenha sido classificado no código “6.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.118",
                "descricao"=> "Venda de produção do estabelecimento entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de produtos industrializados pelo estabelecimento, entregues ao destinatário por conta e ordem do adquirente originário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.119",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário por conta e ordem do adquirente originário, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, entregues ao destinatário por conta e ordem do adquirente originário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.120",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros entregue ao destinatário pelo vendedor remetente, em venda à ordem.",
                "observacao"=> "Classificam-se neste código as vendas à ordem de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, entregues pelo vendedor remetente ao destinatário, cuja compra seja classificada, pelo adquirente originário, no código “2.118 - Compra de mercadoria pelo adquirente originário, entregue pelo vendedor remetente ao destinatário, em venda à ordem”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.122",
                "descricao"=> "Venda de produção do estabelecimento remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento, remetidos para serem industrializados em outro estabelecimento, por conta e ordem do adquirente, sem que os produtos tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.123",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros remetida para industrialização, por conta e ordem do adquirente, sem transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento, remetidas para serem industrializadas em outro estabelecimento, por conta e ordem do adquirente, sem que as mercadorias tenham transitado pelo estabelecimento do adquirente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.124",
                "descricao"=> "Industrialização efetuada para outra empresa.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias industrializadas para terceiros, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.125",
                "descricao"=> "Industrialização efetuada para outra empresa quando a mercadoria recebida para utilização no processo de industrialização não transitar pelo estabelecimento adquirente da mercadoria.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias industrializadas para outras empresas, em que as mercadorias recebidas para utilização no processo de industrialização não tenham transitado pelo estabelecimento do adquirente das mercadorias, compreendendo os valores referentes aos serviços prestados e os das mercadorias de propriedade do industrializador empregadas no processo industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.129",
                "descricao"=> "Venda de insumo importado e de mercadoria industrializada sob o amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as vendas de insumos importados e de produtos industrializados pelo próprio estabelecimento sob amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.131",
                "descricao"=> "Remessa de produção de estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as saídas de produção de cooperativa, de estabelecimento de cooperado, com previsão de posterior ajuste ou fixação de preço.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.132",
                "descricao"=> "Fixação de preço de produção do estabelecimento, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço ou fixação de preço, de ato cooperativo.",
                "observacao"=> "Classificam-se neste código a fixação de preço de produção do estabelecimento do produtor, inclusive quando cuja remessa anterior tenha sido classificada no código “6.131 - Remessa de produção de estabelecimento, com previsão de posterior ajuste ou fixação de preço, de ato cooperativo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.151",
                "descricao"=> "Transferência de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código os produtos industrializados ou produzidos pelo estabelecimento em transferência para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.152",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as mercadorias adquiridas ou recebidas de terceiros para industrialização, comercialização ou para utilização na prestação de serviços e que não tenham sido objeto de qualquer processo industrial no estabelecimento, transferidas para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.153",
                "descricao"=> "Transferência de energia elétrica.",
                "observacao"=> "Classificam-se neste código as transferências de energia elétrica para outro estabelecimento da mesma empresa, para distribuição.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.155",
                "descricao"=> "Transferência de produção do estabelecimento, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de produtos industrializados no estabelecimento que tenham sido remetidos para armazém geral, depósito fechado ou outro, sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.156",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial, remetidas para armazém geral, depósito fechado ou outro, sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.159",
                "descricao"=> "Fornecimento de produção do estabelecimento de ato cooperativo.",
                "observacao"=> "Classificam-se neste código os fornecimentos de produtos industrializados ou produzidos pelo próprio estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.160",
                "descricao"=> "Fornecimento de mercadoria adquirida ou recebida de terceiros de ato cooperativo.",
                "observacao"=> "Classificam-se neste código os fornecimentos de mercadorias adquiridas ou recebidas de terceiros, que não tenham sido objeto de qualquer processo industrial no estabelecimento de cooperativa, destinados a seus cooperados ou a estabelecimento de outra cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.201",
                "descricao"=> "Devolução de compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização ou produção rural, cujas entradas tenham sido classificadas no código \"2.101 - Compra para industrialização ou produção rural”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.202",
                "descricao"=> "Devolução de compra para comercialização, ou qualquer devolução de mercadoria efetuada pelo MEI com exceção das classificadas no código 6.503.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem comercializadas, cujas entradas tenham sido classificadas como “Compra para comercialização”. Também serão classificadas neste código quaisquer devoluções de mercadorias efetuadas pelo MEI com exceção das classificadas no código “6.503 - Devolução de mercadoria recebida com fim específico de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.205",
                "descricao"=> "Anulação de valor relativo a aquisição de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.206",
                "descricao"=> "Anulação de valor relativo a aquisição de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.207",
                "descricao"=> "Anulação de valor relativo à compra de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes da compra de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.208",
                "descricao"=> "Devolução de mercadoria recebida em transferência para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas em transferência de outros estabelecimentos da mesma empresa, para serem utilizadas em processo de industrialização ou produção rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.209",
                "descricao"=> "Devolução de mercadoria recebida em transferência para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas em transferência de outro estabelecimento da mesma empresa, para serem comercializadas.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.210",
                "descricao"=> "Devolução de compra para utilização na prestação de serviço.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para utilização na prestação de serviços, cujas entradas tenham sido classificadas nos códigos “2.126 - Compra para utilização na prestação de serviço sujeita ao ICMS” e “2.128 - Compra para utilização na prestação de serviço sujeita ao ISSQN”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.213",
                "descricao"=> "Devolução de entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, em ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de entradas que tenham sido classificadas no código “2.131 - Entrada de mercadoria, com previsão de posterior ajuste ou fixação de preço, decorrente de operação de ato cooperativo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.214",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de mercadorias do estabelecimento produtor cuja entrada para comercialização tenha sido classificada no código “2.132 - Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para comercialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.215",
                "descricao"=> "Devolução referente à fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para industrialização",
                "observacao"=> "Classificam-se neste código as devoluções referentes à fixação de preço de mercadorias do estabelecimento produtor cuja entrada para industrialização tenha sido classificada no código “2.135 - Fixação de preço de produção do estabelecimento produtor, inclusive quando remetidas anteriormente com previsão de posterior ajuste ou fixação de preço, de ato cooperativo, para industrialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.216",
                "descricao"=> "Devolução de entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo.",
                "observacao"=> "Classificam-se neste código as devoluções de entradas decorrentes de fornecimento de produtos ou mercadorias por estabelecimento de cooperativa destinados a seus cooperados ou a estabelecimento de outra cooperativa, cujo fornecimento tenha sido classificado no código “2.159 - Entrada decorrente do fornecimento de produto ou mercadoria de ato cooperativo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.251",
                "descricao"=> "Venda de energia elétrica para distribuição ou comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica destinada à distribuição ou comercialização. Também serão classificadas neste código as vendas de energia elétrica destinada a cooperativas para distribuição aos seus cooperados.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.252",
                "descricao"=> "Venda de energia elétrica para estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento industrial. Também serão classificadas neste código as vendas de energia elétrica destinada a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.253",
                "descricao"=> "Venda de energia elétrica para estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento comercial. Também serão classificadas neste código as vendas de energia elétrica destinada a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.254",
                "descricao"=> "Venda de energia elétrica para estabelecimento prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de prestador de serviços de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.255",
                "descricao"=> "Venda de energia elétrica para estabelecimento prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de prestador de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.256",
                "descricao"=> "Venda de energia elétrica para estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.257",
                "descricao"=> "Venda de energia elétrica para consumo por demanda contratada.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para consumo por demanda contratada, que prevalecerá sobre os demais códigos deste subgrupo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.258",
                "descricao"=> "Venda de energia elétrica a não contribuinte.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.301",
                "descricao"=> "Prestação de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação destinados às prestações de serviços da mesma natureza.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.302",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento industrial. Também serão classificados neste código os serviços de comunicação prestados a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.303",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento comercial. Também serão classificados neste código os serviços de comunicação prestados a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.304",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de prestador de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento prestador de serviço de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.305",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.306",
                "descricao"=> "Prestação de serviço de comunicação a estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.307",
                "descricao"=> "Prestação de serviço de comunicação a não contribuinte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.351",
                "descricao"=> "Prestação de serviço de transporte para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte destinados às prestações de serviços da mesma natureza.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.352",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento industrial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento industrial. Também serão classificados neste código os serviços de transporte prestados a estabelecimento industrial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.353",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento comercial.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento comercial. Também serão classificados neste código os serviços de transporte prestados a estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.354",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de prestador de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento prestador de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.355",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento de geradora ou de distribuidora de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.356",
                "descricao"=> "Prestação de serviço de transporte a estabelecimento de produtor rural.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a estabelecimento de produtor rural.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.357",
                "descricao"=> "Prestação de serviço de transporte a não contribuinte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a pessoas físicas ou a pessoas jurídicas não indicadas nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.359",
                "descricao"=> "Prestação de serviço de transporte a contribuinte ou a não contribuinte quando a mercadoria transportada está dispensada de emissão de nota fiscal.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a contribuintes ou a não contribuintes, exclusivamente quando não existe a obrigação legal de emissão de nota fiscal para a mercadoria transportada.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.360",
                "descricao"=> "Prestação de serviço de transporte a contribuinte substituto em relação ao serviço de transporte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte a contribuinte ao qual tenha sido atribuída a condição de substituto tributário do imposto sobre a prestação dos serviços.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.401",
                "descricao"=> "Venda de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária, na condição de contribuinte substituto.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados ou produzidos pelo próprio estabelecimento em operações com produtos sujeitos ao regime de substituição tributária, na condição de contribuinte substituto.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.402",
                "descricao"=> "Venda de produção do estabelecimento de produto sujeito ao regime de substituição tributária, em operação entre contribuintes substitutos do mesmo produto.",
                "observacao"=> "Classificam-se neste código as vendas de produtos sujeitos ao regime de substituição tributária industrializados no estabelecimento, em operações entre contribuintes substitutos do mesmo produto.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.403",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária, na condição de contribuinte substituto.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros, na condição de contribuinte substituto, em operação com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.404",
                "descricao"=> "Venda de mercadoria sujeita ao regime de substituição tributária, cujo imposto já tenha sido retido anteriormente.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias sujeitas ao regime de substituição tributária, na condição de substituto tributário, exclusivamente nas hipóteses em que o imposto já tenha sido retido anteriormente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.408",
                "descricao"=> "Transferência de produção do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código os produtos industrializados ou produzidos no próprio estabelecimento em transferência para outro estabelecimento da mesma empresa de produtos sujeitos ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.409",
                "descricao"=> "Transferência de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as transferências para outro estabelecimento da mesma empresa, de mercadorias adquiridas ou recebidas de terceiros que não tenham sido objeto de qualquer processo industrial no estabelecimento, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.410",
                "descricao"=> "Devolução de compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização ou produção rural cujas entradas tenham sido classificadas como \"Compra para industrialização ou produção rural em operação com mercadoria sujeita ao regime de substituição tributária\".",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.411",
                "descricao"=> "Devolução de compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem comercializadas, cujas entradas tenham sido classificadas como “Compra para comercialização em operação com mercadoria sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.412",
                "descricao"=> "Devolução de bem do ativo imobilizado, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de bens adquiridos para integrar o ativo imobilizado do estabelecimento, cuja entrada tenha sido classificada no código “2.406 - Compra de bem para o ativo imobilizado cuja mercadoria está sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.413",
                "descricao"=> "Devolução de mercadoria destinada ao uso ou consumo, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para uso ou consumo do estabelecimento, cuja entrada tenha sido classificada no código “2.407 - Compra de mercadoria para uso ou consumo cuja mercadoria está sujeita ao regime de substituição tributária”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.414",
                "descricao"=> "Remessa de produção do estabelecimento para venda fora do estabelecimento em operação com produto sujeito ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as remessas de produtos industrializados ou produzido pelo próprio estabelecimento para serem vendidos fora do estabelecimento, inclusive por meio de veículos, em operações com produtos sujeitos ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.415",
                "descricao"=> "Remessa de mercadoria adquirida ou recebida de terceiros para venda fora do estabelecimento, em operação com mercadoria sujeita ao regime de substituição tributária.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias adquiridas ou recebidas de terceiros para serem vendidas fora do estabelecimento, inclusive por meio de veículos, em operações com mercadorias sujeitas ao regime de substituição tributária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.451",
                "descricao"=> "Remessa de animal - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes à remessa de animais para criação, recriação, produção ou engorda em estabelecimento de produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento. Também serão classificadas neste código as remessas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.452",
                "descricao"=> "Remessa de insumo - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes à remessa de insumos para utilização em estabelecimento de produtor no sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento. Também serão classificadas neste código as remessas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.453",
                "descricao"=> "Retorno de animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno da produção, bem como de animais criados, recriados ou engordados pelo produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento. Também serão classificados neste código os retornos decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.454",
                "descricao"=> "Retorno simbólico de animal ou da produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno simbólico da produção, bem como de animais criados ou engordados pelo produtor no sistema integrado e de produção animal, inclusive em sistema de confinamento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.455",
                "descricao"=> "Retorno de insumos não utilizados na produção - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas referentes ao retorno de insumos não utilizados em estabelecimento de produtor no sistema integrado e de produção animal, para criação, recriação ou engorda, inclusive em sistema de confinamento, e nas operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.456",
                "descricao"=> "Saída referente a remuneração do produtor - Sistema de Integração e Parceria Rural.",
                "observacao"=> "Classificam-se neste código as saídas da parcela da produção do produtor realizadas em sistema de integração e produção animal, quando da entrega ao integrador ou parceiro. Também serão classificadas neste código as saídas decorrentes de “ato cooperativo”, inclusive as operações entre cooperativa singular e cooperativa central.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.501",
                "descricao"=> "Remessa de produção do estabelecimento, com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as saídas de produtos industrializados ou produzido pelo próprio estabelecimento, remetidos com fim específico de exportação a trading company, empresa comercial exportadora ou outro estabelecimento do remetente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.502",
                "descricao"=> "Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as saídas de mercadorias adquiridas ou recebidas de terceiros, remetidas com fim específico de exportação a trading company, empresa comercial exportadora ou outro estabelecimento do remetente.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.503",
                "descricao"=> "Devolução de mercadoria recebida com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as devoluções efetuadas por trading company, empresa comercial exportadora ou outro estabelecimento do destinatário, de mercadorias recebidas com fim específico de exportação, cujas entradas tenham sido classificadas no código “2.501 - Entrada de mercadoria recebida com fim específico de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.504",
                "descricao"=> "Remessa de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para formação de lote de exportação, de produtos industrializados ou produzidos pelo próprio estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.505",
                "descricao"=> "Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.551",
                "descricao"=> "Venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as vendas de bens integrantes do ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.552",
                "descricao"=> "Transferência de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código os bens do ativo imobilizado transferidos para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.553",
                "descricao"=> "Devolução de compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de bens adquiridos para integrar o ativo imobilizado do estabelecimento, cuja entrada foi classificada no código “2.551 - Compra de bem para o ativo imobilizado”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.554",
                "descricao"=> "Remessa de bem do ativo imobilizado para uso fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de bens do ativo imobilizado para uso fora do estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.555",
                "descricao"=> "Devolução de bem do ativo imobilizado de terceiro, recebido para uso no estabelecimento.",
                "observacao"=> "Classificam-se neste código as saídas em devolução, de bens do ativo imobilizado de terceiros, recebidos para uso no estabelecimento, cuja entrada tenha sido classificada no código “2.555 - Entrada de bem do ativo imobilizado de terceiro, remetido para uso no estabelecimento”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.556",
                "descricao"=> "Devolução de compra de material de uso ou consumo.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias destinadas ao uso ou consumo do estabelecimento, cuja entrada tenha sido classificada no código “2.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.557",
                "descricao"=> "Transferência de material de uso ou consumo.",
                "observacao"=> "Classificam-se neste código os materiais de uso ou consumo transferidos para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.603",
                "descricao"=> "Ressarcimento de ICMS retido por substituição tributária.",
                "observacao"=> "Classificam-se neste código os lançamentos destinados ao registro de ressarcimento de ICMS retido por substituição tributária a contribuinte substituído, efetuado pelo contribuinte substituto, nas hipóteses previstas na legislação aplicável.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.651",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados à industrialização do próprio produto, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “6.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.652",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado à comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados à comercialização, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “6.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.653",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento destinado a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados a consumo em processo de industrialização de outros produtos, à prestação de serviços ou a usuário final, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “6.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.654",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado à industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados à industrialização do próprio produto, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.655",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado à comercialização.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados à comercialização, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.656",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinado a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados a consumo em processo de industrialização de outros produtos, à prestação de serviços ou a usuário final, inclusive aquelas decorrentes de encomenda para entrega futura, cujo faturamento tenha sido classificado no código “5.922 - Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.657",
                "descricao"=> "Remessa de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros para venda fora do estabelecimento.",
                "observacao"=> "Classificam-se neste código as remessas de combustíveis ou lubrificantes, adquiridos ou recebidos de terceiros para serem vendidos fora do estabelecimento, inclusive por meio de veículos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.658",
                "descricao"=> "Transferência de combustíveis ou lubrificantes de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as transferências de combustíveis ou lubrificantes, industrializados no estabelecimento, para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.659",
                "descricao"=> "Transferência de combustíveis ou lubrificantes adquiridos ou recebidos de terceiro.",
                "observacao"=> "Classificam-se neste código as transferências de combustíveis ou lubrificantes, adquiridos ou recebidos de terceiros, para outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.660",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos para industrialização subsequente.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para industrialização do próprio produto, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes para industrialização subsequente”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.661",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para comercialização, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes para comercialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.662",
                "descricao"=> "Devolução de compra de combustíveis ou lubrificantes adquiridos por consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as devoluções de compras de combustíveis ou lubrificantes adquiridos para consumo em processo de industrialização de outros produtos, na prestação de serviços ou por usuário final, cujas entradas tenham sido classificadas como “Compra de combustíveis ou lubrificantes por consumidor ou usuário final”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.663",
                "descricao"=> "Remessa para armazenagem de combustíveis ou lubrificantes.",
                "observacao"=> "Classificam-se neste código as remessas para armazenagem de combustíveis ou lubrificantes.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.664",
                "descricao"=> "Retorno de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de combustíveis ou lubrificantes, recebidos para armazenagem.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.665",
                "descricao"=> "Retorno simbólico de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código os retornos simbólicos de combustíveis ou lubrificantes recebidos para armazenagem, quando as mercadorias armazenadas tenham sido objeto de saída a qualquer título e não devam retornar ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.666",
                "descricao"=> "Remessa por conta e ordem de terceiros de combustíveis ou lubrificantes recebidos para armazenagem.",
                "observacao"=> "Classificam-se neste código as saídas por conta e ordem de terceiros, de combustíveis ou lubrificantes, recebidos anteriormente para armazenagem.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.667",
                "descricao"=> "Venda de combustíveis ou lubrificantes a consumidor ou usuário final estabelecido em outra unidade da Federação diferente da que ocorrer o consumo.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes a consumidor ou a usuário final, cujo abastecimento tenha sido efetuado em unidade da Federação diferente do remetente e do destinatário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.901",
                "descricao"=> "Remessa para industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as remessas de insumos remetidos para industrialização por encomenda, a ser realizada em outra empresa ou em outro estabelecimento da mesma empresa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.902",
                "descricao"=> "Retorno de mercadoria utilizada na industrialização por encomenda.",
                "observacao"=> "Classificam-se neste código as remessas, pelo estabelecimento industrializador, dos insumos recebidos para industrialização e incorporados ao produto final, por encomenda de outra empresa ou de outro estabelecimento da mesma empresa. O valor dos insumos nesta operação deverá ser igual ao valor dos insumos recebidos para industrialização.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.903",
                "descricao"=> "Retorno de mercadoria recebida para industrialização e não aplicada no referido processo.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de insumos recebidos para industrialização e não aplicados no referido processo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.904",
                "descricao"=> "Remessa para venda fora do estabelecimento, ou qualquer remessa efetuada pelo MEI com exceção das classificadas nos códigos 6.502 e 6.505.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para venda fora do estabelecimento, inclusive por meio de veículos. Também serão classificadas neste código quaisquer remessas de mercadorias efetuadas pelo MEI com exceção das classificadas nos códigos “6.502 - Remessa de mercadoria adquirida ou recebida de terceiros, com fim específico de exportação” e “6.505 - Remessa de mercadorias, adquiridas ou recebidas de terceiros, para formação de lote de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.905",
                "descricao"=> "Remessa para depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.906",
                "descricao"=> "Retorno de mercadoria depositada em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código os retornos de mercadorias depositadas em depósito fechado ou armazém geral ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.907",
                "descricao"=> "Retorno simbólico de mercadoria depositada em depósito fechado ou armazém geral.",
                "observacao"=> "Classificam-se neste código os retornos simbólicos de mercadorias recebidas para depósito em depósito fechado ou armazém geral, quando as mercadorias depositadas tenham sido objeto de saída a qualquer título e que não devam retornar ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.908",
                "descricao"=> "Remessa de bem por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as remessas de bens para o cumprimento de contrato de comodato ou locação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.909",
                "descricao"=> "Retorno de bem recebido por conta de contrato de comodato ou locação.",
                "observacao"=> "Classificam-se neste código as remessas de bens em devolução após cumprido o contrato de comodato ou locação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.910",
                "descricao"=> "Remessa em bonificação, doação ou brinde.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de bonificação, doação ou brinde.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.911",
                "descricao"=> "Remessa de amostra grátis.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de amostra grátis.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.912",
                "descricao"=> "Remessa de mercadoria ou bem para demonstração, mostruário ou treinamento.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para demonstração, mostruário ou treinamento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.913",
                "descricao"=> "Retorno de mercadoria ou bem recebido para demonstração ou mostruário.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de mercadorias ou bens recebidos para demonstração ou mostruário.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.914",
                "descricao"=> "Remessa de mercadoria ou bem para exposição ou feira.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para exposição ou feira.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.915",
                "descricao"=> "Remessa de mercadoria ou bem para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias ou bens para conserto ou reparo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.916",
                "descricao"=> "Retorno de mercadoria ou bem recebido para conserto ou reparo.",
                "observacao"=> "Classificam-se neste código as remessas em devolução de mercadorias ou bens recebidos para conserto ou reparo.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.917",
                "descricao"=> "Remessa de mercadoria em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as remessas de mercadorias a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.918",
                "descricao"=> "Devolução de mercadoria recebida em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias recebidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.919",
                "descricao"=> "Devolução simbólica de mercadoria vendida ou utilizada em processo industrial, recebida anteriormente em consignação mercantil ou industrial.",
                "observacao"=> "Classificam-se neste código as devoluções simbólicas de mercadorias vendidas ou utilizadas em processo industrial, que tenham sido recebidas anteriormente a título de consignação mercantil ou industrial.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.920",
                "descricao"=> "Remessa de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados.",
                "observacao"=> "Classificam-se neste código as remessas de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados que sirvam para acondicionar mercadorias e produtos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.921",
                "descricao"=> "Devolução de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados.",
                "observacao"=> "Classificam-se neste código as devoluções de embalagens, bombonas, vasilhames, sacarias, pallets, containers ou assemelhados que sirvam para acondicionar mercadorias e produtos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.922",
                "descricao"=> "Lançamento efetuado a título de simples faturamento decorrente de venda para entrega futura.",
                "observacao"=> "Classificam-se neste código os registros efetuados a título de simples faturamento decorrente de venda para entrega futura.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.923",
                "descricao"=> "Remessa de mercadoria por conta e ordem de terceiros, em venda à ordem ou em operações com armazém geral ou depósito fechado.",
                "observacao"=> "Também serão classificadas neste código as remessas, por conta e ordem de terceiros, de mercadorias depositadas ou para depósito em depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.924",
                "descricao"=> "Remessa para industrialização por conta e ordem do adquirente da mercadoria, quando esta não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as saídas de insumos com destino a estabelecimento industrializador, para serem industrializados por conta e ordem do adquirente, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente dos mesmos.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.925",
                "descricao"=> "Retorno de mercadoria recebida para industrialização por conta e ordem do adquirente da mercadoria, quando aquela não transitar pelo estabelecimento do adquirente.",
                "observacao"=> "Classificam-se neste código as remessas, pelo estabelecimento industrializador, dos insumos recebidos, por conta e ordem do adquirente, para industrialização e incorporados ao produto final, nas hipóteses em que os insumos não tenham transitado pelo estabelecimento do adquirente. O valor dos insumos nesta operação deverá ser igual ao valor dos insumos recebidos para industrialização.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.929",
                "descricao"=> "Lançamento efetuado em decorrência de emissão de documento fiscal relativo a operação ou prestação também registrada em equipamento Emissor de Cupom Fiscal - ECF.",
                "observacao"=> "Classificam-se neste código os registros relativos aos documentos fiscais emitidos em operações ou prestações que também tenham sido registrada sem equipamento Emissor de Cupom Fiscal - ECF.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.931",
                "descricao"=> "Lançamento efetuado em decorrência da responsabilidade de retenção do imposto por substituição tributária, atribuída ao remetente ou alienante da mercadoria, pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "observacao"=> "Classificam-se neste código exclusivamente os lançamentos efetuados pelo remetente ou alienante da mercadoria quando lhe for atribuída a responsabilidade pelo recolhimento do imposto devido pelo serviço de transporte realizado por transportador autônomo ou por transportador não inscrito na unidade da Federação onde iniciado o serviço.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.932",
                "descricao"=> "Prestação de serviço de transporte iniciada em unidade da Federação diversa daquela onde inscrito o prestador.",
                "observacao"=> "Classificam-se neste código as prestações de serviço de transporte que tenham sido iniciadas em unidade da Federação diversa daquela onde o prestador está inscrito como contribuinte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.933",
                "descricao"=> "Prestação de serviço tributado pelo ISSQN.",
                "observacao"=> "Classificam-se neste código as prestações de serviços, de competência municipal, desde que informados em Nota Fiscal modelo 1 ou 1-A.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.934",
                "descricao"=> "Remessa simbólica de mercadoria depositada em armazém geral ou depósito fechado.",
                "observacao"=> "Classificam-se neste código as remessas simbólicas de mercadorias depositadas em depósito fechado ou armazém geral, efetuadas nas situações em que haja a transmissão de propriedade com a permanência das mercadorias em depósito ou quando a mercadoria tenha sido entregue pelo remetente diretamente a depósito fechado ou armazém geral.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "6.949",
                "descricao"=> "Outra saída de mercadoria ou prestação de serviço não especificado.",
                "observacao"=> "Classificam-se neste código as outras saídas de mercadorias ou prestações de serviços que não tenham sido especificados nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO INTERESTADUAL"
            ],
            [
                "cfop"=> "7.101",
                "descricao"=> "Venda de produção do estabelecimento",
                "observacao"=> "Classificam-se neste código as vendas de produtos do estabelecimento. Também serão classificadas neste código as vendas de mercadorias por estabelecimento industrial ou produtor rural de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.102",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, que não tenham sido objeto de qualquer processo industrial no estabelecimento. Também serão classificadas neste código as vendas de mercadorias por estabelecimento comercial de cooperativa.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.105",
                "descricao"=> "Venda de produção do estabelecimento, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento, armazenados em depósito fechado, armazém geral ou outro sem que haja retorno ao estabelecimento depositante.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.106",
                "descricao"=> "Venda de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar.",
                "observacao"=> "Classificam-se neste código as vendas de mercadorias adquiridas ou recebidas de terceiros para industrialização ou comercialização, armazenadas em depósito fechado, armazém geral ou outro, que não tenham sido objeto de qualquer processo industrial no estabelecimento sem que haja retorno ao estabelecimento depositante. Também serão classificadas neste código as vendas de mercadorias importadas, cuja saída ocorra do recinto alfandegado ou da repartição alfandegária onde se processou o desembaraço aduaneiro, com destino ao estabelecimento do comprador, sem transitar pelo estabelecimento do importador.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.127",
                "descricao"=> "Venda de produção do estabelecimento sob o regime de “drawback”.",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados no estabelecimento sob o regime de “drawback”, cujas compras foram classificadas no código “3.127 - Compra para industrialização sob o regime de “drawback””.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.129",
                "descricao"=> "Venda de produção do estabelecimento ao mercado externo de mercadoria industrializada sob o amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as vendas de produtos industrializados pelo próprio estabelecimento sob amparo do Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.201",
                "descricao"=> "Devolução de compra para industrialização ou produção rural.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização ou produção rural, cujas entradas tenham sido classificadas como \"Compra para industrialização ou produção rural\".",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.202",
                "descricao"=> "Devolução de compra para comercialização.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem comercializadas, cujas entradas tenham sido classificadas como “Compra para comercialização”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.205",
                "descricao"=> "Anulação de valor relativo à aquisição de serviço de comunicação.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de comunicação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.206",
                "descricao"=> "Anulação de valor relativo a aquisição de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes das aquisições de serviços de transporte.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.207",
                "descricao"=> "Anulação de valor relativo à compra de energia elétrica.",
                "observacao"=> "Classificam-se neste código as anulações correspondentes a valores faturados indevidamente, decorrentes da compra de energia elétrica.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.210",
                "descricao"=> "Devolução de compra para utilização na prestação de serviço.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para utilização na prestação de serviços, cujas entradas tenham sido classificadas nos códigos “3.126 - Compra para utilização na prestação de serviço sujeita ao ICMS” e “3.128 - Compra para utilização na prestação de serviço sujeita ao ISSQN”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.211",
                "descricao"=> "Devolução de compras para industrialização sob o regime de drawback.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização sob o regime de “drawback” e não utilizadas no referido processo, cujas entradas tenham sido classificadas no código “3.127 - Compra para industrialização sob o regime de “drawback”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.212",
                "descricao"=> "Devolução de compras para industrialização sob o regime de Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped).",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias adquiridas para serem utilizadas em processo de industrialização sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped) e não utilizadas no referido processo, cujas entradas tenham sido classificadas no código “3.129 - Compra para industrialização sob o Regime Aduaneiro Especial de Entreposto Industrial sob Controle Informatizado do Sistema Público de Escrituração Digital (Recof-Sped)”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.251",
                "descricao"=> "Venda de energia elétrica para o exterior.",
                "observacao"=> "Classificam-se neste código as vendas de energia elétrica para o exterior.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.301",
                "descricao"=> "Prestação de serviço de comunicação para execução de serviço da mesma natureza.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de comunicação destinados às prestações de serviços da mesma natureza.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.358",
                "descricao"=> "Prestação de serviço de transporte.",
                "observacao"=> "Classificam-se neste código as prestações de serviços de transporte destinado a estabelecimento no exterior.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.501",
                "descricao"=> "Exportação de mercadorias recebidas com fim específico de exportação.",
                "observacao"=> "Classificam-se neste código as exportações das mercadorias recebidas anteriormente com finalidade específica de exportação, cujas entradas tenham sido classificadas nos códigos “1.501 - Entrada de mercadoria recebida com fim específico de exportação” ou “2.501 - Entrada de mercadoria recebida com fim específico de exportação”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.504",
                "descricao"=> "Exportação de mercadoria que foi objeto de formação de lote de exportação.",
                "observacao"=> "Classificam-se neste código as exportações das mercadorias cuja operação anterior tenha sido objeto de formação de lote de exportação, e a remessa foi classificada nos códigos 5.504, 5.505, 6.505 ou 6.504 e a posterior devolução simbólica foi classificada nos códigos 1.505, 1.506, 2.505 ou 2.506.”",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.551",
                "descricao"=> "Venda de bem do ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as vendas de bens integrantes do ativo imobilizado do estabelecimento.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.552",
                "descricao"=> "Saída de produtos destinados ao uso ou consumo de bordo, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior.",
                "observacao"=> "Classificam-se neste código as saídas de produtos destinados ao uso ou consumo de bordo, em embarcações ou aeronaves exclusivamente em tráfego internacional com destino ao exterior, cuja operação tenha sido equiparada a uma exportação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.553",
                "descricao"=> "Devolução de compra de bem para o ativo imobilizado.",
                "observacao"=> "Classificam-se neste código as devoluções de bens adquiridos para integrar o ativo imobilizado do estabelecimento, cuja entrada foi classificada no código “3.551 - Compra de bem para o ativo imobilizado”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.556",
                "descricao"=> "Devolução de compra de material de uso ou consumo.",
                "observacao"=> "Classificam-se neste código as devoluções de mercadorias destinadas ao uso ou consumo do estabelecimento, cuja entrada tenha sido classificada no código “3.556 - Compra de material para uso ou consumo”.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.651",
                "descricao"=> "Venda de combustíveis ou lubrificantes de produção do estabelecimento.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes industrializados no estabelecimento destinados ao exterior.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.654",
                "descricao"=> "Venda de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes adquiridos ou recebidos de terceiros destinados ao exterior.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.667",
                "descricao"=> "Venda de combustíveis ou lubrificantes a consumidor ou usuário final.",
                "observacao"=> "Classificam-se neste código as vendas de combustíveis ou lubrificantes a consumidor ou a usuário final, em embarcações ou aeronaves, nacionais ou estrangeiras, exclusivamente em tráfego internacional com destino ao exterior, cuja operação tenha sido equiparada a uma exportação.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.930",
                "descricao"=> "Lançamento efetuado a título de devolução de bem cuja entrada tenha ocorrido sob amparo de regime especial aduaneiro de admissão temporária.",
                "observacao"=> "Classificam-se neste código os lançamentos efetuados a título de saída em devolução de bens cuja entrada tenha ocorrido sob amparo de regime especial aduaneiro de admissão temporária.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ],
            [
                "cfop"=> "7.949",
                "descricao"=> "Outra saída de mercadoria ou prestação de serviço não especificado.",
                "observacao"=> "Classificam-se neste código as outras saídas de mercadorias ou prestações de serviços que não tenham sido especificados nos códigos anteriores.",
                "tipooperacao"=> "SAIDA",
                "identificadordestinooperacao"=> "OPERACAO COM O EXTERIOR"
            ]
        ];

        foreach ($data as $item) {
            Cfop::create($item);
        }
    }
}