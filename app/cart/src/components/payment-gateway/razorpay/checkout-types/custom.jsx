import React, {Component} from 'react'
import axios from 'axios';
import * as _ from 'underscore';
import {razorPayConfig,generalConfig} from '../../payment-gateway-config.js';

class Custom extends Component {
    constructor(props) {
        super(props);
        this.customPayment = this.customPayment.bind(this);
        this.state = {
            methods:this.props.pgconfig.payment_methods,
            card_nos:4111111111111111,
            month:'',
            year:'',
            cvv:'',
            name:'',
            vpa:'',
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
       let markUp =  _.map(this.state.methods, (arr,key)=> {
            if(_.contains(['netbanking', 'wallet'],key)) {
                return (
                    <div key={key}>
                        <h3 className="">{key}</h3>
                        <ul>
                            {this.getOptions(arr,key)}
                        </ul>
                    </div>
                );
            } else if(key == 'card' && arr ==true) {
                return (<div key={key}>
                    <h3>Card payment</h3>
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
                </div>)
            } else if(key == 'upi' && arr ==true){
              return (
                <div key={key}>
                <h3>UPI payment</h3>
                  <form>
                    <label>
                        Name
                        <input type="text" onChange={(e)=> this.setState({'vpa':e.target.value})} value={this.state.vpa}/>
                    </label><br/>
                    <button onClick={(e) => this.customPayment(e, 'upi', null)}>Pay</button>
                  </form>
              </div>)
            }
        })
        return markUp
       
    }

    getOptions(arr, key) {
        return _.map(arr, (obj,index) =>
            <li key={index+1} onClick={(e) => this.customPayment(e,key,obj.id)} className={obj.classNames}>{obj.name}</li>
        )
       
    }

    customPayment = (e, pmethod, partner) => {
        e.preventDefault();
        let Razorpay = new window.Razorpay({
             "key": razorPayConfig.api_key,
             "image":razorPayConfig.image,
             "callback_url":razorPayConfig.callback_url,
             "redirect": true
         })
        let options ={}
        options ={
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

            case 'wallet':
                options = {...options,...{
                    'method':'wallet',
                    'wallet':partner
                }}
            break;
            case 'upi':
                options = {...options,...{
                    'method': 'upi',
                    'vpa':this.state.vpa
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
        let url = generalConfig.apiEndPoint + "/anonymous/payment/verify-payment2";
        let body = {
            order_id : 1,
            ...res
        }
        return  axios.post(url, body).then(res => {
            console.log(res,"successfull")
            window.location.href = razorPayConfig.callback_url;
        }).catch(err => {
            window.location.href = razorPayConfig.cancel_url;
        })          
    }
}

export default Custom