import React, { Component } from 'react';
import Header from '../header/header.js';

class OrderDetails extends Component {
    render() {
        return (
            <div className="cart-container visible">
                <Header/>
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
                                    <span className="font-weight-semibold">Deliver to </span>
                                    <span id="cart-delivery-address"> 70, test, Panjim Community Centre, Electricity Colony, Altinho, Panaji, Goa 403001, India</span>
                                </div>
                                <div>
                                    <div className="address-details-inner font-weight-light mt-3 pt-3 text-black border-grey-top">
                                        <div className="">
                                            <span className="text-green font-weight-semibold">Name: </span>
                                            <span id="cart-delivery-address"> Vaibhav Arolkar </span>
                                        </div>
                                        <div className="">
                                            <span className="text-green font-weight-semibold">Mobile No.: </span>
                                            <span id="cart-delivery-address"> 9823036238 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-15">
                        <div class="item-container flex-column">
                            <div class="d-flex mb-4">
                                <div class="product-cartimage d-inline-block"><img class="border-radius-rounded" alt="" title="" height="50" width="50" src="http://greengrainbowl.com/wp-content/themes/ajency-portfolio/images/products/quinoa-n-nuts-bowl.jpg"/></div>
                                <div class="product-details d-inline-block">
                                    <div class="product-title-c font-weight-light">Quinoa &amp; Nuts Bowl</div>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-size-c text-capitalize">Small | Qty: 1</div>
                                        <div class="d-flex align-items-center">
                                            <div class="product-price font-weight-light text-right pl-3">₹200</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="p-15">
                        <label className="cart-summary-label font-weight-medium">Payment information</label>
                        <div className="summary-item">
                            <div>
                                <label className="font-weight-light">Payment mode</label>
                            </div>
                            <div className="font-weight-light">Credit card</div>
                        </div>
                    </div>
                    <div className="p-15">
                        <label className="cart-summary-label font-weight-medium">Billing Details</label>
                        <div className="cart-summary-container">
                            <div className="summary-item">
                                <div>
                                    <label className="font-weight-light">Total Item Price</label>
                                </div>
                                <div className="font-weight-light">₹200 </div>
                            </div>
                            <div className="summary-item">
                                <div>
                                    <label className="font-weight-light">Delivery fee</label>
                                </div>
                                <div className="font-weight-light">₹50</div>
                            </div>
                            <div className="summary-item border-grey-50 border-0-left border-0-right mt-1 pt-2 pb-2">
                                <div>
                                    <label className="font-weight-medium mb-0">You Paid</label>
                                </div>
                                <div className="font-weight-bold">₹250</div>
                            </div>
                        </div>
                    </div>
                    <div className="p-15">
                        * Please note: For any queries feel free to reach us out at <a className="text-underline" href="tel:7770004528">7770004528</a>
                    </div>
                </div>
            </div>
        );
    }    
}

export default OrderDetails;