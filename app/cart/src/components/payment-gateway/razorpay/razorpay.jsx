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
            showPaymentOptns:false,
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
            </div>
        );
    }

    showPaymentBtn() {
        if(this.state.pgtype =='standard')
        {
            return <Standard pgconfig={{}} order={this.props.order} r_order_id={this.state.r_order_id} createOrder={this.createOrder}/>

        } else if(this.state.pgtype == 'custom') {
            return <Custom order={this.props.order}  r_order_id={this.state.r_order_id} showPaymentOptns={this.state.showPaymentOptns} createOrder={this.createOrder}/>
        } else {
            return <Hosted order={this.props.order} r_order_id={this.state.r_order_id} payForm={this.payForm} createOrder={this.createOrder}/>
        }
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
               this.setState({r_order_id: res.data.order_id});
            }
            return true;
        })          
    }
}

export default Razorpay;