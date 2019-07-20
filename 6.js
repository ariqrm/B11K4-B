function mrBrulee(JOM, N, digit){
    var s = [];
    var sdigit = [];
    var total = [];
    var dlength = digit.length;
    for(var i = 0; i <= N; i++){
        s += i;
    };
    var JOM1;
    if(JOM == 'SUM'){
        JOM1 = '+';
    }else
    if(JOM == 'MUL'){
        JOM1 = '*';
    }else
    if(JOM == 'SUB'){
        JOM1 = '-';
    }else
    if(JOM == 'DIV'){
        JOM1 = '/';
    }
    for(var j = 0 ; j < dlength; j++){
        sdigit = digit[j];
        total += s[sdigit];
        if(j < dlength-1){
        total += JOM1;
        }
    }
    return eval(total);
}

console.log(mrBrulee('MUL',20, [12,15,17,19]));