import React, { Component } from 'react';
import Header from '../header/header.js';

class OrderDetails extends Component {

    constructor(props) {
        super(props)
        this.state = {
            errorOnPage:  false,
            loadingError: false,
            loader:true,
            addressLabel:'',
            shippingAddress:'',
            orderSummary:''
        }
    }

    componentDidMount() {
        window.firebase.auth().onAuthStateChanged((user) => {
            this.getOrderDetails()
        })
    }

    getOrderDetails() {
        if(this.props.match.params.order_id) {
        window.addCartLoader();

            window.orderDetails(this.props.match.params.order_id)
            .then((res) => {
                console.log("fetching summary ==>", res);
                
                if(!res.success) {
                    window.displayError(res.msg);
                    this.setState({"loadingError": true})
                    window.removeCartLoader();
                } else {
                    if(res.pending) {
                        this.getOrderDetails()
                        this.setState({"loader": true})
                        window.addCartLoader();
    
                    } else {
                        window.removeCartLoader();
                        this.setState({orderSummary: res})
                        if(res.order_data.order_mode == 'kiosk') {
                            this.setState({addressLabel: "Pick up from: "})
                            this.setState({shippingAddress: " GGb Counter"})
                        } else {
                            let shipping_address='';
                            if (res.order_data.shipping_address.address!='') {
                                shipping_address = res.order_data.shipping_address.address+', '
                            }

                            if(res.order_data.shipping_address.landmark != '') {
                                shipping_address = shipping_address + res.order_data.shipping_address.landmark+', '
                            }
                            shipping_address = shipping_address + res.order_data.shipping_address.formatted_address;
                            this.setState({addressLabel: "Deliver to: "})
                            this.setState({shippingAddress: shipping_address})
                        }


                        this.setState({"loader": false})
                        this.setState({"loadingError": false})
                    }
                } 
                console.log("fetched summary",this.state.orderSummary)
            }).catch(err => {
                this.setState({"loader": false})
                this.setState({"loadingError": true})
                window.removeCartLoader();
                console.log(err)
            }) 

        } 
    }

    render() {
        return (
            <div className="cart-container visible">
                <Header/>
                {this.state.loader ? '':this.getOrderDetailsMarkup()}
            </div>
        );
    } 
    
    
    getOrderDetailsMarkup = () => {
        if(this.state.loadingError) {
            return (
                <div className="">
                    Something went wrong...
                </div>
            );
        } else {
            return (
                <div className="">
                    <div class="cart-heading p-15 pt-0 pb-0">
                        <h1 class="font-weight-bold d-block mobile-header mb-4 text-muted pt-3">Order details</h1>
                    </div>
                    <div className="order-status p-15 pt-0 pb-0">
                        <div className="p-15 d-flex align-items-center justify-content-center bg-primary">
                            <i class="far fa-check-circle text-white font-size-20"></i>
                            <span className="d-inline-block ml-2 text-white">Order Placed</span>
                        </div>
                    </div>
                    <div>
                        <div className="delivery-address-container p-15">
                            <div className="address-details list-text-block p-15 mb-0">
                                <div className="address-details-inner font-weight-light">
                                    <span className="font-weight-semibold">{this.state.addressLabel}</span>
                                    <span id="cart-delivery-address">{this.state.shippingAddress}</span>
                                </div>
                                <div>
                                    <div className="address-details-inner font-weight-light mt-3 pt-3 text-black border-grey-top">
                                        <div className="">
                                            <span className="text-green font-weight-semibold">Name: </span>
                                            <span id="cart-delivery-address"> {this.state.orderSummary.order_data.shipping_address.name} </span>
                                        </div>
                                        <div className="">
                                            <span className="text-green font-weight-semibold">Mobile No.: </span>
                                            <span id="cart-delivery-address">  {this.state.orderSummary.order_data.shipping_address.phone} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="p-15">
                        {this.getItems()}
                    </div>
    
                    <div className="p-15">
                        <label className="cart-summary-label font-weight-medium">Payment information</label>
                        <div className="summary-item">
                            <div>
                                <label className="font-weight-light">Payment mode</label>
                            </div>
                            {this.getPaymentMode()}
                        </div>
                    </div>
                    <div className="p-15">
                        <label className="cart-summary-label font-weight-medium">Billing Details</label>
                        {this.getSummary()}
                    </div>
                    <div className="p-15">
                        * Please note: For any queries feel free to reach us out at <a className="text-underline" href="tel:7770004528">7770004528</a>
                    </div>
                </div>
            );
        }
       
    }

    getItems = () =>{
        let items =   this.state.orderSummary.order_data.items.map((item) => {
            return  <div class="item-container flex-column">
            <div class="d-flex mb-4">
                <div class="product-cartimage d-inline-block"><img class="border-radius-rounded" alt="" title="" height="50" width="50" src={item.attributes.image}/></div>
                <div class="product-details d-inline-block">
                    <div class="product-title-c font-weight-light">{item.attributes.title}</div>
                    <div class="d-flex justify-content-between">
                        <div class="product-size-c text-capitalize">{item.attributes.size} | Qty: {item.quantity}</div>
                        <div class="d-flex align-items-center">
                            <div class="product-price font-weight-light text-right pl-3">₹{item.attributes.price_final}</div>
                        </div>
                    </div>
                </div>
            </div>
             </div>         
        })
       
        return items
    }

    getSummary = () => {
        let deliveryHtml = ''
        if(this.state.orderSummary.order_data.order_mode == 'online') {
            deliveryHtml = `
            <div className="summary-item">
                <div>
                    <label className="font-weight-light">Delivery fee</label>
                </div>
                <div className="font-weight-light">₹${this.state.orderSummary.order_data.summary.shipping_fee}</div>
            </div>

            `
        }
       return(
        
        <div className="cart-summary-container">
            <div className="summary-item">
                <div>
                    <label className="font-weight-light">Total Item Price</label>
                </div>
                <div className="font-weight-light">₹{this.state.orderSummary.order_data.summary.sale_price_total} </div>
            </div>
            {deliveryHtml}
            <div className="summary-item border-grey-50 border-0-left border-0-right mt-1 pt-2 pb-2">
                <div>
                    <label className="font-weight-medium mb-0">You Paid</label>
                </div>
                <div className="font-weight-bold">₹{this.state.orderSummary.order_data.summary.you_pay}</div>
            </div>
        </div>);
    }

    getPaymentMode = () => {
        if(this.state.orderSummary.order_data.payment_details) {
            let payment_mode = ''
            let paymentObj = this.state.orderSummary.order_data.payment_details
            if(paymentObj.method == 'card') {
                payment_mode = paymentObj.card.type + "card"
            }  else if(paymentObj.method == 'upi'){
                payment_mode = "Upi"
            } else if(paymentObj.method == 'wallet') {
                payment_mode = "Wallet"
            } else if(paymentObj.method == 'netbanking') {
                payment_mode = "Net banking"
            }
            return (<div className="font-weight-light" style={{textTransform:"capitalize"}}>{payment_mode}</div>)

        }
        return (<div className="font-weight-light">COD</div>)
    }
}

export default OrderDetails;