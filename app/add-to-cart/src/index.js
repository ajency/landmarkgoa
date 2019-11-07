'use strict';

const e = React.createElement;

class addToCart extends React.Component {
	constructor(props) {
		super(props);
		this.state = { 
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiCallInProgress : false,
			quantity : 0,
			lastSelected : '',
			items : [], // variants added to cart
			selectedVariant : '',
			variants : [] // variants fetched from firestore
		};
	}

	componentDidMount(){
		this.setState({selectedVariant : this.props.product_data.default.id })
		variantModals[this.props.product_data.product_id] = document.querySelector('#variantSelectionModal-' + this.props.product_data.product_id);
		repeateModals[this.props.product_data.product_id] = document.querySelector('#repeatLast-' + this.props.product_data.product_id);
	}

	render() {
		return (
			<div>
				{this.getButtonContent()}

			    <div className="custom-modal" id={'variantSelectionModal-' + this.props.product_data.product_id}>
				    <div className="custom-modal-content p-15">
					<button type="button" className="btn-reset close-modal" onClick={()=> this.hideVariantModal()}><i class="fas fa-times text-silver"></i></button>
				        <div className="product-variant text-left text-black">
						  <h3 class="h1 ft6 pr-4">Choose your Bowl</h3>
						  <div class="list-meta mt-4 mb-4">
							<div class="list-author">{this.props.product_data.title}</div>
							<div class="list-date">Veg</div>
						  </div>				          
				          <div className="variant-list mb-4">
				          		{this.getVariants()}
				          </div>
				        </div>
				        <div className="custom-modal-footer d-flex justify-content-between">
				          {/* <button type="button" className="btn-reset btn-back font-size-15 text-uppercase mr-4 p-15 bg-primary text-white text-left w-48" onClick={()=> this.hideVariantModal()}>Back</button> */}
				          <button type="button" className="btn-reset btn-continue btn-arrow font-size-15 text-uppercase p-15 bg-primary text-white text-left w-100 position-relative" onClick={()=>this.addToCart(this.state.selectedVariant)} >Select & Continue</button>
				        </div>
				    </div>
				</div>


			   	 <div className="custom-modal" id={'repeatLast-' + this.props.product_data.product_id}>
				  	<div className="custom-modal-content p-15 text-black">
					  	<h3 class="h1 ft6 pr-4">Repeat last used customization?</h3>
						<div class="list-meta mt-4 mb-4">
							<div class="list-author">{this.props.product_data.title}</div>
							<div class="list-date">Veg</div>
						</div>
						<div className="pl-0 pt-0 pb-3 pr-3">
							<h5>{this.getLastSelected()}</h5>
						</div>

						<div className="d-flex justify-content-between">
							<button className="btn btn-primary btn-arrow position-relative rounded-0 p-15 text-left w-48" onClick={()=>this.showVariantModal()}> I'll Choose </button>
							<button className="btn btn-primary btn-arrow position-relative rounded-0 p-15 text-left w-48" onClick={()=>this.addToCart(this.state.lastSelected)}> Repeat Last </button>
						</div>
				  	</div>
			    </div>
			</div>
		);
	}

	getVariants(){
		if(this.state.variants.length){
			let variants = this.state.variants.map((variant)=>{
				return (
					<div key={variant.id} className="list-item pt-3 pb-3 border-bottom-lightgrey">
			              <label className="custom-radio-btn mb-0 font-size-16">
			              		<span className={"mr-3 " + (this.state.selectedVariant == variant.id ? 'text-primary' : '') }>{variant.size}</span> ₹ {variant.sale_price}
			                	<input type="radio" name={"variant-" + this.props.product_data.product_id} value={variant.id} checked={this.state.selectedVariant == variant.id} onChange={(event) => this.handleOptionChange(event)} />
			                	<span className="checkmark"></span>
			              </label>
					</div>
				)
			})
			return variants;
		}
		else{
			return (
				<div className="list-item pt-3 pb-3 border-bottom-lightgrey">
		              <div className="text-line mb-3">
		              </div>
		              <div className="text-line mb-3">
		              </div>
		              <div className="text-line">
		              </div>
				</div>
			)
		}
	}

	showVariantModal(){
		this.fetchVariants();
		this.hideRepeateLastModal();
		this.setState({selectedVariant : this.props.product_data.default.id });
		document.querySelector('#variantSelectionModal-' + this.props.product_data.product_id).classList.add('show-modal');
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.add('transform-none');
			});
		document.querySelector('#product-'+this.props.product_data.product_id).classList.add('zindex');
		window.hideScroll();
	}

	hideVariantModal(){
		document.querySelector('#variantSelectionModal-' + this.props.product_data.product_id).classList.remove('show-modal');
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.remove('transform-none');
			});
		document.querySelector('#product-'+this.props.product_data.product_id).classList.remove('zindex');
		window.showScroll();
	}

	showRepeateLastModal(){
		document.querySelector('#repeatLast-' + this.props.product_data.product_id).classList.add('show-modal');	
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.add('transform-none');
			});
		document.querySelector('#product-'+this.props.product_data.product_id).classList.add('zindex');
		window.hideScroll();
	}

	hideRepeateLastModal(){
		document.querySelector('#repeatLast-' + this.props.product_data.product_id).classList.remove('show-modal');
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.remove('transform-none');
			});
		document.querySelector('#product-'+this.props.product_data.product_id).classList.remove('zindex');
		window.showScroll();
	}

	getLastSelected(){
		let last_selected = this.props.product_data.variants.find((variant) => {return variant.id == this.state.lastSelected})
		if(last_selected)
			return ( <div> Size : {last_selected.size} </div>
				)
	}

	handleOptionChange(event){
		this.setState({selectedVariant : event.target.value });
	}

	getButtonContent(){
		if(this.state.apiCallInProgress){
			return (<div class="btn-icon">
						<i class="fas fa-circle-notch fa-spin fa-lg"></i>
					</div>);

		}
		if(this.state.quantity == 0)
			return (
				 <a className="btn-add-to-cart text-white bg-primary p-15 text-decoration-none m-0 font-size-25 ft6 cursor-pointer d-inline-block" onClick={() => this.checkVariant('add')} disabled={this.state.apiCallInProgress}>
					<span>Add to cart</span>
					<i className="text-white fa fa-arrow-right" aria-hidden="true"></i>
                 </a>
				)

		return (
			<div className="border-green bg-white">
				<button className="btn-primary" onClick={() => this.checkVariant('remove')} disabled={this.state.apiCallInProgress}>-</button>
				<span className="mw-50 text-center text-black">	{this.state.quantity} </span>
				<button className="btn-primary" onClick={() => this.checkVariant('add')} disabled={this.state.apiCallInProgress}>+</button>
			</div>
		)		
	}

	
	checkVariant(action){
		if(this.props.product_data.variants.length == 1){
			action == 'add' ? this.addToCart(this.props.product_data.variants[0].id) : this.removeFromCart(this.props.product_data.variants[0].id)
		}
		else{
			if(action == 'add'){
				if(this.state.items.length){
					this.showRepeateLastModal();
				}
				else{
					this.showVariantModal()
				}
			}
			else{
				if(this.state.items.length > 1){
					let msg = "Item has multiple variants added. Remove correct item from cart";
					this.displayError(msg);
				}
				else{
					this.removeFromCart(this.state.items[0].variant_id);
				}
			}
		}
	}

	fetchVariants(){
		if(!this.state.variants.length){
			let url = this.state.apiEndPoint + "/misc/fetch-variants";
			let body = {
				product_id 	: this.props.product_data.product_id,
			}

			axios.get(url, {params : body})
			.then((res) => {
				if(res.data.success){
					this.setState({variants : res.data.variants});
				}
			})
			.catch((error)=>{
				console.log("error in add to cart ==>", error);
			})
		}
	}

	addToCart(variant_id = null) {
		this.hideRepeateLastModal();
		this.hideVariantModal()
		this.setState({apiCallInProgress : true});
		let cart_id = window.readFromLocalStorage('cart_id');
		if(cart_id){
			this.addToCartApiCall(variant_id, null, cart_id);
		}
		else if(window.lat_lng){
			this.addToCartApiCall(variant_id, window.lat_lng, null, window.formatted_address);
		}
		else{
			this.getGeolocation().then((res)=>{
				this.addToCartApiCall(variant_id, window.lat_lng, null, window.formatted_address);
			})
			.catch((error) => {
				this.setState({apiCallInProgress : false});
				console.log("error ==>", error);
				this.displayError(error);
			});
		}
	}

	removeFromCart(variant_id = null){
		window.addBackDrop();
		this.setState({apiCallInProgress : true});
		let url = this.state.apiEndPoint + "/anonymous/cart/delete";
		// let url = "https://demo8558685.mockable.io/remove-from-cart";
		let body = {
			variant_id 	: variant_id,
			quantity 	: 1,
			cart_id 	: window.readFromLocalStorage('cart_id')
		}

		axios.post(url, body)
		.then((res) => {
			if(res.data.success){
				this.displaySuccess("Successfully removed from cart");
				let item = {
					variant_id : variant_id,
					quantity : 1
				}
				this.removeItems(item);
				window.updateViewCartCompoent(res.data);
			}
			else{
				this.displayError(res.data.message);
			}
			this.setState({apiCallInProgress : false});
			window.removeBackDrop();
		})
		.catch((error)=>{
			console.log("error in add to cart ==>", error);
			this.setState({apiCallInProgress : false});
			let msg = error && error.message ? error.message : error;
			this.displayError(msg);
			window.removeBackDrop();
		})
	}

	addToCartApiCall(variant_id = null, lat_long = null, cart_id = null, formatted_address = null){
		window.addBackDrop();
		let url = this.state.apiEndPoint + "/anonymous/cart/insert";
		let body = {
			variant_id : variant_id,
			quantity : 1,
			lat_long : lat_long,
			formatted_address : formatted_address
		}
		if(cart_id)
			body.cart_id = cart_id;

		axios.post(url, body)
		.then((res) => {
			if(res.data.success){
				this.addItems(res.data.item);
				window.updateViewCartCompoent(res.data);
				this.displaySuccess("Successfully added to cart")
				if(!cart_id && res.data.cart_id){
					// document.cookie = "cart_id=" + res.data.cart_id + ";path=/";
					window.writeInLocalStorage('cart_id' , res.data.cart_id);
				}
			}
			else{
				this.displayError(res.data.message);
			}
			this.setState({apiCallInProgress : false});
			window.removeBackDrop();
		})
		.catch((error)=>{
			console.log("error in add to cart ==>", error);
			this.setState({apiCallInProgress : false});
			let msg = error && error.message ? error.message : error;
			this.displayError(msg);
			window.removeBackDrop();
		})
	}

	addItems(item){
		let items = this.state.items;
		let updated_item_index = items.findIndex((i) => { return i.variant_id == item.variant_id});
		if(updated_item_index !== -1){
			items[updated_item_index].quantity += item.quantity;
		}
		else{
			items.push(item);
		}
		let quantity = this.state.quantity + item.quantity;
		this.setState({quantity : quantity, items : items, lastSelected : item.variant_id});
	}

	removeItems(item){
		let items = this.state.items;
		let updated_item_index = items.findIndex((i) => { return i.variant_id == item.variant_id});
		let last_selected = '', quantity = this.state.quantity - item.quantity;
		if(updated_item_index !== -1){
			items[updated_item_index].quantity -= item.quantity;
		}
		if(items[updated_item_index].quantity == 0){
			items.splice(updated_item_index, 1);
		}
		if(items.length == 1){
			last_selected = items[0].variant_id;
		}
		this.setState({quantity : quantity, items : items, lastSelected : last_selected});
	}

	displayError(msg){
		document.querySelector('#failure-toast').innerHTML = msg;
		document.querySelector('#failure-toast').classList.remove('d-none');
		setTimeout(()=>{
			document.querySelector('#failure-toast').classList.add('d-none');
		},3000)
	}

	displaySuccess(msg){
		document.querySelector('#success-toast').innerHTML = msg;
		document.querySelector('#success-toast').classList.remove('d-none');
		setTimeout(()=>{
			document.querySelector('#success-toast').classList.add('d-none');
		},3000)
	}

	getGeolocation(){
		return new Promise((resolve, reject) => {
		    window.showGpsModalPrompt(true);
		    let timer = setInterval(()=>{
		    	if(window.lat_lng){
		    		clearInterval(timer);
		    		resolve();
		    	}
		    	if(window.modal_closed){
		    		clearInterval(timer);
		    		window.modal_closed = false;
		    		reject("Please select location to add to cart");
		    	}
		    },500)
		});
	}
}

let addToCartComponents = [];
let variantModals = [];
let repeateModals = []
// Find all DOM containers, and render add-to-cart buttons into them.
document.querySelectorAll('.react-add-to-cart-container')
	.forEach((domContainer, index) => {
		const product_data = JSON.parse(domContainer.dataset.product_data);
		addToCartComponents[index] =  ReactDOM.render(e(addToCart, { product_data : product_data }),domContainer);
	});

function toggleModal(modal) {
    modal.classList.toggle("show-modal");
    document.querySelectorAll('.product-wrapper')
		.forEach((domContainer) => {
			domContainer.classList.remove('transform-none');
		});
	document.querySelectorAll('.product-list-item')
		.forEach((domContainer) => {
			domContainer.classList.remove('zindex');
		});
	window.removeBackDrop();
}

function windowOnClick(event) {
	for(let i in variantModals) {
		if(event.target === variantModals[i])
			toggleModal(variantModals[i]);
	}
	for(let i in repeateModals) {
		if(event.target === repeateModals[i])
			toggleModal(repeateModals[i]);
	}
}

window.addEventListener("click", windowOnClick);

window.updateaddToCartComponent = (item) => {
	addToCartComponents.forEach((component) =>{
		if(component.props.product_data.product_id == item.product_id){
			let items = component.state.items;
			items.push(item)
			items.sort((a,b)=>{
	  			return b.timestamp._seconds - a.timestamp._seconds;
	  		})
			let last_added = items[0].variant_id;
			let qty = 0;
			items.forEach((item) => {
				qty += item.quantity;
			})
			component.setState({items : items, lastSelected : last_added, quantity : qty})
		}
	})
}

window.updateItemQuantity = (item, action) => {
	console.log("updateItemQuantity ==>", item, action);
	addToCartComponents.forEach((component) =>{
		if(component.props.product_data.product_id == item.product_id){
			if(action == 'add')
				component.addItems(item)
			else
				component.removeItems(item)
		}
	})
}
