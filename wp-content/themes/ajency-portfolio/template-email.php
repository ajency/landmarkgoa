<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,600,700&display=swap" rel="stylesheet">
<style>
  .email-container{
      width: 500px;
      margin: 0 auto;
      font-family: 'Work Sans', sans-serif;
      color: #212529;
      font-size: 14px;
  }
  .email-header{
    text-align: center;
    padding: 15px;
    background: #ecf6ec;
  }
  .email-header img{
    width: 100px;
    vertical-align: middle;
  }
  .email-content{
    padding: 15px;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 0;
    padding-right: 0;
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
  }
  .list-text-block{
    padding: 15px;
    padding-top: 0;
    padding-bottom: 0;
    margin-bottom: 25px;
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
    padding: 15px 15px;
    background: #ecf6ec;
  }
  .text-green{
    color: #47a748;
  }

  .mb-10{
    margin-bottom: 10px;
  }

  .text-capitalize{
    text-transform: capitalize;
  }

  .border-grey-y{
    border-top: 1px solid hsla(0,0%,48.6%,.5);
    border-bottom: 1px solid hsla(0,0%,48.6%,.5);
  }

  .mt-8{
    margin-top: 8px;
  }

  .w-50{
    width: 50%;
  }

  .px-15{
    padding-left: 15px;
    padding-right: 15px;
  }

  .follow-text a{
    margin-right: 10px;    
  }

  .follow-text a:last-child{
    margin-right: 0;
  }

  .font-size-16{
    font-size: 16px;
  }

  .mb-5{
    margin-bottom: 5px;
  }

  .mb-15{
    margin-bottom: 15px;
  }

  .border-double{
    border-top: 4px double #47a748;
    border-bottom: 4px double #47a748;
    padding-top: 1.5rem;
  }

  .order-items{
    margin-bottom: 15px;
  }

  .clearfix{
    clear: both;
    overflow: hidden;
  }
  
  .font-size-12{
    font-size: 12px;
  }
</style>

<div class="email-container">

  <div class="email-header">
    <div class="logo" style="width: 60%;display: inline-block;text-align: right;">
      <img src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/GGB-logo.png">
    </div>
    <div class="" style="display: inline-block;text-align: right;width: 38%;">
      <img src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/slidein/checkout.png" style="width: 17px;display:inline-block;vertical-align:middle;">
      <span style="font-weight: 600;text-transform: uppercase;font-size: 12px;display:inline-block;vertical-align:middle;margin-left: 2px;">Order placed</span>
    </div>
  </div>

  <div class="email-content">
      <div class="order-number mb-25 text-right" style="padding-right:15px;">
        Order no: <strong>11111</strong>
      </div>
      <div class="px-15">
        <p>Hi <strong>Viraj Verlekar,</strong></p>
        <p>Thanks for placing an order with us.</p>
        <p>We are on it. We'll notify you when your bowl(s) is ready for pick-up.</p>
        <p class="bold mb-5">Order Details</p>
      </div>
      <div class="d-flex mb-25 justufy-between px-15">
          <div class="mb-5 w-50">Order no: <strong>11111</strong></div>
          <div class="w-50 text-right">Date: 03 Dec 2019</div>
      </div>

      <div class="list-text-block">
          <div class=""><strong>Delivery Address : </strong></div>Panjim Community Centre, Electricity Colony, Altinho, Panaji, Goa 403001, India
      </div>

      <div class="order-items px-15">
        <div class="border-double">
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
                      Regular | Qty: 1
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
              <img class="" alt="" title="" height="50" width="50" src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/products/cracked-wheat-n-chickpea-bowl-chicken.jpg">
            </div>
            <div class="product-details d-inline-block">
              <div class="product-title-c font-weight-light">
                Cracked Wheat &amp; Chickpea Bowl
              </div>
              <div class="">
                  <div class="product-size-c text-capitalize">
                    Small | Qty: 1
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
      </div>

      

      <div class="bill-details px-15">
          <div class="summary-item pt-0">
              <div class="w-50">
                  <label class="font-weight-light">Total Item Price</label>
              </div>
              <div class="font-weight-light w-50 text-right">₹800 </div>
          </div>
          <div class="summary-item">
              <div class="w-50">
                  <label class="font-weight-light">Delivery fee</label>
              </div> 
              <div class="font-weight-light w-50 text-right">₹50</div>
          </div>
          <div class="summary-item">
              <div class="w-50">
                  <label class="font-weight-medium mb-0"><strong>To Pay</strong></label>
              </div>
              <div class="font-weight-bold w-50 text-right"><strong>₹850</strong></div>
          </div>
      </div>

  </div>

  <div class="email-footer">
    <div class="follow-text mb-15 w-50 text-left">
        <p class="mb-5"><strong>Follow Us</strong></p>
        <a href="#" class="d-inline-block">
          <img width="30" src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/fb.png"/>
        </a>
        <a href="#" class="d-inline-block">
          <img width="30" src="https://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/insta.png"/>
        </a>
    </div>
    <div class="contact-text w-50 text-right">
      <p class="mb-5"><strong>Need help?</strong></p>
      <p class="mb-5">Email: <a class="text-green" href="mailto:test@test.com">test@test.com</a></p>
      <p class="mb-15">Mobile: <a class="text-green" href="https://api.whatsapp.com/send?phone=+919823036238">9823036238</a></p>      
    </div>
    
    <div class="text-center clearfix font-size-12">(C) 2019 Digital Dwarves Pvt Ltd. All Right Reserved</div>
  </div>

</div>