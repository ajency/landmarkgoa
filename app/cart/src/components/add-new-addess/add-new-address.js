import React, { Component } from 'react';
import axios from 'axios';
import Header from '../header/header.js';
import './add-new-address.scss'
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
            apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			locError : '',
			gpsError : '',
            showLoader : false,
            address: this.props.address,
            landmark:"",
            building:"",
            latlng: {
                lat:this.props.latlng.lat,
                lng:this.props.latlng.lng
            },
            address_type:'',
            addressInput: false,
            locations : [],
            searchText:'',
		};
    }

   
    
    render() {
        return (
            <div className="address-container">
                <Header/>
                <div className="map-container">
                    <GoogleMap handleCenter={this.handleCenter} latlng={this.state.latlng}/>
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
                <input type="text" value={this.state.building} class="d-block w-100 rounded-0 input-bottom" onChange={this.handleBuildingChange}/>
            </label>
            <label className="d-block mb-4">
                Landmark:
                <input type="text" value={this.state.landmark}  class="d-block w-100 rounded-0 input-bottom" onChange={this.handleLandmarkChange}/>
            </label>

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

            <div className="d-none">
                <h5 className="ft6 mb-4">Account details</h5>
                <label className="d-block mb-4">
                    Full Name
                    <input type="text" className="d-block w-100 rounded-0 input-bottom"/>
                </label>

                <label className="d-block mb-4">
                    Email
                    <input type="text" className="d-block w-100 rounded-0 input-bottom"/>
                </label>               
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

    handleLandmarkChange = (e) => {
        this.setState({'landmark':e.target.value});
    }

    handleBuildingChange = (e) => {
        this.setState({'building':e.target.value});
    }

    handleAddressTypeChange = (e) => {
        this.setState({'address_type':e.target.value})
    }

    handleSubmit = (e) => {
        e.preventDefault();
        let data = {
            address: this.state.address,
            latlng: this.state.latlng,
            building:this.state.building,
            landmark:this.state.landmark,
            address_type:this.state.address_type
        }
        console.log(data);
        
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
            if(res.data.status === "OK"){
                if(obj.loc) {
                    this.setState({"address": res.data.result.formatted_address});
                    this.setState({'latlng':{lat: res.data.result.geometry.location.lat,lng: res.data.result.geometry.location.lng}});
                    this.setState({'locations':[], 'addressInput':false});
                } else if(obj.lat && obj.lng) {
                    this.setState({"address":res.data.results[0].formatted_address});
                }
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