<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,600,700&display=swap" rel="stylesheet">
<style>
  .email-container{
      width: 500px;
      margin: 0 auto;
      font-family: 'Work Sans', sans-serif;
      color: #212529;
  }
  .email-header{
    text-align: center;
    padding: 15px;
    background: #ecf6ec;
  }
  .email-header img{
    width: 100px;
  }
  .email-content{
    padding: 15px;
    padding-top: 30px;
  }
  .email-footer{
    padding: 15px;
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
  .d-block{
    display: block;
  }
  .d-flex{
    display: flex;
  }
  .d-inline-block {
      display: inline-block!important;
  }
  .flex-column {
      flex-direction: column!important;
  }
  .justufy-between{
    justify-content: space-between;
  }
  .mb-4{
    margin-bottom: 1.5rem!important;
  }
  .product-cartimage {
      padding-right: 10px;
      width: 17%;
  }
  .product-cartimage img {
      object-fit: cover;
      border-radius: 50%;
  }
  .product-details {
      width: 100%;
  }
  .product-size-c {
      font-size: 14px;
      line-height: 14px;
      margin-top: 5px;
      font-style: italic;
  }
  .list-text-block{
    background-color: #f1f3f4;
    padding: 15px;
    margin-bottom: 30px;
    margin-left: -15px;
    margin-right: -15px;
    font-size: 16px;
    line-height: 22px;
  }  
  .list-text-block .mb-5{
    margin-bottom: 7px;
  }
  .mb-0{
    margin-bottom: 0 !important;
  }
  .summary-item {
    display: flex;
    justify-content: space-between;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .email-footer{
    text-align: center;
    padding: 25px 15px;
    background: #ecf6ec;
  }
  .text-green{
    color: #47a748;
  }

  .mb-10{
    margin-bottom: 10px;
  }

</style>

<div class="email-container">

  <div class="email-header">
    <img src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/logo_new.png">
  </div>

  <div class="email-content">
      <p>Hi <strong>Viraj Verlekar,</strong></p>
      <p>Thanks for placing an order with us.</p>
      <p>We are on it. We'll notify you when your bowl(s) is ready for pick-up.</p>
      <p class="bold mb-10">Order Details</p>

      <div class="d-flex mb-25 justufy-between">
          <div class="mb-5">Order no: <i>11111</i></div>
          <div class="">Date: <i>03 Dec 2019</i></div>
      </div>

      <div class="order-items">
        <div class="item-container flex-column">
          <div class="d-flex mb-4">
            <div class="product-cartimage d-inline-block">
              <img class="" alt="" title="" height="50" width="50" src="http://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/products/cracked-wheat-n-chickpea-bowl-chicken.jpg">
            </div>
            <div class="product-details d-inline-block">
              <div class="product-title-c font-weight-light">
                Cracked Wheat &amp; Chickpea Bowl
              </div>
              <div class="">
                  <div class="product-size-c text-capitalize">
                    regular
                  </div>
                  <div class="product-size-c">
                    Qty: 1
                  </div>                      
              </div>            
            </div>
            <div class="d-flex align-items-center">                            
                <div class="product-price font-weight-light text-right pl-3">
                  ₹400
                </div>
            </div>
          </div>
        </div>

        <div class="item-container flex-column">
          <div class="d-flex mb-4">
            <div class="product-cartimage d-inline-block">
              <img class="" alt="" title="" height="50" width="50" src="http://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/products/cracked-wheat-n-chickpea-bowl-chicken.jpg">
            </div>
            <div class="product-details d-inline-block">
              <div class="product-title-c font-weight-light">
                Cracked Wheat &amp; Chickpea Bowl
              </div>
              <div class="">
                  <div class="product-size-c text-capitalize">
                    Small
                  </div>   
                  <div class="product-size-c">
                    Qty: 1
                  </div>                     
              </div>            
            </div>
            <div class="d-flex align-items-center">                            
                <div class="product-price font-weight-light text-right pl-3">
                  ₹400
                </div>
            </div>
          </div>
        </div>

      </div>

      <div class="list-text-block ">
          <strong>Delivery Address: </strong>Panjim Community Centre, Electricity Colony, Altinho, Panaji, Goa 403001, India
      </div>

      <div class="bill-details">
          <div class="summary-item">
              <div>
                  <label class="font-weight-light">Total Item Price</label>
              </div>
              <div class="font-weight-light">₹800 </div>
          </div>
          <div class="summary-item">
              <div>
                  <label class="font-weight-light">Delivery fee</label>
              </div>
              <div class="font-weight-light">₹50</div>
          </div>
          <div class="summary-item">
              <div>
                  <label class="font-weight-medium mb-0"><strong>Total</strong></label>
              </div>
              <div class="font-weight-bold"><strong>₹850</strong></div>
          </div>
      </div>

  </div>

  <div class="email-footer text-center">
    (C) 2018 Digital Dwarves Pvt Ltd. All Right Reserved
  </div>

</div>