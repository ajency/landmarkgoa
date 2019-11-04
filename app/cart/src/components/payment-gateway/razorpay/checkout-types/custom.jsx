import React, {Component} from 'react'
import axios from 'axios';
const apiEndPoint = 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1'

class Custom extends Component {
    constructor(props) {
        super(props);
        this.customPayment = this.customPayment.bind(this);
        this.state = {
            card_nos:4111111111111111,
            month:11,
            year:21,
            cvv:123,
            name:'lk',
            amount:this.props.order.amount
        }
    }

    render() {
        return (
            <div>
                <h3>Custom Check out</h3>
                {this.props.showPaymentOptns ? this.listNetBankingOptions():<button onClick={(e)=> { this.props.createOrder(e)}}>Proceed to Payment</button>  }
            </div>
        );
    }

    listNetBankingOptions = () => {
        return (
            <div className={this.props.classes}>
                <h3 className="">Banks</h3>
                <ul>
                    <li onClick={(e) => this.customPayment(e,'netbanking','HDFC')}>HDFC</li>
                    <li onClick={(e) => this.customPayment(e,'netbanking','CORP')}>Corporation Bank</li>
                    <li onClick={(e) => this.customPayment(e,'netbanking','VIJB')}>Vijaya Bank</li>
                    <li onClick={(e) => this.customPayment(e,'netbanking','YESB')}>Yes Bank</li>
                </ul>
                <h2>Card payment</h2>
                <form>
                    <label>
                        Card Number
                        <input type="text" onChange={(e)=> this.setState({"card_nos":e.target.value})} value={this.state.card_nos}/>
                    </label><br/>
                    <label>
                        Expiry
                        <input type="text" onChange={(e)=> this.setState({"month":e.target.value})} value={this.state.month}/>|
                        <input type="text" onChange={(e)=> this.setState({"year":e.target.value})} value={this.state.year}/>
                    </label><br/>
                    <label>
                        CVV
                        <input type="text" onChange={(e)=> this.setState({"cvv":e.target.value})} value={this.state.cvv}/>
                    </label><br/>
                    <label>
                        Name
                        <input type="text" onChange={(e)=> this.setState({"name":e.target.value})} value={this.state.name}/>
                    </label><br/>
                    <button onClick={(e) => this.customPayment(e, 'card', null)}>Pay</button>
                </form>
            
            </div>
        );
    }

    customPayment = (e, pmethod, partner) => {
        let Razorpay = new window.Razorpay({
             "key": "rzp_test_k5UaQj4CYdBzL5",
             "image": "https://i.imgur.com/n5tjHFD.png"
         })
         e.preventDefault();
         let options ={
             "amount": this.state.amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
             "currency": "INR",
             "order_id": this.props.r_order_id,
             "contact": "9767992594",
             "email": "latesh@ajency.in",
             "notes": {
                 "address": "note value"
             },
         }
         switch (pmethod) {
             case 'card':
                this.setState({'method': pmethod})
                options = {...options,... {
                    "method":'card',
                    "card[number]": this.state.card_nos,
                    "card[expiry_month]": this.state.month,
                    "card[expiry_year]": this.state.year,
                    "card[cvv]": this.state.cvv,
                    "card[name]": this.state.name
                    }}
                 break;
            case 'netbanking':
                    options = {...options,... {
                        'method':'netbanking',
                        'bank':partner
                    }}
            break;
         
            default:
            break;
         }
         Razorpay.createPayment(options)
         Razorpay.on('payment.success', (res) => {
             console.log("onsuccess",res)
             this.verifyPayment(res)             
         });
 
         Razorpay.on('payment.error', function(resp){
             this.setState({"paymentErrorMsg":resp.error.description})
             console.log(resp.error.description);
             
         });
     }

     verifyPayment(res) {
        let url = apiEndPoint + "/anonymous/payment/verify-payment2";
        let body = {
            order_id : 1,
            ...res
        }
        return  axios.post(url, body).then(res => {
            console.log(res,"successfull")
            window.location.href = 'http://greengrambowl.local/index.php/payment-successful/';
        }).catch(err => {
            window.location.href = 'http://greengrambowl.local/index.php/payment-unsuccessful/';
        })          
    }
}

export default Custom