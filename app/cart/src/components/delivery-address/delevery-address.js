import React, { Component } from 'react';
import './delivery-address.scss';
import editImage from '../../assets/images/Edit.png';

class DeliveryAddress extends Component {
	constructor(props) {
		super(props);
	}
	render() {
		return (
			<div className="delivery-address-container p-15">
				<div className="address-details list-text-block p-15 mb-0">
					<div className="address-details-inner font-weight-light">
						<span className="font-weight-semibold">Deliver to </span>
						<span id="cart-delivery-address"> {this.props.address}</span>
						<span className="text-green d-inline-block cursor-pointer" onClick={() => this.openChangeLocationModal()}>. Edit</span>
					</div>

					{this.showSummaryContent()}
				</div>
			</div>
		);
	}

	openChangeLocationModal(){
		console.log("openChangeLocationModal");
		 window.showGpsModalPrompt(true);
	}

	showSummaryContent() {
		if(this.props.showSummaryContent) {
			return (
				<div>
					<div className="address-details-inner font-weight-light mt-3 pt-3 text-black border-grey-top">
						<span className="font-weight-semibold">Mobile No: </span> 
						<span id="cart-delivery-address"> 9823353495 </span>
					</div>
					<div className="btn-edit d-none" onClick={() => this.openChangeLocationModal()}>
						<img src={editImage} className="app-log" alt="Edit address" title="Edit address"/>
					</div>
				</div>
			);
		}
	}
}

export default DeliveryAddress;