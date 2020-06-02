import React, { Component } from 'react';
import './cart-summary.scss';

class CartSummary extends Component {
	constructor(props){
		super(props);
	}
	render() {
		return (
			<div className="cart-summary-container">
				<div className="summary-item">
					<div><label className="font-weight-light">Total Item Price</label></div>
					<div className="font-weight-light">₹{this.props.summary.sale_price_total} </div>
				</div>

				{this.getCouponDiscount()}

				{this.getShippingFee()}
				
				<div className="summary-item border-grey-50 border-0-left border-0-right mt-1 pt-2 pb-2">
					<div><label className="font-weight-medium mb-0">To Pay</label></div>
					<div className="font-weight-bold">₹{this.props.summary.you_pay}</div>
				</div>	
			</div>
		);
	}

	getCouponDiscount(){
		if(this.props.summary.cart_discount)
			return <div className="summary-item">
						<div><label className="">Coupon Discount</label></div>
						<div className="text-success">-₹{this.props.summary.cart_discount}</div>
					</div>
	}

	getShippingFee(){
		if(this.props.summary.shipping_fee)
			return <div className="summary-item">
						<div><label className="font-weight-light">Delivery fee</label></div>
						<div className="font-weight-light">₹{this.props.summary.shipping_fee}</div>
					</div>	
	}
}

export default CartSummary;