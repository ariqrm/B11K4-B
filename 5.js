var even=function(nilai){
    var result = false;
    if(nilai%2==0){
        result=true;
    }
    return result;
}
var evenSum=function(limit){
    var a=0;
    var b=0;
    var c=1;
    var total=0;
    while(c<limit){
        if(even(c)==true){
            total=total+c;
        }
        a=b;
        b=c;
        c=a+b;
    }
    console.log(total);
}
var odd=function(nilai){
    var result = false;
    if(nilai%2==1){
        result=true;
    }
    return result;
}
var oddSum=function(limit){
    var a=0;
    var b=0;
    var c=1;
    var total=0;
    while(c<limit){
        if(odd(c)==true){
            total=total+c;
        }
        a=b;
        b=c;
        c=a+b;
    }
    console.log(total-1);
}




evenSum(1000);
oddSum(1000);