import React, {Component,createRef} from 'react'
import axios from 'axios';
import $ from 'jquery';
import Standard from './checkout-types/standard';
import Custom from './checkout-types/custom';
import Hosted from './checkout-types/hosted';
const script = document.createElement("script");

const apiEndPoint = 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1'

class Razorpay extends Component {
    constructor(props) {
        super(props)
        this.payForm = createRef();
        this.createOrder = this.createOrder.bind(this);
        this.state = {
            method: '',
            pgname:this.props.pgname,
            pgtype:this.props.pgconfig.pgtype,
            methodsError: false,
            showPaymentOptns:false,
            showError:false,
            showErrMsg:false,
            paymentErrorMsg:null,
            r_order_id:null,
        };
    }

    componentDidMount() {
        
        if(this.state.pgtype == 'standard') {
            script.src = "https://checkout.razorpay.com/v1/checkout.js";
      
        } else if (this.state.pgtype == 'custom') {
            script.src = "https://checkout.razorpay.com/v1/razorpay.js";
        }
        script.async = true;
        document.body.appendChild(script);
        
    }

    componentWillUnmount(){
        document.body.removeChild(script);
    }

    render() {
        return (
            <div>
               {this.showPaymentBtn()} 
               {this.state.showMsg ? this.successMsg(): null}
               {this.state.showErrMsg ? this.errorMsg(): null}
            </div>
        );
    }

    showPaymentBtn() {
        if(this.state.pgtype =='standard')
        {
            return <Standard pgconfig={{}} order={this.props.order} r_order_id={this.state.r_order_id} showMsg={this.state.showMsg} showErrMsg={this.state.showErrMsg} createOrder={this.createOrder}/>

        } else if(this.state.pgtype == 'custom') {
            return <Custom order={this.props.order} pgconfig={{}} r_order_id={this.state.r_order_id} showPaymentOptns={this.state.showPaymentOptns} createOrder={this.createOrder}/>
        } else {
            return <Hosted order={this.props.order} r_order_id={this.state.r_order_id}/>
        }
    }
    

    successMsg=() =>{
        return <p><b>Payment is successfull</b></p>;
    }
    
    errorMsg() {
        return <p><b>Payment is un-successfull, {this.state.paymentErrorMsg}</b></p>;
    }
    
    
    async createOrder (e) {
        console.log("here")
        if(e) {
            e.preventDefault();
        }
        let url = apiEndPoint + "/anonymous/payment/create-order";
			let body = {
                order_id : this.props.order.id,
                amount: this.props.order.amount
            }
            
        return  axios.post(url, body).then((res) => {
            this.setState({r_order_id: res.data.order_id});
            if(this.state.pgtype =='custom') 
                this.setState({"showPaymentOptns":true})
            if(this.state.pgtype == 'hosted') {
                $('#order_id').val(res.data.order_id)
                this.payForm.current.submit()
            }
                
        })          
    }

    verifyPayment(res) {
        let url = this.state.apiEndPoint + "/anonymous/payment/verify-payment";
        let body = {
            order_id : 1,
            ...res
        }
        return  axios.post(url, body).then(res => {
            console.log(res,"successfull")
            this.setState({"showMsg":true})
        }).catch(err => {
            this.setState({"showErrMsg":true})
            console.log(err)
        })          
    }
}

export default Razorpay;