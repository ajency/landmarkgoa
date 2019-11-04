import React, {Component} from 'react'
import {razorPayConfig, generalConfig} from '../../payment-gateway-config'; 
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
                <button onClick={(e)=> { this.standardPayment(e)}}>Proceed to Payment</button>
            </div>
        );
    }
    async standardPayment(e) {
       
         await this.props.createOrder(e)
         let amount = this.state.amount*100
         
        //  let options = {
        //     "amount": 500000, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
        //     "currency": "INR",
        //     "order_id": this.props.r_order_id,
        //     "prefill": {
        //     "contact": this.props.user_details.contact,
        //     "email": this.props.user_details.email,
        //     "name": this.props.user_details.name
        //     },
        //     "handler": function (response){
        //          alert(response.razorpay_payment_id);
        //     },
        let Razorpay = new window.Razorpay({
            "key": razorPayConfig.api_key,
            "image": razorPayConfig.image,
            "name": generalConfig.company_name,
            "amount": amount, 
            "currency": "INR",
            "order_id":this.props.r_order_id,//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below
            "handler": function (response){
                alert(response.razorpay_payment_id);
            },
            "prefill": {
                "email": this.props.user_details.email,
                "name": this.props.user_details.name ,
                "contact": this.props.user_details.mobile
            },

            "theme": {
                "color": "#F37254"
            }
         });
         Razorpay.open();
 
     }
}

export default Standard