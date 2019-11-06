import React, { Component } from 'react';
import './cart.scss'
import Header from '../header/header.js';
import Item from '../item/item.js';
import CartSummary from '../cart-summary/cart-summary.js';
import DeliveryAddress from '../delivery-address/delevery-address.js';
import add from '../../assets/images/add.png';
import genuinityLogo from '../../assets/images/Genuien.png';
import clockLogo from '../../assets/images/Time.png';
import {Redirect} from 'react-router-dom';
import axios from 'axios';
 declare var $: any;

class Cart extends Component {
	_currentCart = null;
	constructor(props){
		super(props);
		this.state = {
			cartData : {},
			fetchCartComplete : false,
			fetchCartFailed : false,
			fetchCartFailureMsg : '',
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			cartEmpty : false,
			redirectToSummary:false,
			cartSummary:null
		}
		this.fetchCart();
	}

	componentDidMount(){
		$('#view-cart-btn').on('click', ()=>{
			console.log("view cart click event fired");
			this.setState({cartData : {}, fetchCartComplete : false, cartEmpty : false})
			this.fetchCart();
		});

		$('#cart-address-change-trigger').on('click', ()=>{
			console.log("address change event fired");
			this.setState({cartData : {}, fetchCartComplete : false, cartEmpty : false})
			this.fetchCart();
		});
		// window.checkPushNotificationPermissions();
	}

	getItems(){
		let items = this.state.cartData.cart.items.map((item)=>
			<Item key={item.variant_id} item={item} removeItem={(variant_id) => this.removeItem(variant_id)} updateSummary={(summary) => this.updateSummary(summary)}/>
		);
		return items;
	}
	
	render() {
		let cartContainer;
		if(!this.state.fetchCartComplete)
			cartContainer = <div className="text-center mt-5 p-15"> <h4 className="font-weight-meidum m-0">  </h4>  </div>
		else {
			if(this.state.cartEmpty){
				cartContainer = <div className="text-center mt-5 p-15 "> <h4 className=""> Your cart is Empty. Add something from the menu </h4> 
				<div className="btn-wrapper mt-3">
						<div className="btn-inner-wrap">
							<button onClick={()=> this.closeCart()} type="button" className="btn-reset text-white border-green bg-primary p-3 text-center h5 ft6 mb-0 rounded-0" >Browse Our Cuisine</button>
						</div>
					</div>
				</div>
			}
			else if (this.state.fetchCartFailed){
				cartContainer = <div className="text-center mt-5"> <h4> {this.state.fetchCartFailureMsg} </h4>  </div>
			}
			else {
				cartContainer = 
					<div>
						<div>
							<DeliveryAddress address={this.state.cartData.cart.formatted_address} delivery_time={this.state.cartData.approx_delivery_time}/>
						</div>

						<div className="cart-heading p-15 pt-0 pb-0">
							<h1 className="font-weight-bold d-block mobile-header mb-4 text-muted">Your cart</h1>
						</div>

						<div className="p-15 pt-0">
							{this.getItems()}
						</div>

						{/* <div className="apply-coupon-bar">
							<div className="coupon-label">
								Apply Coupon   >
							</div>
						</div> */}

						<div className="p-15 pt-2 pb-2 bg-off-green-1 mb-1 d-flex justify-content-between">
							<div className="text-black font-weight-medium">
								Estimated Time:
							</div>
							<div className="w-50 text-align-right font-weight-medium">
								<img src={clockLogo} alt="Estimated time" title="Estimated time" className="d-inline-block vertical-align-middle mr-1"/> 
								<span className="d-inline-block vertical-align-middle text-black font-weight-medium">30 mins</span>
							</div>
						</div>

						<div className="p-15">
							<label className="cart-summary-label font-weight-medium">Bill Details</label>
							<CartSummary summary={this.state.cartData.cart.summary}/>
						</div>						

						<div className="p-15 pt-0">
							<div className="bottom-bar">								
								<div className="genuinity text-align-center">
									<img src={genuinityLogo} className="mr-1" alt="100% Secure Payments" title="100% Secure Payments" className="d-inline-block vertical-align-middle" width="20"/>
									<span className="d-inline-block vertical-align-middle ml-1 font-size-15">Genuine products. 100% Secure payments.</span>
								</div>
							</div>
						</div>

						<div className="p-15 pt-0 pb-0">
							<div className="secure-checkout fixed-bottom visible bg-white p-15">
								<button className="btn btn-primary btn-arrow w-100 p-15 rounded-0 text-left position-relative h5 ft6 mb-0" onClick={(e) => this.handleCheckout(e)} data-address="1EmY0FQBuNLKrNKq9jSE" data-id="16ZywalSNVRPLwmwAmLR">Proceed to Checkout</button>
							</div>
						</div>
					</div>
			}
		}

		return (
			<div className="cart-container visible">
				<Header/>		
				{this.state.redirectToSummary ? <Redirect to={`/cart/cart-summary/${"16ZywalSNVRPLwmwAmLR"}`} order_obj={this.state.cartSummary}/>: null}
				{cartContainer}
			</div>
		);
	}

	handleCheckout(e) {
		e.preventDefault();
		let url = this.state.apiEndPoint + "/anonymous/cart/create-order"
		let data = {
			address_id:e.target.getAttribute("data-address"),
			cart_id:e.target.getAttribute("data-id") //this._currentCart
		}
		
		return axios.post(url,data).then((res) => {
			if(res.data.success) {
				this.setState({cartSummary:res.data, redirectToSummary:true})
			} else {
				console.log(res.data)
			}
		})
	}

	closeCart(){
		document.querySelector(".cart-wrapper").classList.remove('active');
		let url = window.location.href.split("#")[0];
		window.history.replaceState({cart : false}, 'cart', url);
		window.removeBackDrop();
	}

	fetchCart() {
		window.addCartLoader();
		console.log("inside fetch cart");
		//this._currentCart = window.readFromLocalStorage('cart_id');
		let cart_id =  true //window.readFromLocalStorage('cart_id');
		if(cart_id){
			let url = "https://demo8558685.mockable.io/get-cart";
			// let url = this.state.apiEndPoint + "/anonymous/cart/fetch";
			let body = {
				cart_id : cart_id
			}
			axios.get(url, {params : body})
				.then((res) => {
					window.removeCartLoader();
					console.log("fetch cart response ==>", res);
					this.setState({cartData : res.data, fetchCartComplete : true});
				})
				.catch((error)=>{
					window.removeCartLoader();
					this.setState({fetchCartFailureMsg : error.message,  fetchCartComplete : true})
					console.log("error in fetch cart ==>", error);
				})
		}
		else{
			console.log("inside else")
			setTimeout(()=>{
				window.removeCartLoader();
				this.setState({cartEmpty : true, fetchCartComplete : true});
			},100)
		}
	}

	removeItem(variant_id){
		console.log("remove item ==>", variant_id);
		let cart_data = this.state.cartData;
		cart_data.cart.items = cart_data.cart.items.filter(item => item.variant_id != variant_id);
		if(!cart_data.cart.items.length)
			this.setState({cartEmpty : true});
		this.setState({cartData : cart_data});
	}

	updateSummary(summary){
		let cart_data = this.state.cartData;
		cart_data.cart.summary = summary;
		this.setState({cartData : cart_data});
	}
}

export default Cart;