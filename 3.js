function input(str) {
    var patt1 = /pro|gram|merit|it/g;
    var patt2 = /program|merit|it/g;
    var patt3 = /programmer|it/g;
    var result1 = str.match(patt1);
    var result2 = str.match(patt2);
    var result3 = str.match(patt3);
    console.log('$ '+result1);
    console.log('$ '+result2);
    console.log('$ '+result3);
  }
input('programit');