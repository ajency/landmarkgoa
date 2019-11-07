import React, { Component } from 'react';
import './item.scss';
// import addToCart from '../../../add-to-cart/add-to-cart.js';
import Quantity from './components/cart_quantity.js';

class Item extends Component {
	constructor(props) {
		super(props);
		this.state = {
			apiErrorMsg : ''
		}
	}
	render() {
		return (
			<div className="item-container flex-column">
				<div className="d-flex mb-4">
					<div className="product-cartimage d-inline-block">
						<img className="border-radius-rounded" alt="" title="" height="50" width="50" src={this.props.item.attributes.images['1x']}/>
					</div>
					<div className="product-details d-inline-block">
						<div className="product-title-c font-weight-light">
							{this.props.item.attributes.title}
						</div>	
						<div className="d-flex justify-content-between">
							<div className="product-size-c font-italic">
								{this.props.item.attributes.size}
							</div>
							<div className="d-flex align-items-center">
								<div className="product-quantity d-inline-block">
									<Quantity quantity={this.props.item.quantity} variant_id={this.props.item.variant_id} product_id={this.props.item.product_id} removeItem={()=>{this.removeItem()}} updateSummary={(summary) => this.updateSummary(summary)} showApiErrorMsg={(msg) => this.setApiErrorMsg(msg)}/>
								</div>
								<div className="product-price font-weight-light text-right pl-3">
									{/* {this.checkItemDiscount()} */}
									₹{this.props.item.attributes.price_final}								
								</div>
							</div>								
						</div>
					</div>
				</div>
				<div>
					{this.checkServiceability()}
					{this.displayApiErrorMsg()}
				</div>
			</div>
		);
	}

	checkItemDiscount(){
		if(this.props.item.attributes.price_final < this.props.item.attributes.price_mrp){
			return <div><span className="gbb-original-price mr-0">₹{this.props.item.attributes.price_mrp}</span> <span className="gbb-discount text-danger d-none">{this.getOffPercentage()}% OFF</span></div>
		}
	}

	getOffPercentage(){
		return Math.round(((this.props.item.attributes.price_mrp - this.props.item.attributes.price_final) / (this.props.item.attributes.price_mrp )) * 100)
	}

	checkServiceability(){
		if(!this.props.item.deliverable)
			return <div className="alert-danger p-15 mb-3">Cannot be delivred at your location</div>
		if(!this.props.item.availability)
			return <div className="alert-danger p-15 mb-3">Quantity not available</div>
	}

	displayApiErrorMsg(){
		if(this.state.apiErrorMsg){
			return <div className="alert-danger p-15 mb-3">{this.state.apiErrorMsg}</div>
		}
	}

	removeItem(){
		this.props.removeItem(this.props.item.variant_id);
	}

	setApiErrorMsg(msg){
		this.setState({apiErrorMsg : msg});
		setTimeout(()=>{
			this.setState({apiErrorMsg : ''});
		},3000)
	}

	updateSummary(summary){
		this.props.updateSummary(summary);
	}
}

export default Item;