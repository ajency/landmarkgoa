import React, { Component } from 'react';
import axios from 'axios';

class Quantity extends Component {
	constructor(props) {
		super(props)
		this.state = {
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiCallInProgress : false,
			quantity : 0
		}
	}

	componentDidMount(){
		this.setState({quantity : this.props.quantity});
	}

	render() {
		return (
			<div className="quantity">
				{this.getButtonContent()}
			</div>
		);
	}

	getButtonContent(){
		if(this.state.apiCallInProgress){
			return (<div class="btn-icon">
						<i class="fas fa-circle-notch fa-spin fa-lg"></i>
					</div>);

		}
		return (
			<div>
				<div className="">
					<button className="btn btn-qty text-grey p-0" onClick={() => this.removeFromCart(1)} disabled={this.state.apiCallInProgress}>-</button>
					<span className="cart-qty text-primary">	{this.state.quantity} </span>
					<button className="btn btn-qty text-green p-0" onClick={() => this.addToCart(1)} disabled={this.state.apiCallInProgress}>+</button>
				</div>
			</div>
		)		
	}

	removeFromCart(quantity){
		this.setState({apiCallInProgress : true});
		let url = this.state.apiEndPoint + "/anonymous/cart/delete";
		// let url = "https://demo8558685.mockable.io/remove-from-cart";
		let body = {
			variant_id 	: this.props.variant_id,
			quantity 	: quantity,
			cart_id 	: window.readFromLocalStorage('cart_id')
		}
		window.addCartLoader();
		axios.post(url, body)
		.then((res) => {
			console.log("add to cart response ==>", res);
			window.removeCartLoader();
			if(res.data.success){
				let updated_quantity = this.state.quantity - quantity;
				console.log("check ==>", updated_quantity, quantity, this.state.quantity);
				this.props.updateSummary(res.data.summary);
				if(updated_quantity === 0){
					this.props.removeItem();
				}
				else{
					this.setState({quantity : updated_quantity})
				}
				window.updateViewCartCompoent(res.data);
				let item = {
					variant_id : this.props.variant_id,
					quantity : quantity,
					product_id : this.props.product_id
				}
				window.updateItemQuantity(item, 'remove');
			}
			else{
				this.displayError(res.data.message);
			}
			this.setState({apiCallInProgress : false});
		})
		.catch((error)=>{
			window.removeCartLoader();
			console.log("error in add to cart ==>", error);
			this.setState({apiCallInProgress : false});
			let msg = error && error.message ? error.message : error;
			this.displayError(msg);
		})
	}

	addToCart(quantity){
		window.addCartLoader();
		this.setState({apiCallInProgress : true});
		let url = this.state.apiEndPoint + "/anonymous/cart/insert";
		let body = {
			variant_id : this.props.variant_id,
			quantity : 1,
			cart_id 	: window.readFromLocalStorage('cart_id')
		}

		axios.post(url, body)
		.then((res) => {
			window.removeCartLoader();
			console.log("add to cart response ==>", res);
			if(res.data.success){
				this.props.updateSummary(res.data.summary);
				let quantity = this.state.quantity + res.data.item.quantity;
				this.setState({quantity : quantity})
				window.updateViewCartCompoent(res.data);
				window.updateItemQuantity(res.data.item, 'add');
			}
			else{
				this.displayError(res.data.message);
			}
			this.setState({apiCallInProgress : false});
		})
		.catch((error)=>{
			window.removeCartLoader();
			console.log("error in add to cart ==>", error);
			this.setState({apiCallInProgress : false});
			let msg = error && error.message ? error.message : error;
			this.displayError(msg);
		})
	}

	displayError(msg){
		// TODO : Display error message
		this.props.showApiErrorMsg(msg);
	}
}

export default Quantity;