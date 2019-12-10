import React, {Component} from 'react';
import './cart-checkout-summary.scss';
import axios from 'axios';
import '../cart/cart.scss';
import Header from '../header/header.js';
import Item from '../item/item.js';
import DeliveryAddress from '../delivery-address/delevery-address.js';
import add from '../../assets/images/add.png';
import genuinityLogo from '../../assets/images/Genuien.png';
import clockLogo from '../../assets/images/Time.png';
import Payments from '../payment-gateway/payments'
import CartSummary from '../cart-summary/cart-summary';
import {generalConfig} from "../config";



class CartCheckoutSummary extends Component {
    _webSiteLink = "#/cart";
    _isMounted = false;
    constructor(props) {
        super(props);
        this.state = {
            site_mode : generalConfig.site_mode,
            dataLoading: true,
            orderSummary:{},
			fetchCartComplete : false,
			fetchCartFailed : false,
			fetchCartFailureMsg : '',
			cartEmpty : false,
			approxDeliveryTime:'30 mins',
			shippingAddress:'',
			accountName:'',
            accountEmail:'',
            errors: {
                name:'',
                email:'',
                accountInfo:''
            }
        }
    }

	componentWillMount() {
		this._isMounted = true
	}
    componentDidMount() {
        if(this._isMounted) {
			let shipping_address_extra =''

			console.log(this.props)
			if(this.props.location.state) {
				let cart =this.props.location.state.order_obj
				console.log("inside location state =>>",this.props.location.state)
				this.setState({orderSummary: this.props.location.state.order_obj})

				if (cart.shipping_address.hasOwnProperty('address')) {
					shipping_address_extra = cart.shipping_address.address+', '
				}
				if(cart.shipping_address.hasOwnProperty('landmark')) {
					shipping_address_extra = shipping_address_extra + cart.shipping_address.landmark+', '
				}
				shipping_address_extra = shipping_address_extra + cart.shipping_address.formatted_address
				this.setState({shippingAddress: shipping_address_extra})
				this.setState({dataLoading:false, fetchCartComplete:true})
				window.removeCartLoader();
			} else {
				console.log(this.props.match.params);
				
				window.assignAddressToCart(null,true)
				.then((res) => {
					console.log(res)
					if(res.code =='PAYMENT_DONE') {
						// window.removeFromLocalStorage('cart_id')
						this.props.history.push('/cart');
					}
					this.setState({orderSummary: res.cart, dataLoading:false, fetchCartComplete:true});
					if (res.cart.shipping_address.hasOwnProperty('address')) {
						shipping_address_extra = res.cart.shipping_address.address+', '
					}
					if(res.cart.shipping_address.hasOwnProperty('landmark')) {
						shipping_address_extra = shipping_address_extra + res.cart.shipping_address.landmark+', '
					}
					shipping_address_extra = shipping_address_extra + res.cart.shipping_address.formatted_address
					this.setState({shippingAddress: shipping_address_extra})
					window.removeCartLoader();
				}).catch(err => {
					console.log(err)
					window.removeCartLoader();
					this.setState({dataLoading:false})
					
				})
			}
        }

	}
	
	componentWillUnmount() {
        this._isMounted = false
	}

    getItems(){
		let items = this.state.orderSummary.items.map((item)=>
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
                        <div className="cart-heading p-15 pt-0 pb-0">
							<h1 className="font-weight-bold d-block mobile-header mb-4 text-muted pt-3">Your cart summary</h1>
						</div>
						{this.getDeliveryAddressSection()}
						{this.state.errors.accountInfo.length > 0 &&  <span className='error'>{this.state.errors.accountInfo}</span>}

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
								<span className="d-inline-block vertical-align-middle text-black font-weight-medium">{this.state.approxDeliveryTime}</span>
							</div>
						</div>

						<div className="p-15">
							<label className="cart-summary-label font-weight-medium">Billing Details</label>
							<CartSummary summary={this.state.orderSummary.summary}/>
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
								<Payments checkNameExists={this.checkNameExists} pgname="razorpay" pgconfig={{pgtype:"standard", classes:"btn btn-primary btn-arrow w-100 p-15 rounded-0 text-left position-relative h5 ft6 mb-0"}} order={{id:window.readFromLocalStorage('cart_id'), amount: this.state.orderSummary.summary.you_pay}}  user_details={{user_details:this.state.orderSummary.user_details}}/>
							</div>
						</div>
					</div>
			}
		}

		return (
			<div className="cart-container visible">
				<Header/>
				{cartContainer}
			</div>
		);
	}

	getDeliveryAddressSection(){
		let deliveryaddress = '';
		if(this.state.site_mode == 'kiosk'){
			deliveryaddress = <div className="delivery-address-container p-15">
				<div className="address-details list-text-block p-15 mb-0">
					<div className="address-details-inner font-weight-light">
						<span className="font-weight-semibold">Pick up from </span>
						<span id="cart-delivery-address">GGB Counter</span>
					</div>
					{this.showUserDetailsFields()}
				</div>
			</div>
		} else {
			deliveryaddress = <div>
				<DeliveryAddress showSummaryContent={true} address={this.state.shippingAddress} userDetails={this.state.orderSummary.shipping_address} navigateToAddress={() => this.navigateToAddress()}/>
			</div>
		}
		return deliveryaddress
	}

	showUserDetailsFields(){
		if(this.state.orderSummary.shipping_address.name) {
			return (
				<div>
					<div className="address-details-inner font-weight-light mt-3 pt-3 text-black border-grey-top">
						<span className="text-green font-weight-semibold">Name: </span> 
						<span id="cart-delivery-address"> {this.state.orderSummary.shipping_address.name} </span>
						<span className="text-green font-weight-semibold">Mobile No.: </span> 
						<span id="cart-delivery-address"> {this.state.orderSummary.shipping_address.phone} </span>
					</div>
				</div>
			);
		} else {
			let errors = this.state.errors;
			return (
				<div>
					<div onClick={() => this.toggleAccountPopUp('show')}>Add Account details</div>
					<div className="custom-modal user-details" id="cart-checkout-summary-user-details">
		            	<h5 className="ft6 mb-4">Account details</h5>
		                <label className="d-block mb-4">
		                    <span className='error'>*</span>Full Name
		                    <input type="text" name="name" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => {this.setState({accountName:e.target.value}); this.handleChange(e)}} required/>
		                    {errors.name.length > 0 &&  <span className='error'>{errors.name}</span>}
		                </label>

		                <label className="d-block mb-4">
		                    <span className='error'>*</span>Email
		                    <input type="email" name="email" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => {this.setState({accountEmail:e.target.value}); this.handleChange(e)}} required/>
		                    {errors.email.length > 0 &&  <span className='error'>{errors.email}</span>}
		                </label>

		                <div onClick={() => this.saveAccountInfo()}>Save</div>
		                <div onClick={() => this.toggleAccountPopUp('hide')}>Close</div>
		            </div>
	            </div>
			);
		}
	}

	toggleAccountPopUp(action){
		if(action == 'show'){
			document.querySelector('#cart-checkout-summary-user-details').classList.add('show-modal');
		} else {
			document.querySelector('#cart-checkout-summary-user-details').classList.remove('show-modal');
		}
	}

	handleChange = (e) => {
        let { name, value} = e.target;
        let errors = this.state.errors;
        switch (name) {
            case "name":
                  errors.name = value.length >1 ? '':'required';
            break;
            case "email":
                if( value.length < 1) {
                    errors.email = 'required' 
                } else if(!window.validEmailRegex.test(value)) {
                    errors.email = "Please enter valid email";
                } else {
                    errors.email = ''
                }
            break;      
            default:
                break;
        }
    }

	saveAccountInfo(){
		window.addCartLoader()
        let errors = this.state.errors;
        let error = false
        if(this.state.accountName.length <1) {
            errors.name =  "required";
            error = true;
        }
        if(this.state.accountEmail.length <1) {
            errors.email = "required"
            error = true;
        } else if(!window.validEmailRegex.test(this.state.accountEmail)) {   
            errors.email = "Please enter valid email";
            error = true;
        }
        if(error) {
            window.removeCartLoader();
            this.setState({"errors":errors});
            return false;
        }

		let data = {
			name:this.state.accountName,
			email:this.state.accountEmail,
			phone:this.state.orderSummary.shipping_address.phone,
		}
		window.addUserDetails(data, window.readFromLocalStorage('cart_id')).then(user => {
			window.removeCartLoader();
            this.toggleAccountPopUp('hide');
            orderSummary = this.state.orderSummary;
            orderSummary.shipping_address.name = user.name;
            orderSummary.shipping_address.email = user.email;
        	errors.accountInfo = '';
        	this.setState({"errors":errors});
            this.setState({orderSummary:orderSummary});
         }).catch(err => {
            console.log(err)
         })
	}

	closeCart(){
		document.querySelector(".cart-wrapper").classList.remove('active');
		let url = window.location.href.split("#")[0];
		window.history.replaceState({cart : false}, 'cart', url);
		window.removeBackDrop();
	}

	navigateToAddress(){
		this.props.history.push('/cart/select-address');
	}

	removeItem(variant_id){
		console.log("remove item ==>", variant_id);
		let cart_data = this.state.orderSummary;
		cart_data.items = cart_data.items.filter(item => item.variant_id != variant_id);
		if(!cart_data.items.length)
			this.setState({cartEmpty : true});
		this.setState({orderSummary : cart_data});
	}

	updateSummary(summary){
		let cart_data = this.state.orderSummary;
		cart_data.summary = summary;
		this.setState({orderSummary : cart_data});
	}

	checkNameExists(){
		if(this.state.orderSummary.shipping_address.name) {
			return true;
		} else {
			let errors = this.state.errors;
			errors.accountInfo = 'Please enter account details';
			this.setState({"errors":errors});
			return false;
	    }
	}


}

export default CartCheckoutSummary