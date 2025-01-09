function getChange(){
    $tend =  document.getElementById("tendered");
    $grand = document.getElementById("grand_total");
    $change =  document.getElementById("change");

    $t =  parseFloat($tend.value);
    $c = parseFloat($grand.innerText);

    if($t<$c){
        alert("Unsufficient amount");
    }else{
        $dif = $t - $c;
        $change.innerHTML = $dif;
    }
}


document.getElementById("addTrans").onsubmit = function(){
    $tend =  document.getElementById("tendered");
    $grand = document.getElementById("grand_total");
    $change =  document.getElementById("change");

    $t =  parseFloat($tend.value);
    $c = parseFloat($grand.innerText);

    if($tend.value == ""){
        return false;
    }if($t<$c){
        return false;
    }
}