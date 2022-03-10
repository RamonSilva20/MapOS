<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Mine - Área do Cliente - <?php echo $this->config->item('app_name') ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>
</head>

<body>
    <div class="row-fluid" style="margin-top:0">
        <div class="span6 offset3">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <h5>Cadastra Nova Senha</h5>
                </div>
                <div class="widget-content nopadding tab-content">

                    <form action="" id="formCliente" method="post" class="form-horizontal">
                        <div class="span8 offset4">
                            <h5>
                                <span class="required">Digite sua nova senha.</span>
                            </h5>
                        </div>
                        <div class="control-group">
                            <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                            <div class="controls">
                                <input id="senha" type="password" name="senha" value="" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3" style="display:flex;justify-content: center">
                                    <button name="senhaClient" id="senhaClient" type="submit" class="button btn btn-success btn-large"><span class="button__icon"><i class='bx bx-lock-open'></i></span><span class="button__text2">Alterar</span></button>
                                    <a href="<?php echo base_url() ?>index.php/mine" id="" class="button btn btn-warning"><span class="button__icon"><i class='bx bx-lock-alt'></i></span><span class="button__text2">Acessar</span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#senhaClient', function(event) {
                event.preventDefault();
                var senha = $("input[name='senha']").val();
                var token = "<?= $token ?>";

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>index.php/mine/senhaSalvar",
                    dataType: 'json',
                    data: {
                        token: token,
                        senha: senha
                    },
                    success: function(data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: "success",
                                title: "Salvo com Sucesso",
                                text: data.message
                            });
                            window.location.replace("<?php echo base_url() ?>index.php/mine/");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: data.message
                            });
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: data.message
                        });
                    }
                });
            });
        });
    </script>


    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12">
            <?= date('Y') ?> &copy; <?php echo $this->config->item('app_name') ?>
        </div>
    </div>

    <!-- javascript
================================================== -->

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>