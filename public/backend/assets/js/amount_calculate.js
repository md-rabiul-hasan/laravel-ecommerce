function detectProductCurrentPrice(){
    var selling_price       = $("#selling_price").val();
    var discount_percentage = $("#discount_percentage").val();
    var current_price =  selling_price -  ((selling_price / 100) * discount_percentage);
    $("#current_price").val(current_price);
    $("#current_price_in_word").html(inWords(current_price));
}

function numberToInwordsConvert (num) {
    var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
  var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
      if ((num = num.toString()).length > 9) return 'overflow';
      n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
      if (!n) return; var str = '';
      str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
      str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
      str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
      str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
      str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]])  : '';
      return str;
  }


  function inWords(amt){
    var amtt = amt.toString();
    if(amtt.includes(".")){
        var amount = amtt.split('.');
        var taka = numberToInwordsConvert(amount[0]);
        var poisa = '';
        if(amount[1]){
            poisa = numberToInwordsConvert(amount[1]);
            poisa = ' & ' + poisa + ' Poisa';
        }
        var total_amount = taka + ' Taka ' + poisa;
        return total_amount;
    }else{
        var taka = numberToInwordsConvert(amt);
        var total_amount = taka + ' Taka ';
        return total_amount;
    }
    
  }