

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Currency Exchange Rate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }
        body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 0 10px;
        background: #5afe8b;
        }
        ::selection{
        color: #fff;
        background: #675AFE;
        }
        .wrapper{
        width: 370px;
        padding: 30px;
        border-radius: 7px;
        background: #fff;
        box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.05);
        }
        .wrapper header{
        font-size: 28px;
        font-weight: 500;
        text-align: center;
        }
        .wrapper form{
        margin: 40px 0 20px 0;
        }
        form :where(input, select, button){
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: none;
        }
        form p{
        font-size: 18px;
        margin-bottom: 5px;
        }
        form input{
        height: 50px;
        font-size: 17px;
        padding: 0 15px;
        border: 1px solid #999;
        }
        form input:focus{
        padding: 0 14px;
        border: 2px solid #675AFE;
        }
        form .drop-list{
        display: flex;
        margin-top: 20px;
        align-items: center;
        justify-content: space-between;
        }
        .drop-list .select-box{
        display: flex;
        width: 115px;
        height: 45px;
        align-items: center;
        border-radius: 5px;
        justify-content: center;
        border: 1px solid #999;
        }
        .select-box img{
        max-width: 21px;
        }
        .select-box select{
        width: auto;
        font-size: 16px;
        background: none;
        margin: 0 -5px 0 5px;
        }
        .select-box select::-webkit-scrollbar{
        width: 8px;
        }
        .select-box select::-webkit-scrollbar-track{
        background: #fff;
        }
        .select-box select::-webkit-scrollbar-thumb{
        background: #888;
        border-radius: 8px;
        border-right: 2px solid #ffffff;
        }
        .drop-list .icon{
        cursor: pointer;
        margin-top: 30px;
        font-size: 22px;
        }
        form .exchange-rate{
        font-size: 17px;
        margin: 20px 0 30px;
        }
        form button{
        height: 52px;
        color: #fff;
        font-size: 17px;
        cursor: pointer;
        background: #5afe91;
        transition: 0.3s ease;
        }
        form button:hover{
        background: #34fe60;
        }
    </style>
  </head>
  <body>
  <div class="wrapper">
      <header>Currency Exchange Rate</header>
      <form action="#">
        <div class="amount">
          <p>Enter Amount</p>
          <input type="text" id="amount" value="1">
        </div>
        <div class="drop-list">
          <div class="from">
            <p>From</p>
            <div class="select-box">
              euro
            </div>
          </div>
          <div class="icon"></div>
          <div class="to">
            <p>To</p>
            <div class="select-box">
              
              <select name="exchange_curr" class="exchange_curr"> </select>
            </div>
          </div>
        </div>
        <div class="exchange-rate">Getting exchange rate...</div>
        <button id="btn-submit">Get Exchange Rate</button>
      </form>
    </div>

    <script>
      var data = @json($data);
      var replace_special_chr = JSON.stringify(data.Cube.Cube.Cube);
      var after_replace = JSON.parse(replace_special_chr.replaceAll("@attributes","attributes"));
      var html = "";
      for (let i=0; i<after_replace.length;i++){
        html += `<option value="${after_replace[i].attributes.rate}">${after_replace[i].attributes.currency}</option>`
      }
      document.querySelector(".exchange_curr").insertAdjacentHTML("afterbegin", html);

      document.getElementById("btn-submit").addEventListener("click",function(e){
        e.preventDefault();
        var amount =  document.getElementById("amount").value;
        var currency =  document.querySelector(".exchange_curr").value;
        var output = parseFloat(amount) * parseFloat(currency);
        var sel = document.querySelector('.exchange_curr');
        var selected = sel.options[sel.selectedIndex].text;
        document.querySelector(".exchange-rate").innerText = ` ${amount} euro = ${output} ${selected} `
      });

    </script>

  </body>
</html>