var es = Array();
es[1] = function(){
  var a = parseInt(prompt("Primo numero:"));
  var b = parseInt(prompt("Secondo numero:"));
  alert("Risultato:" + (a+b));
};
es[2] = function(){
  var a = parseInt(prompt("Numero:"));
  if(a<1 || a>15)
    alert('Error');
  else{
    alert(fact(a));
  }
};
es[3] = function(){
  var month = parseInt(prompt('Mese:'));
  var day = parseInt(prompt('Giorno del mese:'));
  var year = parseInt(prompt('Anno:'));
  var dpm = [1,-2,1,0,1,0,1,1,0,1,0,1];
  if((year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)))
    dpm[1]=-1;
  var good_date = false;
  var d = new Date();
  if(dpm[month-1]!==undefined && (dpm[month-1]+30)>=day)
    good_date=true;
  alert(good_date);
};
es[4] = function(){
  var output = document.getElementById('output');
  output.innerHTML = "";
  var stats = {1:0,2:0,3:0,4:0,5:0,6:0};
  var l = parseInt(prompt('Lanci:'));
  var tc = document.createElement('div');
  tc.style.float = "left";
  var table = document.createElement('table');
  table.style.border = "1px solid #ccc";
  var tr = document.createElement('tr');
  tr.style.border = "1px solid #ccc";
  var result="";
  for(i=1; i<=l; i++){
    var t = ""+ ((Math.random()*6) + 1);
    var td = document.createElement('td');
    td.style.border = "1px solid #ccc";
    tr.appendChild(td);
    td.innerHTML = t.charAt(0);
    stats[t.charAt(0)]++;
    if(i%15 == 0){
      table.appendChild(tr);
      tr = document.createElement('tr');
      tr.style.border = "1px solid #ccc";
    }
    table.appendChild(tr);
  }
  tc.appendChild(table);
  var ts = document.createElement('div');
  ts.style.float = 'right';
  output.appendChild(tc);
  table = document.createElement('table');
  tr = document.createElement('th');
  td = document.createElement('td');
  td.innerHTML = '#';
  tr.appendChild(td);
  td = document.createElement('td');
  td.innerHTML = 'volte';
  tr.appendChild(td);
  table.appendChild(tr);
  for(var n in stats){
    tr = document.createElement('tr');
    td = document.createElement('td');
    td.innerHTML = n;
    tr.appendChild(td);
    td = document.createElement('td');
    td.innerHTML = stats[n];
    tr.appendChild(td);
    table.appendChild(tr);
  }
  ts.appendChild(table);
  output.appendChild(ts);
}
es[5] = function(){
  var output = document.getElementById('output');
  output.innerHTML = "";
  var np = parseInt(prompt("Numero di parametri"));
  var pname = [];
  for(i=0; i<np; i++){
    pname.push(prompt("Nome parametro "+i));
  }
  var body = prompt("inserire corpo della funzione:");
  var f = new Function(pname,"return " + body +";");
  var pval = [];
  for(i=0; i<np; i++){
    pval.push(prompt("Nome parametro "+i));
  }
  output.innerHTML = f(pval);
}
function fact(n) {
  if (n <= 1) return 1;
  return n*fact(n-1);
}
