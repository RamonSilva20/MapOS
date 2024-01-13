<link rel="stylesheet" href="<?= base_url() ?>assets/trumbowyg/ui/trumbowyg.css">

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
        background: #FFFFFF;
        border-radius: 5px;
    }

    #assCliente-pad {
        border: 1px solid #333333;
        border-radius: 6px;
        background: #FFF;
    }
</style>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Detalhes OS</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li <?=$tab != 5 ? 'class="active" ' : ''?>id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                        <li id="tabServicos"><a href="#tab3" data-toggle="tab">Serviços</a></li>
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>
                      <?php if($this->data['usar_assinatura']): ?>
                        <li <?=$tab == 5 ? 'class="active" ' : ''?>id="tabAssinar"><a href="#tab5" data-toggle="tab">Assinatura</a></li>
                      <?php endif; ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane<?=$tab != 5 ? ' active' : ''?>" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <div class="span6" style="margin-left: 0">
                                        <h3>#Protocolo:
                                            <?= $result->idOs ?>
                                        </h3>
                                        <input id="valorTotal" type="hidden" name="valorTotal" value="" />
                                    </div>
                                    <div class="span6">
                                        <label for="tecnico">Técnico / Responsável</label>
                                        <input disabled="disabled" id="tecnico" class="span12" type="text" name="tecnico" value="<?= $result->nome ?>" />
                                    </div>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <div class="span3">
                                        <label for="status">Status<span class="required"></span></label>
                                        <input disabled="disabled" type="text" name="status" id="status" value="<?= $result->status ?>">
                                    </div>
                                    <div class="span3">
                                        <label for="dataInicial">Data Inicial<span class="required">*</span></label>
                                        <input id="dataInicial" disabled="disabled" class="span12 datepicker" type="text" name="dataInicial" value="<?= date('d/m/Y', strtotime($result->dataInicial)) ?>" />
                                    </div>
                                    <div class="span3">
                                        <label for="dataFinal">Data Final</label>
                                        <input id="dataFinal" disabled="disabled" class="span12 datepicker" type="text" name="dataFinal" value="<?= date('d/m/Y', strtotime($result->dataFinal)) ?>" />
                                    </div>
                                    <div class="span3">
                                        <label for="garantia">Garantia</label>
                                        <input id="garantia" disabled="disabled" type="text" class="span12" name="garantia" value="<?= $result->garantia ?>" />
                                    </div>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <label for="descricaoProduto">Descrição Produto/Serviço</label>
                                    <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5" disabled><?= $result->descricaoProduto; ?></textarea>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <label for="defeito">Defeito</label>
                                    <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5" disabled><?= $result->defeito; ?></textarea>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <label for="observacoes">Observações</label>
                                    <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5" disabled><?= $result->observacoes; ?></textarea>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <label for="laudoTecnico">Laudo Técnico</label>
                                    <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5" disabled><?= $result->laudoTecnico; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Produtos-->
                        <div class="tab-pane" id="tab2">
                            <div class="span12" id="divProdutos" style="margin-left: 0">
                                <table class="table table-bordered" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Preço unit.</th>
                                            <th>Quantidade</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($produtos as $p) :
                                            $total = $total + $p->subTotal;
                                            echo '<tr>';
                                            echo '<td>' . $p->descricao . '</td>';
                                            echo '<td>R$ ' . number_format($p->preco, 2, ',', '.') . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                            echo '</tr>';
                                        endforeach; ?>
                                        <tr>
                                            <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                            <td>
                                                <strong>R$ <?= number_format($total, 2, ',', '.') ?><input type="hidden" id="total-venda" value="<?= number_format($total, 2) ?>"></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Serviços-->
                        <div class="tab-pane" id="tab3">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12" id="divServicos" style="margin-left: 0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Preço unit.</th>
                                                <th>Quantidade</th>
                                                <th>Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($servicos as $s) :
                                                $total = $total + $s->subTotal;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td>R$ ' . number_format($s->preco, 2, ',', '.') . '</td>';
                                                echo '<td>' . $s->quantidade . '</td>';
                                                echo '<td>R$ ' . number_format($s->subTotal, 2, ',', '.') . '</td>';
                                                echo '</tr>';
                                            endforeach; ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                                <td>
                                                    <strong>R$ <?= number_format($total, 2, ',', '.') ?><input type="hidden" id="total-servico" value="<?= number_format($total, 2) ?>"></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <?php if ($this->session->userdata('cliente_anexa')) : ?>
                                    <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                        <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                            <div class="span10">
                                                <input type="hidden" name="idOsServico" id="idOsServico" value="<?= $result->idOs ?>" />
                                                <label for="">Anexo</label>
                                                <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20" />
                                            </div>
                                            <div class="span2">
                                                <label for="">.</label>
                                                <button class="btn btn-success span12"><i class="fas fa-paperclip"></i> Anexar</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif; ?>
                                <div class="span12" id="divAnexos" style="margin-left: 0">
                                    <?php foreach ($anexos as $a) :
                                        if ($a->thumb == null) :
                                            $thumb = base_url().'assets/img/icon-file.png';
                                            $link = base_url().'assets/img/icon-file.png';
                                        else :
                                            $thumb = $a->url.'/thumbs/'.$a->thumb;
                                            $link = $a->url.'/'.$a->anexo;
                                        endif;

                                        echo '<div class="span3" style="min-height: 150px; margin-left: 0">
                                            <a style="min-height: 150px;" href="#modal-anexo" imagem="'.$a->idAnexos.'" link="'.$link.'" role="button" class="btn anexo span12" data-toggle="modal">
                                            <img src="'.$thumb.'" alt="">
                                            </a>
                                            <span>'.$a->anexo.'</span>
                                            </div>';
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <!--Assinaturas-->
                        <?php if($this->data['usar_assinatura']): ?>
                            <div class="tab-pane<?=$tab == 5 ? ' active' : ''?>" id="tab5">
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <h3>Autorizar e assinar Ordem de Serviço</h3>
                                    <p style="margin-left: 10px;">Ao assinar e enviar sua assinatura você estará autorizando a execução da ordem de serviço!</p>
                                    <div class="span12" style="margin:0;">
                                        <div class="span12" id="assinaturaCliente" style="text-align:center; margin:0;">
                                        <?php if(!$result->assClienteImg): ?>
                                            <canvas id="assCliente-pad" class="telSm" width="320" height="300"></canvas>
                                            <canvas id="assCliente-pad" class="telMd" width="370" height="300"></canvas>
                                            <canvas id="assCliente-pad" class="padPc" width="600" height="300"></canvas>
                                            <p style="margin-top: 10px;"><input type="text" name="nomeAssinatura" id="nomeAssinatura" placeholder="Nome e Sobrenome*" class="text-center"></p>
                                            <h4>Assinatura do Cliente</h4>
                                        <?php else: ?>
                                            <img src="<?=$result->assClienteImg?>" width="600" alt="">
                                            <h4>Assinatura do Cliente</h4>
                                            <p>Em <?=date('d/m/Y H:i:s', strtotime($result->assClienteData))?></p>
                                            <p>IP: <?=$result->assClienteIp ?></p>
                                        <?php endif; ?>
                                        </div>
                                    <?php if(!$result->assClienteImg): ?>
                                        <div class="span12" style="display:flex; justify-content:center; margin:0;">
                                            <div class="span12 buttons-a" style="display:flex; justify-content:center; margin:0; margin-top:10px;">
                                                <button id="limparAssCliente" type="button" class="button btn btn-danger" title="Limpar Assinatura">
                                                    <span class="button__icon"><i class="fas fa-eraser"></i></span>
                                                    <span class="button__text2">Limpar Assinatura</span>
                                                </button>
                                                <button id="salvarAssCliente" type="button" class="button btn btn-success" style="margin-left:5px" title="Enviar Assinatura">
                                                    <span class="button__icon"><i class="far fa-save"></i></span>
                                                    <span class="button__text2">Enviar Assinatura</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- Fim tab assinaturas -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
    </div>
</div>

<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?= current_url() ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar Venda</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição*</label>
                <input class="span12" id="descricao" type="text" name="descricao" value="Fatura de Venda - #<?= $result->idOs; ?> " />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input class="span12" id="cliente" type="text" name="cliente" value="<?= $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?= $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?= $result->idOs; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="valor">Valor*</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />
                    <input class="span12 money" id="valor" type="text" name="valor" value="<?= number_format($total, 2, '.', '') ?> " />
                </div>
                <div class="span4">
                    <label for="vencimento">Data Vencimento*</label>
                    <input class="span12 datepicker" id="vencimento" type="text" name="vencimento" />
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp <input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">
                    <div class="span6">
                        <label for="recebimento">Data Recebimento</label>
                        <input class="span12 datepicker" id="recebimento" type="text" name="recebimento" />
                    </div>
                    <div class="span6">
                        <label for="formaPgto">Forma Pgto</label>
                        <select name="formaPgto" id="formaPgto" class="span12">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Débito">Débito</option>
                            <option value="Pix">Pix</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
            <button class="btn btn-primary">Faturar</button>
        </div>
    </form>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/signature_pad.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/assinaturas.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });

    $(document).on('click', '.anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var id = $(this).attr('imagem');
        $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
        $("#download").attr('href', "<?= base_url() ?>mine/downloadanexo/" + id);
    });
    
    <?php if($usar_assinatura && !$result->assClienteImg): ?>
        if(window.screen.width < 600 && window.screen.width > 391) {
            document.querySelector(".telSm").remove();
            document.querySelector(".padPc").remove();
        } else if(window.screen.width < 391) {
            document.querySelector(".telMd").remove();
            document.querySelector(".padPc").remove();
        } else if(window.screen.width > 600) {
            document.querySelector(".telSm").remove();
            document.querySelector(".telMd").remove();
        }

        window.base_url = <?php echo json_encode(base_url()); ?>;
        window.idOs     = $("#os_id").val();
    <?php endif; ?>

</script>
