import React, {Component} from 'react'

class Standard extends Component {
    constructor(props) {
        super(props);
        this.standardPayment = this.standardPayment.bind(this);
        this.state = {
            amount:this.props.order.amount
        }
    }

    render() {
        return (
            <div>
                <h3>Stadard Checkout</h3>
                <button onClick={(e)=> { this.standardPayment(e)}}>Proceed to Payment</button>
            </div>
        );
    }
    async standardPayment(e) {
        let Razorpay = new window.Razorpay({
            "key": "rzp_test_k5UaQj4CYdBzL5",
            "image": "https://i.imgur.com/n5tjHFD.png"
        })
         await this.props.createOrder(e)
         let amount = this.state.amount*100
         console.log(amount, this.state.amount);
         
         let options = {
             "amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
             "currency": "INR",
             "order_id": this.props.r_order_id,
             "contact": "9767992594",
             "email": "latesh@ajency.in",
             "notes": {
                 "address": "note value"
             },
             "handler": function (response){
                 alert(response.razorpay_payment_id);
             },
         };
         
         Razorpay.open(options);
 
     }
}

export default Standard