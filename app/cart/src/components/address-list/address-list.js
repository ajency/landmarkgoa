import React, { Component } from 'react';
import Header from '../header/header.js';
import './address-list.scss'
import * as _ from 'underscore';
import AddNewAddress from '../add-new-addess/add-new-address.js';
class AddressList extends Component {
    constructor(props) {
        super(props);
        this.assignAndProceed = this.assignAndProceed.bind(this);
        this.fetchAllAddresses()
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

    render() {
        return (
            <div className="address-container visible">
                <Header/>
                {this.state.showAddressComponent ? <AddNewAddress showAddressComponent= {this.state.showAddressComponent} cartRequest={true} assignAndProceed={this.assignAndProceed}/>: this.showAllAddresses()}
            </div>
        );
    }

    showAllAddresses() {
        return (
            <div>
                <div className="cart-heading p-15 pb-0">
                        <h3 className="mt-4 h1 ft6">Choose Delivery Address</h3>
                </div>
                <div className="address-list p-15 pt-0 mt-4">
                    <div className="items mb-5">
                        <div className="text-black text-link highlight">
                            <h1 className="ft6">Office</h1>
                            <h5 className="font-weight-light">
                                <span className="p-name d-inline-block">Dhiraj Dessai</span> <span className="p-phone-number d-inline-block">9823353495</span>
                            </h5>
                            <h5 className="font-weight-light">
                                Panjim Convention Center, Vistar Estates, Mala, Rua de Ourém, Neugi Nagar, Panaji, Goa 403001
                            </h5>
                        </div>
                    </div>
                    <div className="items mb-5">
                        <div className="text-black text-link highlight">
                            <h1 className="ft6">Home</h1>
                            <h5 className="font-weight-light">
                                <span className="p-name d-inline-block">Dhiraj Dessai</span> <span className="p-phone-number d-inline-block">9823353495</span>
                            </h5>
                            <h5 className="font-weight-light">
                                Roland Apartment, Cabesa Ward, St. Cruz, Panaji, Goa 403005
                            </h5>
                        </div>
                    </div>
                    <div className="items mb-5">
                        <div className="text-black text-link highlight">
                            <h1 className="ft6">Dad's office</h1>
                            <h5 className="font-weight-light">
                                <span className="p-name d-inline-block">Dhiraj Dessai</span> <span className="p-phone-number d-inline-block">9823353495</span>
                            </h5>
                            <h5 className="font-weight-light">
                                H. no. 1059/1, Bansai junction, Curchorem, Cacora, Goa 
                            </h5>
                        </div>
                    </div>                    
                    <div className="post-content pb-5"> 
                        <div className="next-title m-0" onClick={(e) => this.setState({showAddressComponent:true})}>Add new address <i className="fas fa-arrow-right text-green"></i></div>
                    </div>
                </div>
            </div>
        );
    }

    fetchAllAddresses() {
        window.addCartLoader()
        let user_id  = "PAg9uqIv63C84rylubLYLK";
        let url = generalConfig.apiEndPoint + "/user/get-addresses?uid="+user_id;
        axios.get(url, {uid: user_id})
        .then((res) => {
            if(res.data.addresses) {
                this.setState({"addresses": res.data.addresses})
                this.setState({"fetchComplete": true})
            } else {
                //redirect
            }
            window.removeCartLoader();
            console.log(res);
        })
        .catch((err) => {
            window.removeCartLoader();
            console.log (err);
        })
    }

    displayAddressList() {
       let addressMarkups =  _.map(this.state.addresses, (obj,index) => {
            return( 
                <div key={index}  className="items mb-5" onClick={(e) => this.assignAndProceed(e,obj.id)} data-id="0DCg3e7Cw30fvQoXeHwR">
                    <div className="text-black text-link highlight">
                        <h1 className="ft6">{obj.address.type}</h1>
                        <h5 className="font-weight-light">
                            <span className="p-name d-inline-block">{obj.address.name}</span>
                            <span className="p-phone-number d-inline-block">{obj.address.phone}</span>
                        </h5>
                        <h5 className="font-weight-light">
                           {obj.address.formatted_address}
                        </h5>
                    </div>
                </div>                
            )
        })

        return addressMarkups;
    }

    assignAndProceed(e,address_id) {
        console.log(this.state)
        if(this.state.showAddressComponent) {
            this.setState({showAddressComponent:false})
        }
        //let cart_id =  e.target.getAttribute("data-id")
        this._currentCart = window.readFromLocalStorage('cart_id');
		let cart_id =  window.readFromLocalStorage('cart_id');
        if(cart_id) {
             if(e) {
                e.preventDefault();
             }
            let url = generalConfig.apiEndPoint + "/anonymous/cart/create-order"
            let data = {
                address_id: address_id,
                cart_id: cart_id
            }
            window.addCartLoader();
            
            return axios.post(url,data).then((res) => {
                if(res.data.success) {
                    this.setState({cartSummary:res.data.cart, redirectToSummary:true})
                } else {
                    window.removeCartLoader();
                    if(res.data.code =='PAYMENT_DONE') {
                        window.removeFromLocalStorage('cart_id')
                        this.setState({redirectToCart:true})
                    }
                    console.log(res.data.message)
                }
            })
        } else {
            this.setState({redirectToCart:true})
        }
        
        
    }

}

export default AddressList;