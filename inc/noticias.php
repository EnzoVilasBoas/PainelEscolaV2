
            <?php
            $noticias = read('noticias');
             if ($noticias->num_rows == 0){
                echo  '
                <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-12">
                    <div class="col-sm-12" id="accordion">
                      <h1 class="m-0">Nenhuma Noticia Cadastrada</h1>
                      ';
                }else{
                    echo '
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-12">
                                    <div class="col-sm-12" id="accordion">
                                        <h1 class="m-0">Noticias</h1>';
                foreach($noticias as $noticias):
                    echo '
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse'.$noticias['id'].'">
                                <div class="card-header">
                                    <h4 class="card-title w-100 h-0" style="height:0;">
                                    '.$noticias['titulo'].'
                                    </h4>
                                    <h4 class="card-title" style="float:right;">
                                    '.$noticias['data'].'
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse'.$noticias['id'].'" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                '.$noticias['descr'].'
                                </div>
                            </div>
                        </div>';
                endforeach;
                }
            ?>