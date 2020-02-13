// verifica a largura da tela e aplica as modificações
function isBreakPoint(default3,itemsHtml , bp){
  if(jQuery(window).width() < bp)
    toOneColumn(itemsHtml); 
  else
    toThreeColumn(default3);    
}
// ajusta a exibilção mobile para uma coluna
function toOneColumn(itemsHtml){  
  var items = '.cr_multiplos .carousel_item_post'; 
  jQuery('.carousel-inner').html(itemsHtml);
  jQuery(items).addClass('carousel-item');
  //adiciona active ao primeiro novo item de carousel
  jQuery(items).eq(0).addClass("active");
  //layout
  jQuery(items).removeClass('col-md-4');
  //imagem
  //jQuery(items).find('img').css('width','60%')
  //escreve os indicadores
  writeIndicators(items);  
}
function toThreeColumn(default3){  
  var items = '.cr_multiplos .carousel-item'; 
  jQuery('.carousel-inner').html(default3);
  writeIndicators(items);
}
function writeIndicators(items){
  var n = jQuery(items).length;
  for(i = 0 ; i < n ; i++){
    if(i == 0)
      var cr_indicators =  '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
    else
      cr_indicators += ' <li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" ></li>';
  }
  jQuery(".carousel-indicators").html(cr_indicators);
}
function writeDep(){
  jQuery(".carousel_item_post p").each(function(){
    var txt = jQuery(this).text();
    txt = "<span class='depo_aspas'>\"</span>" + txt + "<span class='depo_aspas'>\"</span";
    jQuery(this).html(txt);
  });  
}
jQuery(document).ready(function(){
  const breakPoint = 768; // insira a largura de troca para 1 coluna 
  writeDep();
  const default3 = jQuery('.carousel-inner').html();
  var itemsHtml = jQuery('.cr_cards').eq(0).html() + jQuery('.cr_cards').eq(1).html();
  isBreakPoint(default3,itemsHtml , breakPoint); //verificar inicialmente  
  jQuery(window).resize(function(){ 
    isBreakPoint(default3,itemsHtml , breakPoint); //verificar na mudança de largura
  });
});