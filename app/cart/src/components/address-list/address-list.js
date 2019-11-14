import React, { Component } from 'react';
import {Link, Redirect} from 'react-router-dom';
import Header from '../header/header.js';
import {generalConfig} from '../config';
import axios from 'axios';
import './address-list.scss'
import * as _ from 'underscore';
import AddNewAddress from '../add-new-addess/add-new-address.js';
class AddressList extends Component {
    _webSiteLink = "#/cart"
    constructor(props) {
        super(props);
        this.assignAndProceed = this.assignAndProceed.bind(this);
        this.state = {
            fetchComplete:false,
            addresses:[],
			redirectToSummary:false,
            cartSummary:null,
            cart_id:'',
            redirectToCart:false,
            showAddressComponent: false
        }
    }

   static getDerivedStateFromProps(props, state) {
        window.addCartLoader()
        let returnState = {};
        returnState["cart_id"]=window.readFromLocalStorage('cart_id')
        if(window.firebase.auth().currentUser.isAnonymous) {
            returnState["showAddressComponent"] = true
        } else {
            if(window.firebase.auth().currentUser) {
                let addresses = window.getAddresses();
                if(_.isEmpty(addresses)) {
                    returnState["showAddressComponent"] = true
                } else {
                    returnState["addresses"] = window.getAddresses()
                    returnState["fetchComplete"] = true
                }
            } else {
                this.displayError("Please login to continue");
            }            
        }
        window.removeCartLoader()
        return returnState
    }

    render() {
        return (
            <div className="address-container visible">
                {this.state.redirectToAddAddress ? "redirect":null}
                {this.state.redirectToSummary ? <Redirect to={{ pathname:`/cart/cart-summary/${this.state.cart_id}`, state:{order_obj:this.state.cartSummary}}} />: null}
                {this.state.redirectToCart ? <Redirect to={{ pathname:`/cart`}} />: null}
                <Header/>
                {this.state.showAddressComponent ? <AddNewAddress showAddressComponent= {this.state.showAddressComponent} cartRequest={true} assignAndProceed={this.assignAndProceed}/>: this.showAllAddresses()}
            </div>
        );
    }

    displayError(msg){
		document.querySelector('#failure-toast').innerHTML = msg;
		document.querySelector('#failure-toast').classList.remove('d-none');
		document.querySelector('#failure-toast-close-btn').classList.remove('d-none');
		setTimeout(()=>{
			document.querySelector('#failure-toast').classList.add('d-none');
			document.querySelector('#failure-toast-close-btn').classList.add('d-none');
		},30000)
	}
    showAllAddresses() {
        return (
            <div>
                <div className="cart-heading p-15 pb-0">
                        <h3 className="mt-4 h1 ft6">Choose Delivery Address</h3>
                </div>
                <div className="address-list p-15 pt-0 mt-4">
                    {this.state.fetchComplete ? this.displayAddressList():null}  
                    <div className="post-content pb-5"> 
                        <div className="next-title m-0" onClick={(e) => this.setState({showAddressComponent:true})}>Add new address <i className="fas fa-arrow-right text-green"></i></div>
                    </div>
                </div>
            </div>
        );
    }

    displayAddressList() {
       let addressMarkups =  _.map(this.state.addresses, (obj,index) => {
            return( 
                <div key={index}  className="items mb-5" onClick={(e) => this.assignAndProceed(e,obj.id)} data-lat-long={obj.lat_long}>
                    <div className="text-black text-link highlight">
                        <h1 className="ft6">{obj.type}</h1>
                        <h5 className="font-weight-light">
                            <span className="p-name d-inline-block">{obj.name}</span>
                            <span className="p-phone-number d-inline-block">{obj.phone}</span>
                        </h5>
                        <h5 className="font-weight-light">
                           {obj.formatted_address}
                        </h5>
                    </div>
                </div>                
            )
        })

        return addressMarkups;
    }

    assignAndProceed(e,address_id) {
        console.log(this.state, address_id)
        // if(this.state.showAddressComponent) {
        //     this.setState({showAddressComponent:false})
        // }

        // //let cart_id =  e.target.getAttribute("data-id")
        // this._currentCart = window.readFromLocalStorage('cart_id');
		// let cart_id =  window.readFromLocalStorage('cart_id');
        // if(cart_id) {
        //      if(e) {
        //         e.preventDefault();
        //         if(!this.isAddressDeliverable(e.target.getAttribute("data-lat-long"))) {
        //             this.displayError("Selected address is not deliverable :(");
        //             return false;
        //         }
        //      }
        //     let url = generalConfig.apiEndPoint + "/anonymous/cart/create-order"
        //     let data = {
        //         address_id: address_id,
        //         cart_id: cart_id
        //     }
        //     window.addCartLoader();
            
        //     return axios.post(url,data).then((res) => {
        //         if(res.data.success) {
        //             this.setState({cartSummary:res.data.cart, redirectToSummary:true})
        //         } else {
        //             window.removeCartLoader();
        //             if(res.data.code =='PAYMENT_DONE') {
        //                 window.removeFromLocalStorage('cart_id')
        //                 this.setState({redirectToCart:true})
        //             }
        //             console.log(res.data.message)
        //         }
        //     })
        // } else {
        //     this.setState({redirectToCart:true})
        // }
        
        
    }
    isAddressDeliverable(address_id) {
        let address = window.user_addresses.filter((address) => { return address.id == address_id;})[0];
        let locations = window.getCurrentStockLocation()
        if(!locations.length) {
            this.displayError("Something went wrong...")
            return false;
        }
       let deliverable =  window.findDeliverableLocation(locations,address.lat_long)

       return !!deliverable

    }
}

export default AddressList;