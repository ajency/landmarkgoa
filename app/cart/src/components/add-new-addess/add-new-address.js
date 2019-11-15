import React, { Component } from 'react';
import axios from 'axios';
import Header from '../header/header.js';
import './add-new-address.scss'
import GoogleMap from '../google-map/google-map';
import { generalConfig } from '../config.js';
import * as _ from 'underscore';
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
            address_type:'Other',
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
            email:'',
            errors: {
                building:'',
                landmark:'',
                name:'',
                landmark:'',
                type:'',
                email:''
            }
        };
        this.setInitData(); 

    }
    static getDerivedStateFromProps(props, state) {
        let returnState ={}
        if(window.firebase.auth().currentUser.isAnonymous) {
            returnState['showUserDetailsFields'] =true;
        } else {
             window.db.collection('user-details').doc(window.firebase.auth().currentUser.uid).get()
            .then(user_details_ref => {
                if(user_details_ref.data().name.length == 0 || user_details_ref.data().email.length == 0) {
                    returnState['showUserDetailsFields'] = true;
                } 
                returnState["name"] = user_details_ref.data().name;
                returnState["email"] = user_details_ref.data().email;
                returnState["phone"] = user_details_ref.data().phone;
            })
           
        }
        console.log(returnState)
        return returnState;
    }

    setInitData() {
        try {
            window.addCartLoader();
            if(this.props.location) {
                this.setState({latlng: {lat:this.props.location.state.lat_lng[0], lng:this.props.location.state.lat_lng[1]}})
                this.setState({address:this.props.location.state.formatted_address})
                window.removeCartLoader();
            } else {
                let cart_id = window.readFromLocalStorage('cart_id')
                console.log("setInitData ====>", cart_id)
                if(cart_id) {
                    window.removeCartLoader();
                    window.getCartByID(cart_id).then(cart => {
                        console.log("fetch cart response ==>", cart);
                        cart = JSON.parse(JSON.stringify(cart));
                        console.log("fetch cart response ==>", cart);
                        let latlng = {lat:cart.lat_long[0], lng:cart.lat_long[1]}
                        this.setState({latlng: latlng})
                        this.reverseGeocode(latlng);
                    })
                   

                } else {
                    this.displayError("Cart not found.")
                }
                window.removeCartLoader();

            }
        } catch (error) {
            window.removeCartLoader();
            this.displayError(error)
        }
        
    }
   
    
    render() {
        return (
            <div className="address-container">
               {this.props.cartRequest ?  null:<Header/>}
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
        const {errors} = this.state
       return (
        <div>
            <label className="d-block mb-4">
                House/Flat/Block no:
                <input type="text" value={this.state.building} class="d-block w-100 rounded-0 input-bottom" onChange={(e)=> this.setState({'building':e.target.value})} required/>
                {errors.building.length > 0 &&  <span className='error'>{errors.building}</span>}
            </label>
            <label className="d-block mb-4">
                Landmark:
                <input type="text" value={this.state.landmark}  class="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({'landmark':e.target.value})} required/>
                {errors.landmark.length > 0 &&  <span className='error'>{errors.landmark}</span>}
            </label>

            {this.showUserDetailsFields? this.showUserDetailsFields():null}
            <h5 className="ft6 mb-4">Save as</h5>

            <div className="d-flex mb-3">
                <div className="radio d-inline-block pr-5">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange} value="Home"  checked={this.state.address_type ==='Home'} />
                        <img src={window.site_url + "/wp-content/themes/ajency-portfolio/images/home_location.png"} className="mb-1" height="30"/>
                        <span className="radio-text d-block">Home</span>
                    </label>
                </div>
                <div className="radio d-inline-block pr-5">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange} value="Work" checked={this.state.address_type ==='Work'} />
                        <img src={window.site_url + "/wp-content/themes/ajency-portfolio/images/office_location.png"} className="mb-1" height="30"/>
                        <span className="radio-text d-block">Work</span>
                    </label>
                </div>
                <div className="radio d-inline-block">
                    <label className="text-center">
                        <input class="invisible position-absolute radio-input" type="radio" onChange={this.handleAddressTypeChange}  value="Other" checked={this.state.address_type ==='Other'} />
                        <img src={window.site_url + "/wp-content/themes/ajency-portfolio/images/address_location.png"} className="mb-1" height="30"/>
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
                        {/* Need better loader */}
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
        let errors = this.state.errors;
        let error = false
        if(this.state.name.length <1) {
            errors.name =  "Name is required!";
            error = true;
        }
        if(this.state.email.length <1) {
            errors.email = "Email is required!"
            error = true;
        }
        if(!window.validEmailRegex.test(this.state.email)) {   
            errors.email = "Please enter valid email";
            error = true;
        }
        if(this.state.landmark.length < 1) {  
            errors.landmark = 'Landmark is required';
            error = true;
        }
        if(this.state.building.length < 1) {  
            errors.building = ' House/Flat/Block no: is required';
            error = true;
        }
        if(error) {
            window.removeCartLoader();
            this.setState({"errors":errors});
            return false;
        }
        
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
        
        try {
             window.addAddress({...this.state.address_obj, ...data}).then(address => {
                console.log(this.props.cartRequest,address)
                if(this.props.cartRequest) {
                    console.log(address.id, address)
                    this.props.assignAndProceed(null,address.id)
                }
             })
            

        }catch(err) {
            window.removeCartLoader()
            console.log(err)
        }       
    }

    showUserDetailsFields() {
        const {errors} = this.state;
        return (
            <div className="user-details">
                <h5 className="ft6 mb-4">Account details</h5>
                <label className="d-block mb-4">
                    Full Name
                    <input type="text" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({name:e.target.value})} required/>
                    {errors.name.length > 0 &&  <span className='error'>{errors.name}</span>}
                </label>

                <label className="d-block mb-4">
                    Email
                    <input type="email" className="d-block w-100 rounded-0 input-bottom" onChange={(e) => this.setState({email:e.target.value})} required/>
                    {errors.email.length > 0 &&  <span className='error'>{errors.email}</span>}
                </label>              
            </div>
        );
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
            if(!this.isAddressDeliverable([obj.lat, obj.lng])) {
                this.displayError("Cannot deliver to this address. :(")
                return false; 
            }
        }
            
		axios.get(url, {params : body})
        .then((res) => {
            let res_address = {};
            if(res.data.status === "OK"){
                if(obj.loc) {
                    res_address = res.data.result
                    if(!this.isAddressDeliverable([res.data.result.geometry.location.lat, res.data.result.geometry.location.lng])) {
                        this.displayError("Cannot deliver to this address. :(")
                        return false; 
                    }
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
            return;
        })
        .catch((error)=>{
            this.setState({showLoader : false});
            let msg = error.message ? error.message : error;
            this.setState({locError : msg})
            this.displayError(msg)
            return;
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

    isAddressDeliverable(lat_lng) {

       return window.getCurrentStockLocation().then(locations => {
            if(!locations.length) {
                this.displayError("Something went wrong...")
                return false;
            }
           let deliverable =  window.findDeliverableLocation(locations,lat_lng)
    
           return !!deliverable
    
        })
      
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
    
}

export default AddNewAddress;