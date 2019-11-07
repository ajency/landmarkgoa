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
		};
	}

	componentDidMount(){
	}

	render() {
		return (
			<div>
				{this.getButtonContent()}
			</div>
		);
	}

	showVariantModal(){
		window.showVariantSelectionPopup(this.props.product_data.product_id, this.state.lastSelected, this.props.product_data.title)
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
		if(action == 'add'){
			this.showVariantModal()
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

	addToCart(variant_id = null) {
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

window.addToCartFromVariant = (product_id, variant_id) => {
	addToCartComponents.forEach((component) =>{
		if(component.props.product_data.product_id == product_id){
			component.addToCart(variant_id);
		}
	})
}
