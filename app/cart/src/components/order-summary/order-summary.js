import React, {Component} from 'react';
import './order-summary.scss';
import Header from '../header/header.js';
import GoogleMap from '../google-map/google-map.js';
import axios from 'axios'
import {generalConfig} from '../payment-gateway/payment-gateway-config'

class OrderSummary extends Component {
    _isUnMount = false;
    constructor(props){
        super(props)
        this.state = {
            loader:true,
            payment_id:'',
            loadingError:false,
            paymentDetails:{}
        }
    }

    render() {
        return (
            <div className="address-container visible">
				<Header/>                
                {this.state.loader ?  <div></div> :  this.getStatus()}
            </div>
         //
        );
    }

    componentDidMount() {
        this.getOrderDetails()        
    }

    componentWillUnmount() {
        this._isUnMount = true
    }

    getOrderDetails() {
        if(this._isUnMount) {
            return ;
        }
        let url = generalConfig.apiEndPoint + "/anonymous/payment/get-order-details";
        axios.post(url, {payment_id: this.props.match.params.payment_id})
        .then((res) => {

            if(res.data.pending) {
                this.getOrderDetails()
                this.setState({"loader": true})
        		// window.addCartLoader();

            } else {
                // window.removeCartLoader();
                this.setState({"loader": false})
                this.setState({payment_id:res.data.details.pg_payment_id})
                this.setState({order_status: res.data.details.status})
                if(res.data.details.order_details) {
                    res.data.details.order_details = JSON.parse(res.data.details.order_details);
                }
                this.setState({paymentDetails: res.data.details})
                this.setState({"loadingError": false})

            }
            
        }).catch(err => {
            this.setState({"loader": false})
            this.setState({"loadingError": true})
            // window.removeCartLoader();
            console.log(err)
        }) 
    }

    getStatus() {
        if(this.state.loadingError) {
            return (
                <div>
                    Error encountered try after sometime
                </div>
            );
        }
        if(this.state.order_status == 'captured'){
            return (
                <div>
                    <div className="p-15">
                    <h3 className="mt-4 h1 ft6">Thank You for your order</h3>
                    <h4 className="font-weight-light mt-4 pb-4">You can check your order status below.</h4>
                    </div>  
                    <div className="map-container">
                        <GoogleMap handleCenter={this.handleCenter} latlng={this.state.latlng}/>
                        <div id="marker"><i className="fas fa-map-marker-alt"></i></div>
                    </div>  
                    <div className="p-15 pt-0 pb-0">
                        <div className="list-text-block p-3 mb-3 full-width-15 position-relative">
                            <div className="list-meta mt-0">
                                <div className="order-number">
                                    <span className="text-grey">ORDER</span> <span className="ft6 text-black">{this.state.paymentDetails.order_id}</span>
                                </div>
                                <div className="order-data d-flex text-grey">
                                    <div className="order-time d-inline-block border-right-lightgrey pr-2">
                                        12:21 P.M.
                                    </div>
                                    <div className="order-item-count d-inline-block border-right-lightgrey pr-2 pl-2">
                                        1 Item(s)
                                    </div>
                                    <div className="order-price d-inline-block pl-2">
                                        Price  ₹500
                                    </div>
                                </div>
                            </div>
                            <div className="help-text d-none">
                                <a className="text-primary text-underline" href="#">Need Help?</a>
                            </div>
                        </div>
                        <div className="order-steps font-weight-medium">
                            <div className="order-received border-bottom-lightgrey position-relative p-15 pl-0 pr-0">
                                <div className="order-icon">
                                    <img src="http://localhost/greengrainbowl/wp-content/themes/ajency-portfolio/images/list.png" className=""  width="30"/>
                                </div>
                                <div className="order-text d-flex align-items-center justify-content-between">
                                    <span className="text-silver d-inline-block">Order <br/> Received</span>
                                    <span className="status text-primary">DONE</span>
                                </div>
                            </div>
                            <div className="order-being-prepared border-bottom-lightgrey position-relative p-15 pl-0 pr-0">
                                <div className="order-icon">
                                    <img src="http://localhost/greengrainbowl/wp-content/themes/ajency-portfolio/images/rice-cooker.png" className="" width="30" />
                                </div>
                                <div className="order-text d-flex align-items-center justify-content-between">
                                    <span className="text-primary d-inline-block">Food is being <br/> Prepared </span>
                                    <span className="status text-red">NOW</span>
                                </div>
                            </div>
                            <div className="order-pickedup position-relative order-pickedup position-relative p-15 pl-0 pr-0">
                                <div className="order-icon">
                                    <img src="http://localhost/greengrainbowl/wp-content/themes/ajency-portfolio/images/scooter.png" className="" width="30"/>
                                </div>
                                <div className="order-text d-flex align-items-center justify-content-between">
                                    <span className="text-grey d-inline-block">Order <br/> Picked Up</span>
                                    <span className="status text-silver">NEXT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-15 pt-0 pb-0">
                        <div class="secure-checkout fixed-bottom visible bg-white p-15">
                            <button class="btn btn-primary btn-arrow w-100 p-15 rounded-0 text-left position-relative h5 ft6 mb-0">I Want More, Take Me to shop</button>
                        </div>
                    </div>
                </div>
            );
        } else {
            return (
                <div>Order  Unsuccessful Payment id: {this.state.payment_id}</div>
            );
        }
    }
}

export default OrderSummary