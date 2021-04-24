<div class="content-wrapper">
<?php
            $Duvida = read('faq');
             if ($Duvida->num_rows == 0){
                echo  '
                <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-12">
                    <div class="col-sm-12" id="accordion">
                      <h1 class="m-0">Nenhuma Duvida Cadastrada</h1>
                      ';
                }else{
                    echo '
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-12">
                                    <div class="col-sm-12" id="accordion">
                                        <h1 class="m-0">Duvidas</h1>';
                foreach($Duvida as $faq):
                    echo '
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse'.$faq['id'].'">
                                <div class="card-header">
                                    <h4 class="card-title w-100 h-0" style="height:0;">
                                    '.$faq['duvida'].'
                                    </h4>
                                    <h4 class="card-title" style="float:right;">
                                    '.$faq['data'].'
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse'.$faq['id'].'" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                '.$faq['resposta'].'
                                </div>
                            </div>
                        </div>';
                endforeach;
                }
            ?>
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <p class="lead">
                Em Caso De Outras Duvidas Entre Em Contato Pelo <a href="https://www.facebook.com/profile.php?id=100048943937149">Facebook.</a><br />
            </p>
        </div>
    </div>
</section>
<!-- /.content -->
</div>