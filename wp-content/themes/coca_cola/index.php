<?php
get_header();
?>

    <main data-spy="scroll" data-target="#barra-principal">
        <section id="inicio">
            <div class="bd-example">
                <div id="master-carroussel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#master-carroussels" data-slide-to="0" class="active"></li>
                        <li data-target="#master-carroussel" data-slide-to="1"></li>
                        <li data-target="#master-carroussel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center">
                            <img src="<?php echo get_template_directory_uri();?>/images/retornavel.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item text-center">
                            <img src="<?php echo get_template_directory_uri();?>/images/familia.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item text-center">
                            <img src="<?php echo get_template_directory_uri();?>/images/coca_cola_brasil.png">
                            <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/8psN2C_s6Jk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sobre" class="container">
            <h2 class="section-header text-center mb-5">
                Sobre
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Missão</h3>
                    <p>
                        Satisfazer nossos clientes com excelência em atendimento, desenvolvendo fortes parcerias,
                        garantindo
                        qualidade dos nossos produtos e serviços.
                    </p>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Visão</h3>
                    <p>
                        Duplicar o valor do negócio a cada cinco anos e ser o principal DA - Distribuidor FEMSA da área
                        sul.
                        <br>
                        Melhorando continuamente os nossos serviços garantindo qualidade e uma rentabilidade justa.
                    </p>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-md-12">
                    <h3 class="text-center">Valores</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <h5>PAIXÃO</h5>
                    Brilho nos olhos<br>
                    Sede por mais persistência<br>
                </div>
                <div class="col-md-3">
                    <h5>LIDERANÇA</h5>
                    Liderar e crescimento continuo do negócio <br>
                    Encarar de frente os desafios<br>
                    Coragem para modelar um futuro melhor<br>
                </div>
                <div class="col-md-3">
                    <h5>ÉTICA</h5>
                    Respeito mútuo<br>
                    Fazer o correto íntegro e honesto<br>
                    Ser autêntico e dizer o que pensa<br>
                </div>
                <div class="col-md-3">
                    <h5>INOVAÇÃO</h5>
                    Quebrar paradigmas e estimular a criatividade<br>
                    Buscar o inesperado e surpreender sempre<br>
                    Aproveitar as oportunidades<br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <h5>RESPONSABILIDADE</h5>
                    Agir como dono do negocio sempre<br>
                    Se tem que ser, depende de mim<br>
                    Cumprir compromissos com os nossos clientes internos e externos<br>
                </div>
                <div class="col-md-3">
                    <h5>QUALIDADE</h5>
                    Exigir sempre mais de si mesmo<br>
                    O que fazemos, fazemos bem feito<br>
                    Deixar tudo melhor do que encontramos<br>
                </div>
                <div class="col-md-3">
                    <h5>COMUNICAÇÃO</h5>
                    Adequada<br>
                    Transparente<br>
                    Contínua e Integrada<br>
                </div>
                <div class="col-md-3">
                    <h5>COLABORAÇÃO</h5>
                    Valorizar os diferentes pontos de vista<br>
                    Explorar o trabalho coletivo<br>
                    Estar disponível e compartilhar o conhecimento<br>
                </div>
            </div>
            <hr class="mt-4">
        </section>


        <section id="contato" class="container">
            <h2 class="section-header text-center">
                Contato
            </h2>

            <div class="section-body">
                <!-- <form>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="João da Silva">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                               placeholder="(00) 0 0000-0000">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Do que precisa?</label>
                        <textarea class="form-control" id="descricao" rows="3"></textarea>
                    </div>
                    <button class="btn btn-danger">Enviar</button>
                </form>-->
				<?php echo do_shortcode('[happyforms id="3563" /]');?>
            </div>
        </section>
    </main>

<?php
get_footer();