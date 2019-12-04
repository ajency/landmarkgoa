<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,600,700&display=swap" rel="stylesheet">
<style>
  .email-container{
      width: 550px;
      margin: 0 auto;
      font-family: 'Work Sans', sans-serif;
      padding: 15px;
      border: 1px solid #000;
  }
  .email-header{
    text-align: center;
    border-bottom: 1px solid #000;
    padding: 15px;
    padding-top: 0;
  }
  .email-header img{
    width: 150px;
  }
  .email-content{
    padding: 15px;
    padding-top: 30px;
  }
  .email-footer{
    padding: 15px;
  }
  .email-footer img{
    width: 95px;
    height: auto;
  }
  .bold{
    font-weight: 700;
  }
  .row{
    clear: both;
    overflow: hidden;
    padding: 15px 5px;
  }
  .w-50{
    width: 50%;
    float: left;
  }
  .w-50{
    width: 50%;
  }
  .w-30{
    width: 30%;
  }
  .w-20{
    width: 20%;
  }
  .text-left{
    text-align: left;
  }
  .text-right{
    text-align: right;
  }
  .text-center{
    text-align: center;
  }
  .text-green{
    color: #48A748;
  }
  p{
    margin: 0;
    margin-bottom: 25px;
  }
  .border-grey{
    border: 1px solid #c4c8c4;
  } 
  th, td{
    padding: 5px;
  } 
  .mb-25{
    margin-bottom: 25px;
  }
  .mb-05{
    margin-bottom: 10px;
  }
  table{
    padding-top: 15px;
    padding-bottom: 15px;
  }
  .email-footer{
    position: relative;
  }
  .email-footer .line{
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    transform: translateY(-50%);
    margin: 0;
    height: 0.5px;
    background: #000;
  }
  .email-footer img{
    position: relative;
    z-index: 1;
    background: #fff;
    padding: 0 10px;
  }
  .d-block{
    display: block;
  }
</style>

<div class="email-container">
  <div class="email-header">
    <img src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/logo_new.png">
  </div>
  <div class="email-content">
      <p>Hi,</p>
      <p>Thanks for placing an order with us.</p>
      <p>We are on it. We'll notify you when your bowl(s) is ready for pick-up.</p>
      <p class="bold">Order details</p>
      <div class="mb-25">
        <div class="row border-grey">
          <div class="w-50">
            <div class="mb-05">Order No: <span class="bold">111111</span></div>
            <div class="">Date: <span class="bold">03 Dec 2019</span></div>
          </div>
          <div class="w-50">
            <div class="mb-05">Customer Name:</div>
            <div class="bold">Viraj Verlekar</div>
          </div>
        </div>
      </div>
      <table width="100%" class="border-grey">
        <tr>
            <th class="text-left w-50">Item Name</th>
            <th class="text-left w-30 text-center">Qty</th>
            <th class="text-right w-20">Price</th>
        </tr>
        <tr>
            <td>Orange Barley Bowl<span class="d-block">(Small)</span></td>
            <td class="text-center">1</td>
            <td class="text-right">200</td>
        </tr>
        <tr>
          <td>Thai Brown Rice Bowl <span class="d-block">(Small)</span></td>
            <td class="text-center">1</td>
            <td class="text-right">200</td>
        </tr>
        <tr>
            <td></td>
            <td class="text-green bold text-right">Grand Total</td>
            <td class="text-green bold text-right">400</td>
        </tr>
      </table>
  </div>   
  <div class="email-footer text-center">
      <img src="http://localhost/greengrainbowl/wp-content/themes/ajency-portfolio/images/leaf-icon.png" />
      <div class="line"></div>
  </div>
</div>

<div class="email-container">
  <div class="email-header">
    <img src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/logo_new.png">
  </div>
  <div class="email-content">
      <p>Hurray!</p>
      <p>Your meal has been prepared and kept ready for you. Token number for this order is <span class="bold">24</span>. Please make sure you show this Email at counter while takeaway.</p>
      <p>Looking forward to serve you again.</p>
      <p class="bold">Order details</p>
      <div class="mb-25">
        <div class="row border-grey">
          <div class="w-50">
            <div class="mb-05">Order No: <span class="bold">111111</span></div>
            <div class="">Date: <span class="bold">03 Dec 2019</span></div>
          </div>
          <div class="w-50">
            <div class="mb-05">Customer Name:</div>
            <div class="bold">Viraj Verlekar</div>
          </div>
        </div>
      </div>
      <table width="100%" class="border-grey">
        <tr>
            <th class="text-left w-50">Item Name</th>
            <th class="text-left w-30 text-center">Qty</th>
            <th class="text-right w-20">Price</th>
        </tr>
        <tr>
            <td>Orange Barley Bowl</td>
            <td class="text-center">1</td>
            <td class="text-right">200</td>
        </tr>
        <tr>
          <td>Thai Brown Rice Bowl</td>
            <td class="text-center">1</td>
            <td class="text-right">200</td>
        </tr>
        <tr>
            <td></td>
            <td class="text-green bold text-right">Grand Total</td>
            <td class="text-green bold text-right">400</td>
        </tr>
      </table>
  </div>   
  <div class="email-footer text-center">
      <img src="http://localhost/greengrainbowl/wp-content/themes/ajency-portfolio/images/leaf-icon.png" />
      <div class="line"></div>
  </div>
</div>