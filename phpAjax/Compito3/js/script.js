Element.prototype.isArray = function(){ return false;};
NodeList.prototype.isArray = Array.prototype.isArray = HTMLCollection.prototype.isArray = function(){return true;}
function ge(){
  this.el = document;
};
ge.prototype.e = function(){
  return this.el;
};
ge.prototype.get = function(selector){
  if(selector instanceof HTMLElement){
    this.el = selector;
    return this;
  }
  switch(selector.charAt(0)){
    case '.':
      this.el =  [].slice.call(this.el.getElementsByClassName(selector.replace('.','')));
    break;
    case '#':
      this.el =  document.getElementById(selector.replace('#',''));
    break;
    default:
      this.el =  [].slice.call(this.el.getElementsByTagName(selector));
  }
  if(this.el && this.el.isArray() && this.el.length == 1){
    this.el = this.el[0];
  }
  return this;
}
ge.prototype.addClass = function(classes){
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i].classList.add(classes);
    }
  } else {
    this.el.classList.add(classes);
  }
  return this;
};
ge.prototype.removeClass = function(classes){
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i].classList.remove(classes);
    }
  } else {
    this.el.classList.remove(classes);
  }
  return this;
};
ge.prototype.hasClass = function(classes){
  var res = true;
  if(this.el.isArray()){
    for(i in this.el){
      res = res && this.el[i].classList.contains(classes);
    }
  } else {
    res = this.el.classList.contains(classes);
  }
  return res;
}
ge.prototype.bind = function(ev,handler){
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i][ev] = handler;
    }
  } else {
    this.el[ev] = handler;
  }
  return this;
}
ge.prototype.text = function(str){
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i].innerHTML = str;
    }
  } else {
    this.el.innerHTML = str;
  }
  return this;
}
ge.prototype.append = function(str){
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i].appendChild(document.createTextNode(str));
    }
  } else {
    this.el.appendChild(document.createTextNode(str));
  }
  return this;
}
ge.prototype.addChild = function(tag,attr){
  var child = document.createElement(tag);
  for(i in attr){
    tag[i] = attr[i];
  }
  if(this.el.isArray()){
    for(i in this.el){
      this.el[i].appendChild(child);
    }
  } else {
    this.el.appendChild(child);
  }
  return this;
}
ge.prototype.each = function(handler){

  if(this.el.isArray()){
    for(var i=0; i< this.el.length; i++){
      handler(this.el[i],i);
    }
  } else {
    handler(el,0);
  }
  return this;
}
var s = function(){
  var g = new ge();
  switch (arguments.length) {
    case 1 :
      return g.get(arguments[0]);
      break;
    case 2 :
      return g.get(arguments[0]).get(argument[1]);
        break;
  }
  return g;
}

s(".nav-header").bind('onclick',function(){
    if(s(this).hasClass('open')){
      s(this).removeClass('open');
      s(this).addClass('close');
    } else {
      s(this).removeClass('close');
      s(this).addClass('open');
    }
});
var d = new Date();
s('#date').text(d.getDate()+'/'+
                d.getMonth()+'/'+
                d.getFullYear()+' '+
                d.getHours()+':'+
                d.getMinutes()+'.'+
                d.getSeconds());
s('#browser').text(window.navigator.appName + "<br />" + window.navigator.platform);
if(s('#form').e()!==null){
  s('#form').bind('onsubmit',function(e){
    e.preventDefault();
    var val = true;
    s('#info').text('');
    s(this).get('input').each(function(el,i){
      if(el.required && el.value===''){
        s('#info').append('il campo '+ el.name + ' è obbligatorio').addChild('br');
        val = false;
      }
      if(new RegExp(el.pattern).test(el.value)===false){
        s('#info').append('il campo '+ el.name + el.value + ' non è corretto').addChild('br');
        val = false;
      }
    });
    var txt = s(this).get('textarea').e();
    if(new RegExp(txt.pattern).test(txt.value)===false){
      s('#info').append('il campo '+ txt.name + ' non è corretto').addChild('br');
    }
    if(val)
      this.submit();

  });
  s('#form').bind('onreset',function(e){
    if(window.confirm("Vuoi resettare?")){
      return;
    } else {
      e.preventDefault();
    }
  });
}
if(s('#gallery').e()!==null) {
  var ii = 1;
  s('.img').bind('onclick',function(){
    var bigsrc = s(this).get('img').e().src.replace('/min','');
    s('.mainimg').e().src =bigsrc;
    s('#ext').e().href=bigsrc;
    ii = parseInt(s(this).get('img').e().dataset.n);
  });
  s('.command').bind('onclick',function(){
    console.log(this);
    if(this.id==='pre'){
      ii = ii - 1 > 0 ? ii-1 : 4;
    } else {
      ii == ii + 1 > 4 ? 0 : ii+1;
    }
    console.log(ii);
    s('.mainimg').e().src = s(s('.img').e()[ii-1]).get('img').e().src;
  });
  s('#ext').bind('onclick',function(e){
    e.preventDefault();
    var neww = window.open(this.href,"big","width=800, height=800");
  });
}
