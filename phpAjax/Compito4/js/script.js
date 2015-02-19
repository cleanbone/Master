$(".nav-header").bind('click',function(){
    if($(this).hasClass('open')){
      $(this).removeClass('open');
      $(this).addClass('close');
    } else {
      $(this).removeClass('close');
      $(this).addClass('open');
    }
});

/*
var d = new Date();
$('#date').text(d.getDate()+'/'+
                d.getMonth()+'/'+
                d.getFullYear()+' '+
                d.getHours()+':'+
                d.getMinutes()+'.'+
                d.getSeconds());
$('#browser').text(window.navigator.appName + "<br />" + window.navigator.platform);
if($('#form').e()!==null){
  $('#form').bind('onsubmit',function(e){
    e.preventDefault();
    var val = true;
    $('#info').text('');
    $(this).get('input').each(function(el,i){
      if(el.required && el.value===''){
        $('#info').append('il campo '+ el.name + ' è obbligatorio').addChild('br');
        val = false;
      }
      if(new RegExp(el.pattern).test(el.value)===false){
        $('#info').append('il campo '+ el.name + el.value + ' non è corretto').addChild('br');
        val = false;
      }
    });
    var txt = $(this).get('textarea').e();
    if(new RegExp(txt.pattern).test(txt.value)===false){
      $('#info').append('il campo '+ txt.name + ' non è corretto').addChild('br');
    }
    if(val)
      this.submit();

  });
  $('#form').bind('onreset',function(e){
    if(window.confirm("Vuoi resettare?")){
      return;
    } else {
      e.preventDefault();
    }
  });
}*/
if($('form').length){
  $('input, textarea').bind('change',function(){
    var src = 'inc/form.php?'+
      'name='+$(this).attr('name') +
      '&type='+$(this).attr('type')+
      '&value='+this.value;
    $('#info').load(src);
  });
}
if($('#gallery').length) {
  var ii = 1;
  $('.img').bind('click',function(){
    var bigsrc = $(this).children('img').attr('src').replace('/min','');
    $('.mainimg').attr("src",bigsrc);
    $('#ext').get().href=bigsrc;
    ii = parseInt($(this).children('img').attr("data-n"));
  });
  $('.command').bind('click',function(){
    if(this.id==='pre'){
      ii = ii - 1 > 0 ? ii-1 : 4;
    } else {
      ii = ii + 1 > 4 ? 0 : ii+1;
    }
    console.log(ii);
    $('.mainimg').attr('src',$('.img:eq('+ (ii-1) +') img').attr('src').replace('/min',''));
  });
  $('#ext').bind('click',function(e){
    e.preventDefault();
    var neww = window.open(this.href,"big","width=800, height=800");
  });
}
