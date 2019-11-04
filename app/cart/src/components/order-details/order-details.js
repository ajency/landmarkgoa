import React, {Component} from 'react';
import axios from 'axios'
import {generalConfig} from '../payment-gateway/payment-gateway-config'

class OrderDetails extends Component {
    constructor(props){
        super(props)
        this.state = {
            loader:true,
            payment_id:''
    }
    }

    render() {
        return (
         this.state.loader ?  <div>Transaction is in progress</div> :  this.getStatus()
        );
    }

    componentDidMount() {
        this.getOrderDetails()        
    }

    getOrderDetails() {
        let url = generalConfig.apiEndPoint + "/anonymous/order/get-order";
        axios.post(url, {order_id: this.props.match.params.order_id})
        .then((res) => {

            if(res.data.pending) {
                this.getOrderDetails()
            } else {
             console.log(res.data.details)
             this.setState({"loader": false})
             this.setState({payment_id:res.data.details.pg_payment_id})
             this.setState({order_status: res.data.details.status})
            }
            
        }).catch(err => {
            this.setState({"loader": false})
            console.log(err)
        }) 
    }

    getStatus() {
        if(this.state.order_status == 'captured'){
            return (
                <div>Order is successful Payment id: {this.state.payment_id}</div>
            );
        } else {
            return (
                <div>Order  Unsuccessful Payment id: {this.state.payment_id}</div>
            );
        }
    }
}

export default OrderDetails