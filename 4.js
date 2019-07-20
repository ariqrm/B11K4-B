function arkaFood(harga, kodeP, jarak, pajak){
    //menghitung jarak min
    var cost    = 5000;
    if(jarak>=1.5){
        var jCost1 = jarak-1.5;
    }else{
        var jCost1 = 0;
    }
    // setelah 1.5 km
    var jCost2 = jCost1*3000;
    var jCost3 = cost+jCost2;
    // cek pajak 
    var tHarga;
    if(pajak=='True'){
        tHarga = harga+(harga*5/100);
    }else{
        tHarga = harga;
    }
    // cek kode promo
    var diskon;
    var tDiskon;
    if(kodeP == 'DITRAKTIRDEMY' && harga >= 25000){
        tDiskon = tHarga*60/100;
        diskon = tHarga-(tHarga*60/100);
        if(tDiskon>=30000){
            diskon = tHarga-30000;
        }
    }else
    if(kodeP == 'ARKAFOOD5' && harga >= 50000){
        tDiskon = tHarga*50/100;
        diskon = tHarga-(tHarga*50/100);
        if(tDiskon>=50000){
            diskon = tHarga-50000;
        }
    }else{
        diskon = tHarga;
    }
    // menhitung total pembayaran
    var total = diskon+jCost3;
    console.log('Rp.'+total);
  }

arkaFood(75000, 'DITRAKTIRDEMY', 5, 'False');
  