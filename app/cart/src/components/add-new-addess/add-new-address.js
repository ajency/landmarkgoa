import React, { Component } from 'react';
import axios from 'axios';
import Header from '../header/header.js';
import './add-new-address.scss'
import GoogleMap from '../google-map/google-map';
import { generalConfig } from '../config.js';
import * as _ from 'underscore'
import GoogleMap from '../google-map/google-map.js';
const CancelToken = axios.CancelToken;
let cancel;
let debounceTimer;

class AddNewAddress extends Component {
    constructor(props) {
        super(props);
        this.handleCenter = this.handleCenter.bind(this);
        this.state = {
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
            apiEndPoint : generalConfig.apiEndPoint,
			locError : '',
			gpsError : '',
            showLoader : false,
            address: '',
            landmark:"",
            building:"",
            latlng: {
                lat:'',
                lng:''
            },
            address_type:'',
            addressInput: false,
            locations : [],
            searchText:'',
            address_obj:  {
                formatted_address:'',
                city:'',
                state:'',
                pincode:'',
            },
            name:'',
            email:''
            address_obj:  {
                formatted_address:'',
                city:'',
                state:'',
                pincode:'',
            },
            name:'',
            email:'',
            phone:''
        };
        this.setInitData();

    }
        this.setInitData();

    }

    setInitData() {
        window.addCartLoader();
        if(this.props.location) {
            this.setState({latlng: {lat:this.props.location.state.lat_lng[0], lng:this.props.location.state.lat_lng[1]}})
            this.setState({address:this.props.location.state.formatted_address})
            window.removeCartLoader();
        } else {
            let cart_id = window.readFromLocalStorage('cart_id')
            if(cart_id) {
                // let url = "https://demo8558685.mockable.io/get-cart";
                let url = generalConfig.apiEndPoint + "/anonymous/cart/fetch";
                let body = {
                    cart_id : cart_id
                }
                axios.get(url, {params : body})
                    .then((res) => {
                        window.removeCartLoader();
                        console.log("fetch cart response ==>", res);
                        let latlng = {lat:res.data.cart.lat_long[0], lng:res.data.cart.lat_long[1]}
                        this.setState({latlng: latlng})
                        this.reverseGeocode(latlng);
                    })
                    .catch((error)=>{
                        window.removeCartLoader();
                        console.log("error in fetch cart ==>", error);
                    })
            } else {  
                window.removeCartLoader();
            }
        }
    }
   
    
    render() {
        return (
            <div className="address-container">
                <Header/>
                <div className="map-container">
                    <GoogleMap handleCenter={this.handleCenter} latlng={this.state.latlng}/>
                    <div id="marker"><i className="fas fa-map-marker-alt"></i></div>
                    <div id="marker"><i class="fas fa-map-marker-alt"></i></div>
                </div>
                <div className="p-15">
                    <h3 class="mt-4 h1 ft6">Set a delivery address</h3>
                    <div className="list-text-block p-15 mb-4 mt-4">
                        <div className="font-weight-light h5 mb-0">
                            {this.state.showLoader?<div>Address is loading...</div>:this.state.address}
                            {this.state.addressInput ? this.getChangeAddressInput() : this.state.address?<span className="text-green d-inline-block cursor-pointer" onClick={this.changeAddress}>. Change</span>:null}
                        </div>
                    </div>
                    <form>
                        <div>
                            {this.getAddressTypeRadio()} 
                        </div>
                        <div className="secure-checkout fixed-bottom visible bg-white p-15">
                            <button className="btn btn-primary btn-arrow w-100 p-15 rounded-0 text-left position-relative h5 ft6 mb-0" onClick={this.handleSubmit}>Add Address</button>
						</div>
                    </form>
                </div>
            </div>
        );
    }

    getAddressTypeRadio = () => {
       return (
        <div>
            <label className="d-block mb-4">
                House/Flat/Block no:
                <input type="text" value={this.state.building} class="d-block w-100 rounded-0 input-bottom" onChange={(e)=> this.setState({'building':e.target.value})} required/>
            </label>
            <label className="d-block mb-4">
                Landmark:
                <input type="text" value={this.state.landmark}  class="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({'landmark':e.target.value})} required/>
            </label>

            <div className="">
                <h5 className="ft6 mb-4">Account details</h5>
                <label className="d-block mb-4">
                    Full Name
                    <input type="text" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({name:e.target.value})} required/>
                </label>

                <label className="d-block mb-4">
                    Email
                    <input type="text" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({email:e.target.value})} required/>
                </label>   
                <label className="d-block mb-4">
                    Moblie No.
                    <input type="text" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({phone:e.target.value})} required/>
                </label>               
            </div>
            <h5 className="ft6 mb-4">Save as</h5>

            <div className="d-flex mb-3">
                <div className="radio d-inline-block pr-5">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange} value="home"  checked={this.state.address_type ==='home'} />
                        <img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/home_location.png" className="mb-1" height="30"/>
                        <span className="radio-text d-block">Home</span>
                    </label>
                </div>
                <div className="radio d-inline-block pr-5">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange} value="work" checked={this.state.address_type ==='work'} />
                        <img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/office_location.png" className="mb-1" height="30"/>
                        <span className="radio-text d-block">Work</span>
                    </label>
                </div>
                <div className="radio d-inline-block">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange}  value="other" checked={this.state.address_type ==='other'} />
                        <img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/address_location.png" className="mb-1" height="30"/>
                        <span className="radio-text d-block">Other</span>
                    </label>
                </div>
            </div>
        </div>
        );
    }

    getChangeAddressInput = () => {
        return (
            <div>
                {this.showLocationSearch()}
                <ul className="location-list" style={{listStyle:'none'}}>
                    {this.getAutoCompleteLocations()}
                </ul>
                
            </div>  
        ); 
    }

    showLocationSearch(){
        if(!this.state.fetchingGPS)
            return (
                <div className="mt-3 position-relative">
                    <input className="border-grey-2 w-100 rounded-0 p-3 mb-0 w-100 search-input plceholder-text" type="search" placeholder="search for area, street name" value={this.state.searchText} onChange={e => {this.autoCompleteLocation(e.target.value)}}/> 
                    <button className="search-close" onClick={this.changeAddress}><i class="fas fa-times"></i></button>
                </div>
            );
    }

    getAutoCompleteLocations(){
        if(this.state.locations.length){
            let locs =  this.state.locations.map((loc)=>
                <li className="mb-3" key={loc.id} onClick={() => this.reverseGeocode({loc:loc})}>
                    {loc.description}
                </li>
            );
            return locs;
        }
        if(this.state.showLoader && !this.state.locations.length){
            return (
                    <div>
                        <i >loading...</i>
                    </div>
                )
        }
    }

    
    handleCenter = (mapProps,map) => {
        this.setState({'landmark':'','latlng':{lat:map.getCenter().lat(), lng: map.getCenter().lng()}});
        //  console.log(map.getCenter().lat(), map.getCenter().lng())
        this.reverseGeocode({'lat':map.getCenter().lat(), 'lng':map.getCenter().lng()});
    }


    handleAddressTypeChange = (e) => {
        this.setState({'address_type':e.target.value})
    }

    handleSubmit = (e) => {
        e.preventDefault()
        window.addCartLoader()
        let data = {
            name:this.state.name,
            email:this.state.email,
            phone:this.state.phone,
            lat_long: [this.state.latlng.lat,this.state.latlng.lng],
            address:this.state.building,
            landmark:this.state.landmark,
            type:this.state.address_type,
            set_default:false
        }
        
        let url = generalConfig.apiEndPoint + '/user/add-address'
        axios.post(url, {...this.state.address_obj, ...data})
        .then((res) => {
            console.log(res)
            if(this.props.cartRequest) {
              
                console.log(res.data.address.id, "lk")
                this.props.assignAndProceed(null,res.data.address.id)
            }

        })
        .catch(err => {
            window.removeCartLoader()
            console.log(err)
        })        
    }

    changeAddress = (e) => {
        e.preventDefault();
        this.setState({'addressInput': !this.state.addressInput, 'searchText':''});
    }
   
    reverseGeocode = (obj) => {
		this.setState({locError : ''});
		this.setState({showLoader : true})
		let url = this.state.apiEndPoint + "/reverse-geocode";
		let body = {};
        
        if(obj.loc) {
            body.place_id = obj.loc.place_id;
        } else if(obj.lat && obj.lng) {
            body.latlng = obj.lat + ',' +obj.lng;
        }
            
		axios.get(url, {params : body})
        .then((res) => {
            let res_address = {};
            if(res.data.status === "OK"){
                if(obj.loc) {
                    res_address = res.data.result
 
                    this.setState({'latlng':{lat: res.data.result.geometry.location.lat,lng: res.data.result.geometry.location.lng}});
                    this.setState({'locations':[], 'addressInput':false});
                } else if(obj.lat && obj.lng) {
                    res_address = res.data.results[0]

                }
                this.setState({"address":res_address.formatted_address});
                let city,state,pincode;
                _.forEach(res_address.address_components,(obj) => {
                    if(_.include(obj.types,'locality')) {
                       city = obj.long_name;
                    }
                    if(_.include(obj.types,'administrative_area_level_1')) {
                       state= obj.long_name;
                    }
                    if(_.include(obj.types,'postal_code')) {
                       pincode = obj.long_name;
                    }
                    
                })
                this.setState({address_obj: {formatted_address: res_address.formatted_address, state: state,city: city, pincode: pincode}})
                this.setState({showLoader : false})

            }
            else{
                this.setState({locError : res.data.error_message})
                this.setState({showLoader : false});
            }
        })
        .catch((error)=>{
            this.setState({showLoader : false});
            let msg = error.message ? error.message : error;
            this.setState({locError : msg})
        })
    }

    autoCompleteLocation =(value)=> {
		clearTimeout(debounceTimer);
		this.setState({searchText : value});
		debounceTimer = setTimeout(()=>{
			console.log("autoCompleteLocation =>", value);
			this.setState({locError : ''});
			if(value.length > 2 ) {
				let url = this.state.apiEndPoint + "/places-autocomplete";
				let body = {
					input : value
				}
				this.setState({showLoader : true, locations : []})
				cancel && cancel();
				console.log("cancel ==>", cancel);
				axios.get(url, {params : body,
						cancelToken : new CancelToken((c) => {
							cancel = c;
						})
					})
					.then((res) => {
						this.setState({showLoader : false})
						if(res.data.status === "OK")
							this.setState({locations : res.data.predictions})
						else{
							//display error
							this.setState({locError : res.data.error_message})
						}
					})
					.catch((error)=>{
						// this.setState({showLoader : false})
						console.log("error in autoCompleteLocation ==>", error);
						// let msg = error.message ? error.message : error;
						// this.setState({locError : msg})
					})
			}
			else{
				this.setState({locations : []})
			}
		},600);
    }
}

export default AddNewAddress;