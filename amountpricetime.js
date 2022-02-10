var lastquantity2;
			    var id = 5;
				var id2 = 9;
				var id3 = 1;
		   function amountpricetime() {	
				let ws = new WebSocket('wss://stream.binance.com:9443/ws/ethusdt@aggTrade');
				ws.onmessage = (event) => {
				let quantity2 = JSON.parse(event.data);
				let time2= JSON.parse(event.data);
				let price2 = JSON.parse(event.data);
				   quantity2.q = parseFloat(quantity2.q).toFixed(4);
				   document.getElementById(id).innerHTML=quantity2.q;
				   time2.T = parseFloat(time2.T).toFixed(0);
				   document.getElementById(id2).innerHTML=time2.T;
				   price2.p = parseFloat(price2.p).toFixed(2);
				   document.getElementById(id3).innerHTML=price2.p;
				  
				   if(lastprice2 > price2.q)
				   {
					document.getElementById(id3).style.color="#10a56b";
				   }
				   if (lastprice2 < price2.q) 
				   {
					document.getElementById(id3).style.color="#f6455d";
				   }  
				   lastprice2 = price2.q;
				   if(id >= 8 ){ id = 4;}
				   if(id2 >= 12){ id2 = 8;}
				   if(id3 >= 4){id3 = 0;}
				   id++;
				   id2++;
				   id3++;
				   
            }