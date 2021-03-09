
<!DOCTYPE html>
<html lang="zxx">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Projeto Slice</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="telephone=no" name="format-detection">
      <meta name="HandheldFriendly" content="true">
      <link rel="stylesheet" href="assets/css/master.css">
     

  </head>

  <style type="text/css">
    .forminput{
      font-size: 20px;
      font-weight: normal;
    }
    .optioncustom
    {
      color: #fff;
      background: rgba(0, 0, 0, 0.3);
    }

  </style>

  <body class="page">
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>      
    <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
       
      <!-- BUISCA MODAL-->
      <div class="header-search open-search">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 offset-sm-2 col-10 offset-1">
              <div class="navbar-search">
                <form id="FormCadastro" name="FormCadastro" method="POST" class="search-global" onSubmit="return submitform();">

                  <input type="hidden" id="idDelEdit" name="idDelEdit"/>
                  <input type="hidden" id="acao" name="acao"/>
                  
                  <select class="search-global__input forminput" id="marca" name="marca">
                      <option value="" disabled selected hidden>Selecione a Marca</option>
                      <?php
                        include('conn_db.php');
                        
                        $busca_veiculos = "select DISTINCT marca from tb_veiculos order by marca";

                        $result_veiculos = mysqli_query($conn, $busca_veiculos) or die ("Erro 0x00110-Veiculos - ".mysqli_error($conn)); 
                        $cont_rows_table = 0;

                        while($row_veiculos = mysqli_fetch_array($result_veiculos))
                        {
                          $db_marca = $row_veiculos['marca'];                                                 
                          print '<option class="optioncustom" value="'.$db_marca.'">'.$db_marca.'</option>';
                        }
                      ?>

                  </select>

                  <input class="search-global__input forminput" type="text" placeholder="Modelo" id="modelo" name="modelo" autocomplete="off"/>
                  <input class="search-global__input forminput" type="text" placeholder="KM" id="km" name="km" autocomplete="off" />
                  <input class="search-global__input forminput" type="text" placeholder="Valor" id="valor" name="valor" autocomplete="off" />
                  <input class="search-global__input forminput" type="text" placeholder="Ano" id="ano" name="ano" autocomplete="off"/>
                  <input class="search-global__input forminput" type="text" placeholder="Câmbio" id="cambio" name="cambio" autocomplete="off"/>
                  <input class="search-global__input forminput" type="text" placeholder="Combustível" id="combustivel" name="combustivel" autocomplete="off"/>
                  <input class="search-global__input forminput" type="text" placeholder="Potência" id="potencia" name="potencia" autocomplete="off"/>
                  
                  <!--- <input class="search-global__input forminput" type="text" placeholder="Imagem" id="imagem" name="imagem" autocomplete="off"/> -->

                  <br><br>
                  <button id="botaoAcao" name="botaoAcao" type="submit" class="b-goods__price-main bg-primary" style="float: right;">NOMEADO PELO JS</button>

                  <button id="botaoDelete" name="botaoDelete" type="submit" class="b-goods__price-main bg-primary" style="float: right; display: none" onclick="deletar();">apagar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <button class="search-close close" type="button" id="closeModal"><i class="fa fa-times"></i></button>
      </div>
     
      <header class="header">
        <div class="top-bar">
          <div class="container">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="top-bar__item"><a class="top-bar__link" href="mailto:contato@email.com.br"><i class="ic fas fa-envelope text-primary"></i> contato@email.com.br</a></div>
                <div class="top-bar__item"><i class="ic fas fa-clock text-primary"></i> Seg a Sex : 9:00 às 18:00</div>
                <div class="top-bar__item"><i class="ic fas fa-map-marker-alt text-primary"></i> Av. Engenheiro Caetano Álvares, n° 55</div>
              </div>
              <div class="col-auto" style="height: 50px;">
                
              </div>
            </div>
          </div>
        </div>
        <div class="header-main">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto"><a class="navbar-brand navbar-brand_light scroll" href="home.html"><img class="normal-logo" src="assets/media/general/logo-light.png" alt="logo"/></a><a class="navbar-brand navbar-brand_dark scroll" href="home.html"><img class="normal-logo" src="assets/media/general/logo-dark.png" alt="logo"/></a></div>
              <div class="col-auto">
                <div class="header-contacts d-none d-md-block d-lg-none d-xl-block"><i class="ic text-primary fas fa-phone"></i><span class="header-contacts__inner"><span class="header-contacts__info">Ligue pra nós</span><a class="header-contacts__number" href="tel:1138562122">Tel. 11 3856 2122</a></span></div>
                
              </div>
                
            </div>
          </div>
        </div>
      </header>
      <!-- end .header-->
      <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
        <div class="area-bg__inner">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md">
                <h1 class="b-title-page">Site Veículos Teste</h1>
                <div class="ui-decor bg-primary"></div>
              </div>
              <div class="col-md-auto">
                <span class="header-main__link btn_header_search">
                  <a class="b-title-page__btn bg-primary" href="#" onclick="SetAcao('cadastrar'); ">CADASTRAR NOVO VEICULO!</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end .b-title-page-->
      
      
      <div class="l-main-content">
        <div class="container">
          <div class="row">
            <div class="col-xl-3">
              <aside class="l-sidebar">
                <div class="widget section-sidebar bg-gray">
                  <h3 class="widget-title bg-dark row justify-content-between align-items-center no-gutters"><i class="ic flaticon-porsche bg-primary col-auto"></i><span class="widget-title__inner col">Filtros</span></h3>
                  <div class="widget-content">
                    <div class="widget-inner">
                      <form class="b-filter">
                        <div class="b-filter__main">
                          <div class="b-filter__row">
                            <select class="selectpicker" data-width="100%" title="Marca" multiple="multiple" data-max-options="1" data-style="ui-select">
                              <?php
                              $busca_veiculos = "select DISTINCT marca from tb_veiculos order by marca";
                              $result_veiculos = mysqli_query($conn, $busca_veiculos) or die ("Erro 0x00110-Veiculos - ".mysqli_error($conn)); 
                              while($row_veiculos = mysqli_fetch_array($result_veiculos))
                              {
                                $db_marca = $row_veiculos['marca'];                                                 
                                print '<option value="'.$db_marca.'">'.$db_marca.'</option>';
                              }
                              ?>                              
                            </select>
                          </div>
                          <div class="b-filter__row">
                            <select class="selectpicker" data-width="100%" title="Modelo" multiple="multiple" data-max-options="1" data-style="ui-select">
                              <?php
                              $busca_veiculos = "select DISTINCT modelo from tb_veiculos order by marca";
                              $result_veiculos = mysqli_query($conn, $busca_veiculos) or die ("Erro 0x00110-Veiculos - ".mysqli_error($conn)); 
                              while($row_veiculos = mysqli_fetch_array($result_veiculos))
                              {
                                $db_marca = $row_veiculos['modelo'];                                                 
                                print '<option value="'.$db_marca.'">'.$db_marca.'</option>';
                              }
                              ?>
                              
                            </select>
                          </div>
                          <div class="b-filter__row">
                            <select class="selectpicker" data-width="100%" title="Combustível" multiple="multiple" data-max-options="1" data-style="ui-select">
                              <option>Gasolina</option>
                              <option>Alcool</option>
                              <option>Flex</option>
                              <option>Diesel</option>
                            </select>
                          </div>
                          <div class="b-filter__row">
                            <select class="selectpicker" data-width="100%" title="Câmbio" multiple="multiple" data-max-options="1" data-style="ui-select">
                              <option>Automático</option>
                              <option>Manual</option>
                              <option>4 X 4</option>
                            </select>
                          </div>
                          <div class="b-filter__row row">
                            <div class="b-filter__item col-md-6 col-lg-12 col-xl-6">
                              <select class="selectpicker" data-width="100%" title="De" multiple="multiple" data-max-options="1" data-style="ui-select">
                                <?php
                                for ($i = 2015; $i <= 2020; $i++) {
                                    print '<option>'. $i.'</option>';
                                }
                                ?>                               
                              </select>
                            </div>
                            <div class="b-filter__item col-md-6 col-lg-12 col-xl-6">
                              <select class="selectpicker" data-width="100%" title="Até" multiple="multiple" data-max-options="1" data-style="ui-select">
                                 <?php
                                for ($i = 2015; $i <= 2020; $i++) {
                                    print '<option>'. $i.'</option>';
                                }
                                ?>     
                              </select>
                            </div>
                          </div>
                          
                        </div>
                        
                        <button class="b-filter__reset btn btn-default btn-lg w-100">Aplicar</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </aside>
            </div>

            <div class="col-xl-9" id="ClassficadosVeiculos">
  
            </div>
          </div>
        </div>
      </div>
        <footer class="footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-5">
                <div class="footer-section footer-section_info">
                  <div class="footer__title">Site Veículos Teste</div>
                  <div class="footer__slogan">Melhor atendimento da região.</div>
                  <div class="footer-info">Eipisicing elit sed do eiusmod tempor laboe dolore magna aliqa Ut enim ad minim veniam quis nostrud exercitation ullam.</div>
                  
                </div>
              </div>
              
              <div class="col-lg-4 col-md-7 col-sm-3">
                <div class="row">
                  <div class="col-md-12">
                    <section class="footer-section footer-section_link">
                      <div class="footer-contacts">
                    <div class="footer-contacts__item"><i class="ic fas fa-map-marker-alt text-primary"></i>Av. Engenheiro Caetano Álvares, n° 55</div>
                    <div class="footer-contacts__item"><i class="ic fas fa-envelope text-primary"></i><a href="mailto:contato@email.com.br">contato@email.com.br</a></div>
                    <div class="footer-contacts__item"><i class="ic far fa-clock text-primary"></i>Seg a Sex : 9:00 às 18:00</div><a class="footer-contacts__phone" href="tel:1138562122">Tel. 11 3856 2122</a>
                  </div>
                    </section>
                  </div>
                  
                </div>
              </div>

              <div class="col-lg-4">
                <section class="footer-section footer-section_subscribe">
                  <h3 class="footer-section__title">Quer receber novidades?</h3><i class="ui-decor bg-primary"></i>
                  <form class="footer-form">                    
                    <div class="form-group">
                      <input class="footer-form__input form-control" type="email" placeholder="Seu email">
                    </div>
                    <button class="btn btn-sm btn-primary">Inscrever-se</button>
                  </form>
                </section>
              </div>
            </div>
            
            <div class="footer-copyright">
              Copyright 2021 SITE CONCESSIONÁRIA TESTE - SLICE| Todos os direitos reservados.
              <a class="footer-copyright__link" href="#">Política e Privacidade</a>
            </div>
          </div>
        </footer>
        <!-- .footer-->
    </div>
    <!-- end layout-theme-->
    

    <?php include('Js.php'); ?>

    
    <!-- MAIN SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!---->
    <!-- Color scheme-->
   
    <!-- Select customization & Color scheme-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>
   
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Scale images-->
    <script src="assets/plugins/ofi.min.js"></script>
    <!-- Slider number-->
    <script src="assets/plugins/noUiSlider/wNumb.js"></script>
    <script src="assets/plugins/noUiSlider/nouislider.min.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
    <!-- Slider number-->
    <script src="assets/plugins/noUiSlider/wNumb.js"></script>
    <script src="assets/plugins/noUiSlider/nouislider.min.js"></script>
  </body>
</html>