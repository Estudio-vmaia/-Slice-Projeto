<div class="section-goods">
  <div class="b-goods-group row" >
    
    <?php

    include('conn_db.php');

    //SELECT
    $busca_veiculos = "select * from tb_veiculos";

    $result_veiculos = mysqli_query($conn, $busca_veiculos) or die ("Erro 0x00110-Veiculos - ".mysqli_error($conn)); 
    $cont_rows_table = 0;

    while($row_veiculos = mysqli_fetch_array($result_veiculos))
    {
      $db_id            = $row_veiculos['id'];
      $db_marca         = $row_veiculos['marca'];
      $db_modelo        = $row_veiculos['modelo'];
      $db_km            = $row_veiculos['km'];
      $db_valor         = $row_veiculos['valor'];
      $db_ano           = $row_veiculos['ano'];
      $db_cambio        = $row_veiculos['cambio'];
      $db_combustivel   = $row_veiculos['combustivel'];
      $db_potencia      = $row_veiculos['potencia'];
      $db_imagem        = $row_veiculos['imagem'];

      //$array_a[$SQL_Field] = $SQL_Field;
      // ${"array_DB_" . $tableMySql}[$SQL_Field] = $SQL_Field;
   
     ?>

    <div class="col-lg-4 col-md-6">
      <div class="b-goods b-goods_back_sm">
        
        <span class="header-main__link btn_header_search">
          <button class="flip-btn" alt="Editar" title="Editar" onclick="SetAcao('editar','<?php print $db_id; ?>'); "><span></span><span class="flip-btn-mdl"></span><span></span></button>
        </span>
        
        <div class="flip-container">
          <div class="flipper">
            <div class="flip__front">
              <div style="font-weight: bold;font-size: 20px; background-color: #e3740e; color: #fff"> <?php print  $db_marca; ?> </div>
              <div class="b-goods__img"><img class="img-scale" src="ImagesVeiculos/<?php print $db_imagem; ?>" alt="foto"/></div>
              <div class="b-goods__inner">
                <div class="b-goods__header">
                  <div class="b-goods__name"><?php print $db_modelo ?></div>
                  <ul class="ui-rating list-unstyled">
                    <li class="active"><i class="fas fa-star"></i></li>
                    <li class="active"><i class="fas fa-star"></i></li>
                    <li class="active"><i class="fas fa-star"></i></li>
                    <li class="active"><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                  </ul>
                  <div class="b-goods__check"><img class="img-fluid" src="assets/media/content/b-goods/check.jpg" alt="AutoCheck"/></div>
                </div>
                
                <div class="b-goods__footer">
                  <div class="b-goods__main-descr"><i class="ic flaticon-speedometer"></i><?php print $db_km; ?></div>
                  <div class="b-goods__price">
                    <div class="b-goods__price-main bg-primary">R$ <?php print $db_valor; ?></div>                                  
                  </div>
                  <ul class="b-goods-descr list-unstyled">
                    <li class="b-goods-descr__item"><?php print $db_ano; ?></li>
                    <li class="b-goods-descr__item"><?php print $db_cambio; ?></li>
                    <li class="b-goods-descr__item"><?php print $db_combustivel; ?></li>
                    <li class="b-goods-descr__item"><?php print $db_potencia; ?></li>
                  </ul>                                
                </div>
              </div>
            </div>
           

          </div>
        </div>
      </div>                    
    </div>

<?php } ?>

  </div>
 
  <!--
  <nav class="mt-3" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
    </ul>
  </nav>
  -->
</div>