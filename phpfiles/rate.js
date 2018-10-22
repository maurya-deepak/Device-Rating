
    var i = 0;
    arr = [];
    total_rate = 0;
    function myFunction(x, temp){
        console.log(temp) 
    if(arr.includes(temp)){
        i = 0;
        arr.splice(arr.indexOf(temp),1);
    }
    else{
        i = 1;
        arr[temp-1] =  temp;
        // console.log(arr);
    }
    
    if(i%2 != 0){
    x.style.color = "red"; 
    total_rate = total_rate + 1;
    x.style.fontSize = "28px"; 
    // console.log(rate);                                             
    }
    else{
        x.style.color = "silver";
        x.style.fontSize = "25px";
        total_rate = total_rate - 1;

        // console.log(rate); 
    }
        document.getElementById("rate_count").value  = total_rate;
    }
   
   