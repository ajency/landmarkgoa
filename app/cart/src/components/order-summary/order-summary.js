import React, {Component} from 'react';
import './order-summary.scss';
import axios from 'axios';
import Payments from '../payment-gateway/payments'

const apiEndPont = 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1';


// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1'
class OrderSummary extends Component {
    _isMounted = false;
    constructor(props) {
        super(props);
        this.state = {
            dataLoading: true,
            orderSummary:null
        }
    }

    componentWillMount() {
        this._isMounted = true
        if(this._isMounted) {
            let url = apiEndPont+ '/anonymous/cart/create-order'
            axios.post(url, {cart_id:this.props.match.params.order_id, address_id:this.props.match.params.address_id})
            .then((res) => {
                
                this.setState({orderSummary: res.data.order_data, dataLoading:false})

            }).catch(err => {
                console.log(err)
                this.setState({dataLoading:false})
                
            })
        }

    }

    render() {
        return this.state.dataLoading ? this.showDataLoading(): this.showData();
    }

    showData() {
        return(
            <div>
                <h3>Order Summary Page</h3>
                <p> Name: {this.state.orderSummary.user_details.name}</p>
                <p>Email: {this.state.orderSummary.user_details.email}</p>
                <p>Contact: {this.state.orderSummary.user_details.mobile}</p>
                <p>You pay: {this.state.orderSummary.summary.you_pay}</p>
                <Payments pgname="razorpay" pgconfig={{pgtype:'standard'}} order={{id: this.state.orderSummary.order_id, amount:this.state.orderSummary.summary.you_pay}}/>
            </div>
        )
    }

    showDataLoading() {
        return <div>Loading.....</div>
    }
}

export default OrderSummary